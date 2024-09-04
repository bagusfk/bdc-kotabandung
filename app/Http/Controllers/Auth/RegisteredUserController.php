<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Kelola_data_ksm;
use App\Models\category;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no_wa' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function createKsm(): View
    {
        $category = category::all();
        return view('auth.register-ksm', compact('category'));
    }

    public function storeKsm(Request $request)
    {
        $request->validate([
            'owner' => 'required',
            'brand_name' => 'required',
            'category_id' => 'required',
            'no_wa' => 'required',
            'business_entity' => 'required',
            'product_sales_address' => 'required',
            'business_description' => 'required',
            'owner_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // dd($request);

        $ownerPath = $request->file('owner_picture')->store('public/owner_picture');
        $ownerPath = str_replace('public/', 'storage/', $ownerPath);

        $logoPath = $request->hasFile('logo_image') ? $request->file('logo_image')->store('public/logo_image') : null;
        $nibPath = $request->hasFile('nib_document') ? $request->file('nib_document')->store('public/nib_document') : null;
        $permissionPath = $request->hasFile('permission_letter') ? $request->file('permission_letter')->store('public/permission_letter') : null;

        if ($logoPath) $logoPath = str_replace('public/', 'storage/', $logoPath);
        if ($nibPath) $nibPath = str_replace('public/', 'storage/', $nibPath);
        if ($permissionPath) $permissionPath = str_replace('public/', 'storage/', $permissionPath);

        // Determine cluster
        $cluster = 'C';
        if ($request->business_entity == 'reseller') {
            $cluster = 'D';
        }
        if ($logoPath && $nibPath && $request->address && $request->nib && $request->business_entity != 'reseller') {
            $cluster = 'B';
            if ($permissionPath) {
                $cluster = 'A';
            }
        }

        // dd($cluster);


        $user_id = Auth::user()->id;
        // dd($user_id);

        $ksm = Kelola_data_ksm::create([
            'cluster' => $cluster,
            'category_id' => $request->category_id,
            'user_id' => $user_id,
            'owner' => $request->owner,
            'owner_picture' => $ownerPath,
            'no_wa' => $request->no_wa,
            'brand_name' => $request->brand_name,
            'logo_image' => $logoPath,
            'link_ig' => $request->link_ig,
            'business_description' => $request->business_description,
            'business_entity' => $request->business_entity,
            'product_sales_address' => $request->product_sales_address,
            'address' => $request->address,
            'nib' => $request->nib,
            'nib_document' => $nibPath,
            'permission_letter' => $permissionPath,
        ]);

        $user = Auth::user();
        $user->role = "ksm";
        $user->save();

        // dd($ksm);

        return redirect()
            ->route('dashboard_ksm')
            ->with('success', 'Berhasil terdaftar sebagai anggota KSM, sekarang ayo kita tambahkan produk kamu!');

        // dd($request);

        // $ownerPath = $request->file('owner_picture')->store('public/owner_picture');
        // $ownerPath = str_replace('public/', 'storage/', $ownerPath);

        // dd($ownerPath);

        // $logoPath = null;
        // if ($request->hasFile('logo_image')) {
        //     $logoPath = $request->file('logo_image')->store('public/logo_image');
        //     $logoPath = str_replace('public/', '', $logoPath);
        // }
        // $nibPath = null;
        // if ($request->hasFile('nib_document')) {
        //     $nibPath = $request->file('nib_document')->store('public/nib_document');
        //     $nibPath = str_replace('public/', '', $nibPath);
        // }
        // $permissionPath = null;
        // if ($request->hasFile('permission_letter')) {
        //     $permissionPath = $request->file('permission_letter')->store('public/permission_letter');
        //     $permissionPath = str_replace('public/', '', $permissionPath);
        // }

        // $ksmId = Auth::id();
        // $ksm = new Kelola_data_ksm();
        // $ksm->id = $ksmId;
        // $ksm->owner = $request->owner;
        // $ksm->brand_name = $request->brand_name;
        // $ksm->category_id = $request->category_id;
        // $ksm->no_wa = $request->no_wa;
        // $ksm->link_ig = $request->link_ig;
        // $ksm->nib = $request->nib;
        // $ksm->business_entity = $request->business_entity;
        // $ksm->address = $request->address;
        // $ksm->product_sales_address = $request->product_sales_address;
        // $ksm->business_description = $request->business_description;

        // if ($ownerPath !== null) {
        //     $ksm->owner_picture = 'storage/' . $ownerPath;
        // }
        // if ($logoPath !== null) {
        //     $ksm->logo_image = 'storage/' . $logoPath;
        // }
        // if ($nibPath !== null) {
        //     $ksm->nib_document = 'storage/' . $nibPath;
        // }
        // if ($permissionPath !== null) {
        //     $ksm->permission_letter = 'storage/' . $permissionPath;
        // }
        // $ksm->cluster = 'c';
        // $ksm->save();

        // $user = Auth::user();
        // $user->ksm_id = $ksmId;
        // $user->role = "ksm";
        // $user->save();

        // return redirect('/');
    }

    // public function straight_ksm($id, Request $request)
    // {
    //     $user = User::find($id);
    //     $data = $request->validate([
    //         'ksm_id' => 'required'
    //         // Tambahkan update untuk field lain jika diperlukan
    //     ]);
    //     $user->update($data);

    //     return view('/');
    // }
}
