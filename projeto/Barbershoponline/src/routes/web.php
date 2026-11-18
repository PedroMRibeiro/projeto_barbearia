<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BarbersController;
use App\Http\Controllers\AvailabilitiesController;
use App\Http\Controllers\AppointmentsController;

// Rotas públicas

Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/sobre', [SiteController::class, 'about'])->name('site.about');
Route::get('/servicos', [SiteController::class, 'services'])->name('site.services');
Route::get('/contactos', [SiteController::class, 'contacts'])->name('site.contacts');
Route::get('/marcacoes', [SiteController::class, 'appointmentsStep1'])->name('site.appointmentsStep1');
Route::get('/marcacoes/{barber}', [SiteController::class, 'appointmentsStep2'])->name('site.appointmentsStep2');
Route::get('/marcacoes/{barber}/{availability}', [SiteController::class, 'appointmentsStep3'])->name('site.appointmentsStep3');
Route::get('/marcacoes/{barber}/{availability}/{service}', [SiteController::class, 'appointmentsStep4'])->name('site.appointmentsStep4');
Route::post('/marcacoes', [SiteController::class, 'appointmentsStore'])->name('site.appointmentsStore');
Route::get('/marcacao/{appointment}', [SiteController::class, 'appointment'])->name('site.appointment');


Route::get('/privacidade', [SiteController::class, 'privacy'])->name('footer.privacy');
Route::get('/termosecondicoes', [SiteController::class, 'term'])->name('footer.term');
Route::get('/cookies', [SiteController::class, 'cookie'])->name('footer.cookie');



// Rotas utilizadores autenticados
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    //Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Utilizadores
    Route::get('/admin/utilizadores', [UsersController::class, 'index'])->name('users.index');
    Route::get('/admin/utilizadores/novo', [UsersController::class, 'new'])->name('users.new');
    Route::post('/admin/utilizadores', [UsersController::class, 'store'])->name('users.store');

    Route::get('/admin/utilizadores/editar/{user}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/admin/utilizadores/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/admin/utilizadores/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/utilizadores/{user}', [UsersController::class, 'read'])->name('users.read');

    //Serviços
    Route::get('/admin/servicos', [ServicesController::class, 'index'])->name('services.index');
    Route::get('/admin/servicos/novo', [ServicesController::class, 'new'])->name('services.new');
    Route::post('/admin/servicos', [ServicesController::class, 'store'])->name('services.store');

    Route::get('/admin/servicos/editar/{service}', [ServicesController::class, 'edit'])->name('services.edit');
    Route::put('/admin/servicos/{service}', [ServicesController::class, 'update'])->name('services.update');
    Route::delete('/admin/servicos/{service}', [ServicesController::class, 'destroy'])->name('services.destroy');
    Route::get('/admin/servicos/{service}', [ServicesController::class, 'read'])->name('services.read');

    //Barbeiros
    Route::get('/admin/barbeiros', [BarbersController::class, 'index'])->name('barbers.index');
    Route::get('/admin/barbeiros/novo', [BarbersController::class, 'new'])->name('barbers.new');
    Route::post('/admin/barbeiros', [BarbersController::class, 'store'])->name('barbers.store');
    
    Route::get('/admin/barbeiros/editar/{barber}', [BarbersController::class, 'edit'])->name('barbers.edit');
    Route::put('/admin/barbeiros/{barber}', [BarbersController::class, 'update'])->name('barbers.update');
    Route::delete('/admin/barbeiros/{barber}', [BarbersController::class, 'destroy'])->name('barbers.destroy');
    Route::get('/admin/barbeiros/{barber}', [BarbersController::class, 'read'])->name('barbers.read');

    //Disponibilidades
    
    Route::get('/admin/disponibilidades', [AvailabilitiesController::class, 'index'])->name('availabilities.index');
    Route::get('/admin/disponibilidades/novo', [AvailabilitiesController::class, 'new'])->name('availabilities.new');
    Route::post('/admin/disponibilidades', [AvailabilitiesController::class, 'store'])->name('availabilities.store');
        
    Route::get('/admin/disponibilidades/editar/{availability}', [AvailabilitiesController::class, 'edit'])->name('availabilities.edit');
    Route::put('/admin/disponibilidades/{availability}', [AvailabilitiesController::class, 'update'])->name('availabilities.update');
    Route::delete('/admin/disponibilidades/{availability}', [AvailabilitiesController::class, 'destroy'])->name('availabilities.destroy');
    Route::get('/admin/disponibilidades/{availability}', [AvailabilitiesController::class, 'read'])->name('availabilities.read');
    Route::post('/admin/criar_disponibilidades', [AvailabilitiesController::class, 'weekplan'])->name('availabilities.weekplan');

    //Agenda
    Route::get('/admin/agenda', [AppointmentsController::class, 'index'])->name('appointments.index');
    Route::get('/admin/agenda/novo', [AppointmentsController::class, 'new'])->name('appointments.new');
    Route::post('/admin/agenda', [AppointmentsController::class, 'store'])->name('appointments.store');
            
    Route::get('/admin/agenda/editar/{appointment}', [AppointmentsController::class, 'edit'])->name('appointments.edit');
    Route::put('/admin/agenda/{appointment}', [AppointmentsController::class, 'update'])->name('appointments.update');
    Route::delete('/admin/agenda/{appointment}', [AppointmentsController::class, 'destroy'])->name('appointments.destroy');
    Route::get('/admin/agenda/{appointment}', [AppointmentsController::class, 'read'])->name('appointments.read');
    
});

require __DIR__.'/auth.php';
