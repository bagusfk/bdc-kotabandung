<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\cities;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $provinces = cities::select('province','province_id')->distinct()->orderBy('province', 'asc')->get();
        $cities = cities::select('city_name','city_id','province_id','type')->orderBy('city_name', 'asc')->get();
        // foreach ($provinces as $province) {
        //     dd($province->province_id); // Mengakses property `province_id` dari setiap item dalam koleksi
        // }
        // dd($provinces->province_id);
        // dd($cities->province_id);
        return view('profile.edit', [
            'user' => $request->user(),
            'provinces' => $provinces,
            'cities' => $cities
        ]);
    }

    public function getCities($province)
    {
        // dd($province);
        $cities = cities::where('province_id', $province)->orderBy('city_name', 'asc')->get();
        return response()->json($cities);
    }

    public function updateCities(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate([
            'city_id' =>'required',
            'address' =>'required'
        ]);

        $user = Auth::user();

        $user->update([
            'city_id' => $request->city_id,
            'address' => $request->address
        ]);

        // $request->user()->save();

        return redirect()->back()->with('status', 'address-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
