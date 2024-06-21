<?php

namespace App\Http\Controllers;

use App\Models\Kelola_data_ksm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaDataKsmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        // dd($user_id);
        $users = Kelola_data_ksm::with('item')->where('user_id', $user_id )->get();

        dd($users);
        return view('pages.ksm.dashboard');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelola_data_ksm $kelola_data_ksm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelola_data_ksm $kelola_data_ksm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelola_data_ksm $kelola_data_ksm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelola_data_ksm $kelola_data_ksm)
    {
        //
    }
}
