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
                'title' => 'Nasdaq Website',
                'description' => 'Contributed to the redesign and rebuilding of the Nasdaq website, resolving critical UI/UX issues that other developers were unable to fix, and ensuring a visually compelling, responsive, and user-friendly experience across all platforms.',
                'image' => 'https://www.nasdaq.com/sites/acquia.prod/files/2024/04/05/Nasdaq%20default%20share%20image.jpg?1924075222',
                'link' => 'https://www.nasdaq.com'
            ],
            [
                'title' => 'March of Dimes Website',
                'description' => 'a SPA (Single Page Application) built with JavaScript & GreenSock, which allows users to donate to the March of Dimes charity organization.',
                'image' => 'https://mod-proto.netlify.app//.netlify/images?url=https://d33wubrfki0l68.cloudfront.net/5d8cff4b4d37577baf226ba7/screenshot.png',
                'link' => 'https://mod-proto.netlify.app/'
            ],
            [
                'title' => 'Unicef Website',
                'description' => 'a SPA (Single Page Application) built with JavaScript & GreenSock, which allows users to donate to the Unicef charity organization.',
                'image' => 'https://unicef-nox.netlify.app/images/bg.jpg',
                'link' => 'https://unicef-nox.netlify.app/'
            ],
            // Add more projects...
        ],
        'skills' => ['React', 'Redux', 'TypeScript', 'Vue.js', 'JavaScript', 'PHP', 'Laravel', 'MySQL', 'Tailwind CSS', 'Git', 'VPS Server Management'],
    ]);
});