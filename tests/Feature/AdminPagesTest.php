<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

uses(RefreshDatabase::class);

it('menampilkan seluruh halaman admin dari database', function (string $routeName) {
    $this->actingAs(User::factory()->create())->get(route($routeName))->assertOk();
})->with([
    'dashboard' => 'admin.dashboard',
    'proyek' => 'admin.projects.index',
    'antrian' => 'admin.queue.index',
    'jasa' => 'admin.services.index',
    'klien' => 'admin.clients.index',
    'ulasan' => 'admin.reviews.index',
]);
