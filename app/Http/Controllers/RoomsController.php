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
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function showRoom($id)
    // {
    //     $room = Room::findOrFail($id);

    //     // Decodifica o JSON das features para um array (opcional, pode ser feito direto na view também)
    //     $features = json_decode($room->features, true);

    //     return view('');
    // }

    public function showRegisterRoomForm()
    {
        $cities = City::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();
        $courses = Course::orderBy('name')->get();

        return view('register-room', compact('courses', 'features', 'cities', 'states'));
    }

    // public function showDetailRoom()
    // {
    //     $room = Room::all();
    //     return view('detail-room', compact('room'));
    // }

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
        ]);

        if (isset($validated['features'])) {
            $room->features()->attach($validated['features']);
        }

        return redirect()->route('home')->with('success', 'Room registered successfully!');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function listAllRooms()
    {
        $rooms = Room::all();
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

    // public function list()
    // {
    //     $rooms = [
    //         1 => ['Image' => 'img/Trastevere-Room-Image.jpg', 'Name' => 'Trastevere Room | Rome - Italy', 'Price' => 120],
    //         2 => ['Image' => 'img/Malasaña-Room-Image.jpg', 'Name' => 'Malasana Room | Madrid - Spain', 'Price' => 100],
    //         3 => ['Image' => 'img/VilaMadalena-Room-Image.jpg', 'Name' => 'Vila Madalena Room | São Paulo - Brazil', 'Price' => 30],
    //         4 => ['Image' => 'img/LeMarais-Room-Image.jpg', 'Name' => 'Le Marais Room | Paris - France', 'Price' => 150],
    //         5 => ['Image' => 'img/Kreuzberg-Room-Image.jpg', 'Name' => 'Kreuzberg Room | Berlin - Germany', 'Price' => 60],
    //         6 => ['Image' => 'img/BrooklynHeights-Room-Image.jpg', 'Name' => 'Brooklyn Heights Room | New York City - USA', 'Price' => 180],
    //     ];

    //     return view('rooms-list', compact('rooms'));
    // }
}
