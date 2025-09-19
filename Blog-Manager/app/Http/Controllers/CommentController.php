<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Ad $ad)
    {
        $request->validate([
            'content' => 'required|string',
            'user_name' => 'nullable|string|max:100'
        ]);

        $ad->comments()->create([
            'user_name' => $request->user_name,
            'content' => $request->content
        ]);

        return redirect()->back();
    }
}
