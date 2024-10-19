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

// Test Finished
Breadcrumbs::for('test-finished', function (BreadcrumbTrail $trail) {
    $trail->push('Tes Selesai');
});