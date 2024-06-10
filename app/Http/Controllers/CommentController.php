<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'approve', 'adminIndex', 'destroy']);
    }

    public function index()
    {
        $comments = Comment::where('approved', true)->get();
        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return to_route('comments.index')->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function adminIndex()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return to_route('admin.comments.index')->with('success', 'Komentar berhasil disetujui dan akan tampil di halaman utama.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return to_route('admin.comments.index')->with('success', 'Komentar berhasil dihapus.');
    }
}
