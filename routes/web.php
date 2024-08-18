<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    TrajetController,
    ProfileController,
    SearchController,
    Auth\LoginController,
    Auth\LogoutController,
    Auth\RegisterController,
    HomePageSettingController,
    UserController,
    AdminController
};

// Routes d'authentification
Route::get('signin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('signin', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Routes du profil
Route::prefix('profile')->group(function () {
    Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('delete-picture', [ProfileController::class, 'deletePicture'])->name('profile.deletePicture');
    Route::get('delete-national-id-recto', [ProfileController::class, 'deleteNationalIdRecto'])->name('profile.deleteNationalIdRecto');
    Route::get('delete-national-id-verso', [ProfileController::class, 'deleteNationalIdVerso'])->name('profile.deleteNationalIdVerso');
});

// Routes des trajets
Route::prefix('trajets')->group(function () {
    Route::get('/', [TrajetController::class, 'index'])->name('trajets.index');
    Route::get('create', [TrajetController::class, 'create'])->name('trajet.create');
    Route::post('/', [TrajetController::class, 'store'])->name('trajet.store');
    Route::get('{id}/edit', [TrajetController::class, 'edit'])->name('trajet.edit');
    Route::put('{id}', [TrajetController::class, 'update'])->name('trajet.update');
    Route::delete('{id}', [TrajetController::class, 'destroy'])->name('trajet.destroy');
});

// Routes de recherche
Route::get('search', [SearchController::class, 'index'])->name('search.index');
Route::get('results', [SearchController::class, 'results'])->name('search.results');

// Routes d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home/settings', [HomePageSettingController::class, 'index'])->name('home.settings');

// Routes des paramètres de la page d'accueil
Route::prefix('homepage-settings')->group(function () {
    Route::get('edit', [HomePageSettingController::class, 'edit'])->name('homepage-settings.edit');
    Route::put('update', [HomePageSettingController::class, 'update'])->name('homepage-settings.update');
    Route::delete('delete-image/{type}', [HomePageSettingController::class, 'deleteImage'])->name('homepage-settings.deleteImage');
});

// Routes des utilisateurs
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Routes administratives
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('settings/edit', [AdminController::class, 'editSettings'])->name('admin.settings.edit');
    Route::put('settings/update-email', [AdminController::class, 'updateEmail'])->name('admin.updateEmail');
    Route::put('settings/update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword'); // Mise à jour du mot de passe
});




Route::get('/a-propos', function () {
    return view('front.a-propos'); // ØµÙÂÂÂÂÂÂØ­Ø© À propos
});

Route::get('/services', function () {
    return view('front.services'); // ØµÙÂÂÂÂÂÂØ­Ø© Services
});

Route::get('/contactez-nous', function () {
    return view('front.contactez-nous'); // ØµÙÂÂÂÂÂÂØ­Ø© Contactez-nous
});
Route::get('/a-propos', [HomePageSettingController::class, 'show'])->name('about');


use App\Http\Controllers\BlogController;

Route::resource('blogs', BlogController::class)->middleware('auth');

// Ø§ÙÂÂÂÙÂÂÂØ³Ø§Ø±Ø§Øª ÙÂÂÂÙÂÂÂÙÂÂÂØ§Ø¬ÙÂÂÂØ© Ø§ÙÂÂÂØ£ÙÂÂÂØ§ÙÂÂÂÙÂÂÂØ©
Route::prefix('blog')->name('front.blog.')->group(function() {
    Route::get('/', [BlogController::class, 'frontIndex'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'frontShow'])->name('show');
});


Route::resource('blogs', BlogController::class);






