<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'projects' => Project::count(),
                'services' => Service::count(),
                'clients' => Client::count(),
                'reviews' => Review::count(),
            ],
            'latestProjects' => Project::with('client')->latest('created_at')->limit(5)->get(),
        ]);
    }

    public function projects(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::with('client')->latest('created_at')->paginate(15),
        ]);
    }

    public function services(): View
    {
        return view('admin.services.index', [
            'services' => Service::latest()->paginate(15),
        ]);
    }

    public function clients(): View
    {
        return view('admin.clients.index', [
            'clients' => Client::withCount(['projects', 'reviews'])->latest()->paginate(15),
        ]);
    }

    public function reviews(): View
    {
        return view('admin.reviews.index', [
            'reviews' => Review::with(['client', 'project'])->latest('submitted_at')->paginate(15),
        ]);
    }
}
