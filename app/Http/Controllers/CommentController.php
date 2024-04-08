<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $req) {
        return $comment = Comment::create($req->all());
    }

    public function destroy($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return 204;
    }
}
