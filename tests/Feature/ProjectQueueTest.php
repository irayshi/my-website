<?php

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function externalProject(array $attributes = []): Project
{
    return Project::create(['user_id' => User::factory()->create()->id, 'client_id' => Client::create(['name' => 'Klien Antrean'])->id, 'name' => 'Proyek Antrean', 'description' => 'Deskripsi', 'tech_stack' => 'Laravel', 'is_internal' => false, 'is_visible' => false, ...$attributes]);
}

it('menampilkan proyek eksternal baru dalam antrian', function () {
    $project = externalProject();
    $this->get(route('antrian'))->assertOk()->assertSee($project->name);
});

it('mencatat waktu mulai dan selesai dari aksi admin', function () {
    $admin = User::factory()->create();
    $project = externalProject(['user_id' => $admin->id]);
    $this->actingAs($admin)->patch(route('admin.queue.start', $project))->assertRedirect();
    expect($project->fresh()->started_at)->not->toBeNull();
    $this->patch(route('admin.queue.finish', $project))->assertRedirect();
    expect($project->fresh()->finished_at)->not->toBeNull();
});

it('menolak penyelesaian proyek yang belum dimulai', function () {
    $admin = User::factory()->create();
    $project = externalProject(['user_id' => $admin->id]);
    $this->actingAs($admin)->patch(route('admin.queue.finish', $project))->assertSessionHasErrors('project');
});
