<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('menampilkan seluruh halaman admin dari database', function (string $routeName) {
    $this->get(route($routeName))->assertOk();
})->with([
    'dashboard' => 'admin.dashboard',
    'proyek' => 'admin.projects.index',
    'jasa' => 'admin.services.index',
    'klien' => 'admin.clients.index',
    'ulasan' => 'admin.reviews.index',
]);
