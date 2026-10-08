<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects', [
            'projects' => Project::with('client')->latest('created_at')->paginate(15),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'video_demo' => 'nullable|file|mimes:mp4',
            'link_repo' => 'nullable|string',
            'link_demo' => 'nullable|string',
            'is_internal' => 'required|boolean',
            'started_at' => 'nullable|date',
            'finished_at' => 'nullable|date',
            'canceled_at' => 'nullable|date',
            'client_id' => 'nullable|integer',
            'client_name' => 'required|string',
        ]);

        $videoDemo = null;

        try {
            DB::transaction(function () use ($request, $data, &$videoDemo) {

                if (empty($data['client_id'])) {
                    $client = Client::create([
                        'name' => $data['client_name'],
                    ]);
                    $clientId = $client->id;
                } else {
                    $clientId = $data['client_id'];
                }

                if ($request->hasFile('video_demo')) {
                    $videoDemo = $request->file('video_demo')->store('uploads', 'public');
                }

                Project::create([
                    ...Arr::except($data, ['video_demo', 'client_id', 'client_name']),
                    'video_demo' => $videoDemo,
                    'user_id' => Auth::id(),
                    'client_id' => $clientId,
                ]);
            });
        } catch (\Throwable $th) {
            if ($videoDemo) {
                Storage::disk('public')->delete($videoDemo);
            }
            throw $th;
        }

        return to_route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }
}
