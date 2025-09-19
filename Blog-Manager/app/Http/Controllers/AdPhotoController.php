<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdPhotoController extends Controller
{
    /**
     * Upload un photo dans annonce.
     */
    public function store(Request $request, Ad $ad)
    {
        // Valid  photo
        $request->validate([
            'photo' => ['required', 'image', 'max:2048'], 
        ]);

        // Stocker  photo dans  doss public
        $path = $request->file('photo')->store('ads', 'public');

        // Enregistrer base
        $ad->photos()->create([
            'path' => $path,
        ]);

        return back()->with('success', 'Photo ajoutée.');
    }

    /**
     * Supprim photo dans annonce.
     */
    public function destroy(AdPhoto $photo)
    {
        // 
        Storage::disk('public')->delete($photo->path);

        // Supprimer  base
        $photo->delete();

        return back()->with('success', 'Photo supprimée.');
    }
}