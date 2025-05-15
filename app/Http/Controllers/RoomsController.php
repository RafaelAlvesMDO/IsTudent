<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Course;
use App\Models\Feature;
use App\Models\Landlord;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use App\Models\Reserve;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showRegisterRoomForm()
    {
        $cities = City::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();
        $courses = Course::orderBy('name')->get();

        return view('register-room', compact('courses', 'features', 'cities', 'states'));
    }

    public function listAllRooms()
    {
        $rooms = Room::where('status', Room::STATUS_AVAILABLE)
            ->get();
        return view('home', compact('rooms'));
    }

    public function listLandlordRooms()
    {
        $userId = Auth::id();

        $landlord = Landlord::where('user_id', $userId)->first();

        if ($landlord) {
            $rooms = Room::where('landlord_id', $landlord->id)->get();
        } else {
            $rooms = collect();
        }

        return view('landlord-rooms', compact('rooms'));
    }

    public function detail($title)
    {
        $room = Room::where('title', $title)
            ->with('landlord.user', 'features')
            ->firstOrFail();

        return view('room-detail', compact('room'));
    }

    public function showReserveRoomForm()
    {
        $landlord = Auth::user()->landlord;
        $rooms = Room::where('landlord_id', $landlord->id)
            ->where('status', Room::STATUS_AVAILABLE)
            ->get();

        return view('reserve-room', compact('landlord', 'rooms'));
    }

    public function listReserves()
    {
        $user = Auth::user();

        if ($user->type === 'landlord') {
            $landlord = $user->landlord;
            if (!$landlord) {
                return redirect()->back()->withErrors(['error' => 'Landlord não encontrado.']);
            }

            $reserves = Reserve::where('landlord_id', $landlord->id)
                ->with('room')
                ->orderByDesc('created_at')
                ->get();
        } elseif ($user->type === 'renter') {
            $reserves = Reserve::where('email', $user->email)
                ->with('room')
                ->orderByDesc('created_at')
                ->get();
        } else {
            return redirect()->back()->withErrors(['error' => 'Tipo de usuário inválido.']);
        }

        return view('reserves', compact('reserves', 'user'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function registerRoom(Request $request)
    {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:300'],
            'description' => ['required', 'string', 'max:500'],
            'monthly_price' => ['required', 'numeric'],
            'availability_start' => ['required', 'date'],
            'availability_end' => ['required', 'date'],
            'rules' => ['nullable', 'string', 'max:500'],
            'course_id' => ['required', 'exists:courses,id'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:8192'],
            'features' => ['nullable', 'array'],
            'features.*' => ['exists:features,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'state_id' => ['required', 'exists:states,id'],
        ]);

        if (!isset($validated['course_id'])) {
            dd('course_id não enviado');
        }

        $imagePath = $request->file('image')->store('rooms-img', 'public');
        $landlord = Landlord::where('user_id', Auth::id())->first();

        $room = Room::create([
            'title' => $validated['title'],
            'address' => $validated['address'],
            'description' => $validated['description'],
            'monthly_price' => $validated['monthly_price'],
            'availability_start' => $validated['availability_start'],
            'availability_end' => $validated['availability_end'],
            'rules' => $validated['rules'],
            'course_id' => $validated['course_id'],
            'image' => $imagePath,
            'landlord_id' => $landlord->id,
            'city_id' => $validated['city_id'],
            'state_id' => $validated['state_id'],
            'status' => Room::STATUS_AVAILABLE,
        ]);

        if (isset($validated['features'])) {
            $room->features()->attach($validated['features']);
        }

        return redirect()->route('home')->with('success', 'Room registered successfully!');
    }

    public function reserveRoom(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'string', 'digits:11'],
            'matriculation' => ['required', 'alpha_num', 'digits_between:4,20'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'digits:13'],
            'renter_quantity' => ['required', 'numeric'],
            'check_in_date' => ['required', 'date'],
            'check_out_date' => ['required', 'date'],
            'monthly_price' => ['required', 'numeric'],
            'payment_form' => ['required', 'string', 'in:Credit Card,Debit Card,Bank Slip,PIX'],
            'room_id' => ['required', 'exists:rooms,id'],
        ]);

        $landlord = Landlord::where('user_id', Auth::id())->first();

        if (!$landlord) {
            return redirect()->back()->withErrors(['error' => 'Landlord not found.']);
        }

        $reserve = Reserve::create([
            'name' => $validated['name'],
            'cpf' => $validated['cpf'],
            'matriculation' => $validated['matriculation'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'renter_quantity' => $validated['renter_quantity'],
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'monthly_price' => $validated['monthly_price'],
            'payment_form' => $validated['payment_form'],
            'room_id' => $validated['room_id'],
            'landlord_id' => $landlord->id,
        ]);

        $room = Room::findOrFail($validated['room_id']);
        $room->status = Room::STATUS_RESERVED;
        $room->save();

        return redirect()->route('home')->with('success', 'Room registered successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
