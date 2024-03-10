<?php

use App\Http\Controllers\backend\ContactsController;
use App\Http\Controllers\backend\EducationExperienceSkillsController;
use App\Http\Controllers\backend\HeroPropertiesController;
use App\Http\Controllers\backend\ProjectsController;
use App\Http\Controllers\backend\ResumeController;
use App\Http\Controllers\backend\ServicesController;
use App\Http\Controllers\backend\SkillsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/herosection', [HeroPropertiesController::class, 'pages'])->name('hero.page');
Route::get('/services', [ServicesController::class, 'pages'])->name('services.page');
Route::get('/projects', [ProjectsController::class, 'pages'])->name('project.page');
Route::get('/skils', [SkillsController::class, 'pages'])->name('skils.page');
Route::get('/contacts', [ContactsController::class, 'pages'])->name('contacts.page');
Route::get('/resume', [ResumeController::class, 'pages'])->name('resume.page');



Route::get('/herosectionData', [HeroPropertiesController::class, 'herosection'])->name('herosection.data');
Route::get('/resumeData', [HeroPropertiesController::class, 'resume'])->name('resume.data');
Route::get('/socialData', [HeroPropertiesController::class, 'social'])->name('social.data');
Route::get('/servicesData', [ServicesController::class, 'service'])->name('services.data');
Route::get('/projectdata', [ProjectsController::class, 'project'])->name('project.data');
Route::get('/educationData', [ResumeController::class, 'education'])->name('education.data');
Route::get('/exprienceData', [ResumeController::class, 'exprience'])->name('exprience.data');
Route::get('/skilData', [SkillsController::class, 'skil'])->name('skils.data');
Route::get('/contactData', [ContactsController::class, 'contact'])->name('contacts.data');
Route::get('/aboutmeData', [ContactsController::class, 'aboutme'])->name('aboutme.data');