<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Destination;
use App\Models\Event;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        $totalDestinations = Destination::count();
        $totalEvents = Event::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalApprovedComments = Comment::where('approved', true)->count();
        $totalUnapprovedComments = Comment::where('approved', false)->count();
        return view('admin.dashboard', compact('totalDestinations', 'totalEvents', 'totalUsers', 'totalApprovedComments', 'totalUnapprovedComments'));
    }

    public function user_pdf()
    {

        $users = User::where('role', 'user')->get();

        $data = [
            'title' => 'JakIngfo  - List User',
            'date' => date('d/m/Y'),
            'users' => $users
        ];

        $pdf = Pdf::loadView('admin.listpdf', $data);
        return $pdf->download('users.pdf');
    }

    public function user_excel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function comments_pdf()
    {

        $comments = Comment::where('approved', true)->get();

        $data = [
            'title' => 'JakIngfo  - Data komentar',
            'date' => date('d/m/Y'),
            'comments' => $comments
        ];

        $pdf = Pdf::loadView('admin.commentpdf', $data);
        return $pdf->download('comments.pdf');
    }
}
