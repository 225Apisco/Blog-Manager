<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\AdPhoto;


class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(Request $request)
    {

         $query = Ad::query();

    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('title', 'like', '%'.$request->search.'%')
              ->orWhere('description', 'like', '%'.$request->search.'%');
        });
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    if ($request->filled('location')) {
        $query->where('location', $request->location);
    }

    if ($request->filled('price_min') && $request->filled('price_max')) {
        $query->whereBetween('price', [$request->price_min, $request->price_max]);
    } elseif ($request->filled('price_min')) {
        $query->where('price', '>=', $request->price_min);
    } elseif ($request->filled('price_max')) {
        $query->where('price', '<=', $request->price_max);
    }

     $adsFiltered = $query->latest()->get();

     $ads = Ad::latest()->limit(10)->get(); 

     return view('welcome', compact('adsFiltered', 'ads'));


        // $ads = Ad::where('user_id', auth()->id())->latest()->get();
        // return view('dashboard', compact('ads'));
    }



        public function index()
    {
        $ads = Ad::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('ads'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $ad = Ad::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('ads_photos', 'public');
                AdPhoto::create([
                    'ad_id' => $ad->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Valid.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|integer|min:0',
        'location' => 'required|string|max:255',
        'photos.*' => 'image|mimes:jpg,jpeg,png|max:5120',
    ]);

    // Mise à jour 
    $ad->update([
        'title' => $request->title,
        'category' => $request->category,
        'description' => $request->description,
        'price' => $request->price,
        'location' => $request->location,
    ]);

    // Ajout photo
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('ads_photos', 'public');
            $ad->photos()->create(['path' => $path]);
        }
    }

    return redirect()->route('dashboard')->with('success');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        // Supprimer photos 
        foreach ($ad->photos as $photo) {
            \Storage::disk('public')->delete($photo->path);
            $photo->delete();
        }

        $ad->delete();

        return redirect()->route('dashboard')->with('success');
    }
}