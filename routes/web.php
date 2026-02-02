<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HeaderFooterController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\FrontendController;

// Frontend Routes (Dynamic)
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/impressum', [FrontendController::class, 'impressum'])->name('impressum');
Route::get('/datenschutzerklarung', [FrontendController::class, 'datenschutz'])->name('datenschutzerklarung');
Route::get('/blog', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Protected Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Homepage Content
    Route::get('/homepage', [SectionController::class, 'homepage'])->name('homepage');
    Route::post('/homepage', [SectionController::class, 'updateHomepage'])->name('homepage.update');

    // About Page (commented out)
    // Route::get('/about', [SectionController::class, 'about'])->name('about');
    // Route::post('/about', [SectionController::class, 'updateAbout'])->name('about.update');

    // Services Page (commented out)
    // Route::get('/services', [SectionController::class, 'services'])->name('services');
    // Route::post('/services', [SectionController::class, 'updateServices'])->name('services.update');

    // Image Manager
    Route::get('/images', [MediaController::class, 'images'])->name('images');
    Route::post('/media/upload', [MediaController::class, 'upload'])->name('media.upload');
    Route::put('/media/{media}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::post('/media/{media}/replace', [MediaController::class, 'replace'])->name('media.replace');

    // Video Manager (commented out)
    // Route::get('/videos', [MediaController::class, 'videos'])->name('videos');

    // Blog Manager (commented out)
    // Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    // Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    // Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    // Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    // Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    // Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    // Leads Manager
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
    Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.status');
    Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');

    // Header & Footer (site menu and footer content)
    Route::get('/header-footer', [HeaderFooterController::class, 'index'])->name('header-footer');
    Route::post('/header-footer', [HeaderFooterController::class, 'update'])->name('header-footer.update');

    // Pages (list all site pages and edit Impressum/Datenschutz)
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/impressum', [PageController::class, 'editImpressum'])->name('pages.impressum');
    Route::post('/pages/impressum', [PageController::class, 'updateImpressum'])->name('pages.impressum.update');
    Route::get('/pages/datenschutz', [PageController::class, 'editDatenschutz'])->name('pages.datenschutz');
    Route::post('/pages/datenschutz', [PageController::class, 'updateDatenschutz'])->name('pages.datenschutz.update');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::post('/settings/password', [SettingController::class, 'updatePassword'])->name('settings.password');
});
