<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function comments(CreateCommentRequest $request)
    {
        Comments::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id
        ]);

        return redirect()->back();
    }

    
}
