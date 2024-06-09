<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
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
        return view('admin.dashboard', compact('totalDestinations', 'totalEvents', 'totalUsers'));
    }

    public function view_pdf()
    {
        $destinations = Destination::all();

        $data = [
            'title' => 'JakIngfo  - List Destinasi',
            'date' => date('d/m/Y'),
            'destinations' => $destinations
        ];

        $pdf = Pdf::loadView('admin.destinations.listpdf', $data);
        return $pdf->download('destinations.pdf');
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
}
