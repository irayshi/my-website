<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('menyimpan proyek eksternal beserta kliennya', function () {
    $this->actingAs(User::factory()->create());

    $this->post(route('admin.projects.store'), [
        'name' => 'Website Company Profile',
        'project_type' => 'external',
        'client_name' => 'PT Nusantara Digital',
        'description' => 'Website profil perusahaan.',
        'tech_stack' => 'Laravel, Tailwind CSS',
    ])->assertRedirectToRoute('admin.projects.index');

    $this->assertDatabaseHas('clients', ['name' => 'PT Nusantara Digital']);
    $this->assertDatabaseHas('projects', [
        'name' => 'Website Company Profile',
        'is_internal' => false,
        'is_visible' => false,
    ]);
});

it('menyimpan proyek internal tanpa klien', function () {
    $this->actingAs(User::factory()->create());

    $this->post(route('admin.projects.store'), [
        'name' => 'Produk Internal',
        'project_type' => 'internal',
        'description' => 'Produk milik sendiri.',
        'tech_stack' => 'Laravel',
    ])->assertRedirectToRoute('admin.projects.index');

    $this->assertDatabaseHas('projects', [
        'name' => 'Produk Internal',
        'client_id' => null,
        'is_internal' => true,
    ]);
});

it('memvalidasi data wajib proyek', function () {
    $this->actingAs(User::factory()->create());

    $this->post(route('admin.projects.store'), [
        'project_type' => 'external',
    ])->assertSessionHasErrors(['name', 'client_name', 'description', 'tech_stack']);
});

it('mengizinkan link gambar dan tanggal tidak diisi', function () {
    $this->actingAs(User::factory()->create());
    $this->post(route('admin.projects.store'), ['name' => 'Proyek Tanpa Lampiran', 'project_type' => 'external', 'client_name' => 'Klien Baru', 'description' => 'Tidak memiliki lampiran.', 'tech_stack' => 'Laravel'])->assertRedirectToRoute('admin.projects.index');
    $this->assertDatabaseHas('projects', ['name' => 'Proyek Tanpa Lampiran', 'link_demo' => null, 'started_at' => null, 'finished_at' => null]);
});
