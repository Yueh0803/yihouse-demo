<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'staff') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $rooms = Room::paginate(20);
        return view('admin.rooms.index', ['rooms' => $rooms]);
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'room_name' => 'required|string|max:255',
            'room_type' => 'required|string',
            'description' => 'nullable|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
        ]);

        $validated['created_by'] = Auth::id();
        Room::create($validated);
        return redirect()->route('admin.rooms.index')->with('success', '房間已新增');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', ['room' => $room]);
    }

    public function update($id)
    {
        $room = Room::findOrFail($id);
        
        $validated = request()->validate([
            'room_name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        $room->update($validated);
        return redirect()->route('admin.rooms.index')->with('success', '房間已更新');
    }
}
