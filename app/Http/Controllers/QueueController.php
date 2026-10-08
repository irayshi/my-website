<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class QueueController extends Controller
{
    public function index(): View
    {
        return view('admin.queue', [
            'projects' => Project::with('client')
                ->where('is_internal', false)
                ->whereNull('finished_at')
                ->oldest('created_at')
                ->paginate(15),
        ]);
    }

    public function start(Project $project): RedirectResponse
    {
        $this->ensureExternalProject($project);

        if ($project->finished_at) {
            throw ValidationException::withMessages(['project' => 'Proyek yang sudah selesai tidak dapat diproses kembali.']);
        }

        $project->update(['started_at' => $project->started_at ?? now()]);

        return back()->with('success', 'Proyek mulai diproses.');
    }

    public function finish(Project $project): RedirectResponse
    {
        $this->ensureExternalProject($project);

        if (! $project->started_at) {
            throw ValidationException::withMessages(['project' => 'Mulai proses proyek terlebih dahulu.']);
        }

        if (! $project->finished_at) {
            $project->update(['finished_at' => now()]);
        }

        return back()->with('success', 'Proyek telah diselesaikan.');
    }

    private function ensureExternalProject(Project $project): void
    {
        abort_if($project->is_internal, 404);
    }
}
