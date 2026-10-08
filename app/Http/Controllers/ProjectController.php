<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects', [
            'projects' => Project::with('client')->latest('created_at')->paginate(15),
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $ownerId = $request->user()->getKey();

        $storedPaths = [];

        try {
            DB::transaction(function () use ($request, $data, $ownerId, &$storedPaths): void {
                $isInternal = $data['project_type'] === 'internal';
                $client = $isInternal
                    ? null
                    : Client::firstOrCreate(['name' => trim($data['client_name'])]);

                $project = Project::create([
                    ...Arr::only($data, ['name', 'description', 'tech_stack', 'link_demo']),
                    'user_id' => $ownerId,
                    'client_id' => $client?->getKey(),
                    'is_internal' => $isInternal,
                    'is_visible' => false,
                ]);

                $images = $request->file('images', []);
                $coverIndex = (int) ($data['cover_image'] ?? 0);

                if (isset($images[$coverIndex])) {
                    $cover = $images[$coverIndex];
                    unset($images[$coverIndex]);
                    $images = [$cover, ...array_values($images)];
                }

                foreach ($images as $sortOrder => $image) {
                    $path = $image->store("projects/{$project->getKey()}", 'public');
                    $storedPaths[] = $path;
                    $project->images()->create([
                        'image_path' => $path,
                        'sort_order' => $sortOrder,
                    ]);
                }
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPaths);
            throw $exception;
        }

        return to_route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }
}
