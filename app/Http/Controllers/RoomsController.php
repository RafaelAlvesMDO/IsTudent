<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Course;
use App\Models\Feature;
use App\Models\Landlord;
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
        $features = Feature::orderBy('name')->get();
        $courses = Course::orderBy('name')->get();

        return view('register-room', compact('courses', 'features'));
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

    // public function detail($Name)
    // {
    //     $rooms = [
    //         1 => [
    //             'Image' => 'img/Trastevere-Room-Image.jpg',
    //             'Name' => 'Trastevere Room | Rome - Italy',
    //             'Description' => 'A charming and cozy room featuring rustic wooden furniture, 
    //             warm lighting, and exposed brick walls. The room has a small balcony overlooking 
    //             the picturesque streets of Trastevere, giving it an authentic Roman feel.',
    //             'Price' => 120
    //         ],
    //         2 => [
    //             'Image' => 'img/Malasaña-Room-Image.jpg',
    //             'Name' => 'Malasana Room | Madrid - Spain',
    //             'Description' => 'A vibrant and modern room with bright colors, artistic decorations, 
    //             and stylish furniture. The room is designed for comfort and creativity, reflecting the 
    //             lively and youthful energy of Malasaña.',
    //             'Price' => 100
    //         ],
    //         3 => [
    //             'Image' => 'img/VilaMadalena-Room-Image.jpg',
    //             'Name' => 'Vila Madalena Room | São Paulo - Brazil',
    //             'Description' => 'A spacious and minimalist room with tropical elements, large windows 
    //             letting in natural light, and contemporary furniture. The room includes unique art pieces 
    //             and a relaxing ambiance, perfect for a trendy urban stay.',
    //             'Price' => 30
    //         ],
    //         4 => [
    //             'Image' => 'img/LeMarais-Room-Image.jpg',
    //             'Name' => 'Le Marais Room | Paris - France',
    //             'Description' => 'An elegant and sophisticated room with classic Parisian décor, including a 
    //             chic fireplace, ornate moldings, and soft pastel tones. The room offers a luxurious yet cozy 
    //             atmosphere with a beautiful view of historic streets.',
    //             'Price' => 150
    //         ],
    //         5 => [
    //             'Image' => 'img/Kreuzberg-Room-Image.jpg',
    //             'Name' => 'Kreuzberg Room | Berlin - Germany',
    //             'Description' => 'A modern and minimalist room with industrial-style elements such as 
    //             exposed concrete walls, metal lighting fixtures, and sleek furniture. The design reflects 
    //             Kreuzbergs creative and edgy urban scene.',
    //             'Price' => 60
    //         ],
    //         6 => [
    //             'Image' => 'img/BrooklynHeights-Room-Image.jpg',
    //             'Name' => 'Brooklyn Heights Room | New York City - USA',
    //             'Description' => 'A stylish and contemporary room with large windows offering a stunning 
    //             city view. The room features modern furniture, neutral tones, and a cozy reading nook, 
    //             embodying the sophisticated yet relaxed lifestyle of Brooklyn Heights.',
    //             'Price' => 180
    //         ],
    //     ];

    //     $room = null;
    //     foreach ($rooms as $roomData) {
    //         if ($roomData['Name'] === $Name) {
    //             $room = $roomData;
    //             break;
    //         }
    //     }

    //     if (!$room) {
    //         abort(404);
    //     }

    //     return view('room-detail', compact('room'));
    // }
}
