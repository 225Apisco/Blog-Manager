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
            'content' => 'required|string|max:1000',
        ]);

        $ad->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Commentaire ajouté !');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();
        return back()->with('success', 'Commentaire supprimé !');
    }
}
