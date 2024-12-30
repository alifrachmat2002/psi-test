<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// GHQ Test
Breadcrumbs::for('test-ghq', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('GHQ Test');
});

// DASS21 Test
Breadcrumbs::for('test-dass21', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('DASS21 Test');
});

// HSCL25 Test
Breadcrumbs::for('test-hscl25', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('HSCL25 Test');
});

// HTQ Test
Breadcrumbs::for('test-htq', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('HTQ Test');
});

// Test Finished
Breadcrumbs::for('test-finished', function (BreadcrumbTrail $trail) {
    $trail->push('Tes Selesai');
});

// Hasil Test Index
Breadcrumbs::for('hasil.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Riwayat Hasil Test', route('hasil.index'));
});

// User Management
Breadcrumbs::for('admin.users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Edit User', route('admin.users'));
});

// Admin User Create
Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push('Create User', route('admin.users.create'));
});

// User Edit
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('admin.users');
    $trail->push($user->name, route('admin.users.edit', $user));
});

// Admin Rekap
Breadcrumbs::for('admin.rekap', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Rekap Hasil Tes', route('admin.rekap'));
});

// Materials
Breadcrumbs::for('materials', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Materi dan Panduan', route('materials'));
});

// Materials Create
Breadcrumbs::for('admin.materials.create', function (BreadcrumbTrail $trail) {
    $trail->parent('materials');
    $trail->push('Unggah Materi dan Panduan Baru', route('admin.materials.create'));
});

// Materials Show
Breadcrumbs::for('materials.show', function (BreadcrumbTrail $trail, $material) {
    $trail->parent('materials');
    $trail->push($material->judul, route('materials.show', $material));
});

// Materials Edit
Breadcrumbs::for('admin.materials.edit', function (BreadcrumbTrail $trail, $material) {
    $trail->parent('materials.show', $material);
    $trail->push('Edit Materi dan Panduan', route('admin.materials.edit', $material));
});

// User Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profil Saya', route('profile'));
});