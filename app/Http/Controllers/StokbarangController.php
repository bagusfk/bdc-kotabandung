<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Stokbarang;
use App\Models\User;
use Illuminate\Http\Request;

class StokbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = category::all();
        $data['items'] = Stokbarang::all();

        return view('pages.catalog.view', $data);
    }

    public function detail($id)
    {
        $data['item'] = Stokbarang::find($id);
        $data['seller'] = User::where('id', $data['item']->seller_id)->first();
        $data['items'] = Stokbarang::where('seller_id', $data['seller']->id)->get();

        return view('pages.catalog.detailproduct', $data);
    }

    public function searchBarang(Request $request)
    {
        $data['query'] = $request->search;
        $data['categories'] = category::all();
        $data['items'] = Stokbarang::where('name', 'like', '%'. $request->search. '%')->get();

        return view('pages.catalog.view', $data);
    }

    public function searchCategory(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->category_id;

        $data = Stokbarang::query();

        if($category_id){
            $data->where('category_id', $category_id)->get();
        }

        if($search){
            $data->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }

        $items = $data->get();

        $categories = category::all();

        // dd($data);

        return view('pages.catalog.view', compact('items', 'search', 'category_id', 'categories') );
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
    public function show(Stokbarang $stokbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stokbarang $stokbarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stokbarang $stokbarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stokbarang $stokbarang)
    {
        //
    }
}
