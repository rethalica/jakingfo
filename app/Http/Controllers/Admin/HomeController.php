<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalDestinations = Destination::count();
        $totalEvents = Event::count();

        return view('admin.dashboard', compact('totalDestinations', 'totalEvents'));
    }
}
