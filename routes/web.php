<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/portfolio', function () {
    return view('portfolio', [
        'name' => 'Henry Richardson',
        'title' => 'Full Stack Web Developer',
        'about' => 'I am a passionate web developer with 20+ years of experience',
        'projects' => [
            [
                'title' => 'E-commerce Platform',
                'description' => 'A fully functional online store built with Laravel and Vue.js',
                'image' => 'https://example.com/path/to/image.jpg',
                'link' => '#'
            ],
            [
                'title' => 'E-commerce Platform 2',
                'description' => 'A fully functional online store built with Laravel and Vue.js',
                'image' => 'https://example.com/path/to/image.jpg',
                'link' => '#'
            ],
            // Add more projects...
        ],
        'skills' => ['PHP', 'Laravel', 'JavaScript', 'Vue.js', 'MySQL', 'Tailwind CSS', 'Git'],
    ]);
});