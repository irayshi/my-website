<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;

class QueueBoardController extends Controller
{
    public function __invoke(): View
    {
        $externalProjects = Project::with('client')->where('is_internal', false);

        return view('site.antrian', [
            'activeProjects' => (clone $externalProjects)
                ->whereNull('finished_at')
                ->oldest('created_at')
                ->get(),
            'completedProjects' => (clone $externalProjects)
                ->whereNotNull('finished_at')
                ->where('finished_at', '>=', now()->subDays(30))
                ->latest('finished_at')
                ->get(),
        ]);
    }
}
