<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Register_event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ksmId = Auth::id();
        $data['register_event'] = Register_event::where('ksm_id', $ksmId)->get();
        $data['users'] = User::all();
        $data['event'] = Event::all();
        return view('pages.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user = Auth::id();
        $event = new Register_event();
        $event->ksm_id = $user;
        $event->event_id = $id;
        $event->save();

        return redirect()->back()->with('success', 'Berhasil mendaftar event! Silahkan tunggu konfirmasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
