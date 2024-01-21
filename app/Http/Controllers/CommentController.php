<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Method to store a new comment
    public function store(Request $request, Property $property)
    {
        $request->validate([
            'body' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::id();
        $comment->property_id = $property->id;
        $comment->parent_id = $request->parent_id; // for replies to other comments
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }

    // Optional: Method to display comments for a property
    public function index(Property $property)
    {
        $comments = $property->comments()->with('replies')->get();

        // Assuming you're returning a view
        return view('properties.comments', compact('comments'));
    }
}
