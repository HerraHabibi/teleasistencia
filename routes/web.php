<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\EntrantesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvaluarController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\SalientesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas que requieren autenticación
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    // Rutas de gestión
    Route::prefix('gestion')->group(function(){
        Route::get('/', [GestionController::class, 'index'])->name('gestion.index'); 
        Route::get('alta', [GestionController::class, 'create'])->name('gestion.altabeneficiario');
        Route::post('alta', [GestionController::class, 'store'])->name('gestion.store');
        Route::get('actualizar', function () {
            return view('gestion.modificarbeneficiario');
        })->name('gestion.actualizar');
        Route::post('actualizar', [GestionController::class, 'buscar'])->name('gestion.buscar.beneficiario');
        Route::put('actualizar/{id}', [GestionController::class, 'update'])->name('gestion.actualizar.beneficiario');
        Route::get('/error', [GestionController::class, 'error'])->name('gestion.error');
        Route::get('/errorContacto', [GestionController::class, 'errorContacto'])->name('gestion.error.contacto');
        Route::get('/contactos', [GestionController::class, 'contactos'])->name('gestion.contactos');
        Route::post('/contactos', [GestionController::class, 'contactosbusqueda'])->name('gestion.contactos.buscar');
        Route::get('/contactos/crear', [GestionController::class, 'crearcontactos'])->name('gestion.crear.contactos');
        Route::post('/contactos/crear', [GestionController::class, 'crearContacto'])->name('gestion.crear.contactos.post');
        Route::get('/baja', [GestionController::class, 'showDeleteForm'])->name('gestion.borrar.beneficiario.form');
        Route::post('/baja', [GestionController::class, 'searchBeneficiario'])->name('gestion.borrar.beneficiario');
        Route::delete('/baja/{id}', [GestionController::class, 'deleteBeneficiario'])->name('gestion.eliminar.beneficiario');
        Route::post('/buscar/guardar', [GestionController::class, 'interesguardar'])->name('gestion.interes.guardar');
        Route::get('/contactos/buscar', [GestionController::class, 'buscarcontacto'])->name('gestion.contactos.buscar.mod');
        Route::post('/contactos/buscar', [GestionController::class, 'buscarPorEmail'])->name('gestion.contactos.buscar.mod.email');
        Route::post('/contactos/modificar', [GestionController::class, 'modificarContacto'])->name('gestion.contactos.modificar');
    });

    // Rutas de entrantes
    Route::prefix('entrantes')->group(function(){
        Route::get('/', [EntrantesController::class, 'index'])->name('entrantes.index');
        Route::get('/register', [EntrantesController::class, 'create'])->name('entrantes.create');
        Route::get('/cita', [EntrantesController::class, 'register'])->name('entrantes.cita');
        Route::post('/cita', [EntrantesController::class, 'registrarcita'])->name('entrantes.rescita');
        Route::post('/store', [EntrantesController::class, 'store'])->name('entrantes.store');
    });

    // Rutas de salientes
    Route::prefix('salientes')->group(function(){
        Route::get('/', [SalientesController::class, 'index'])->name('salientes.index');
        Route::get('/register', [SalientesController::class, 'create'])->name('salientes.create');
        Route::post('/', [SalientesController::class, 'store'])->name('salientes.store');
    });

    // Rutas de informes
    Route::prefix('informes')->group(function(){
        Route::get('/', [InformesController::class, 'index'])->name('informes.index');
        Route::get('/beneficiarios', [InformesController::class, 'infoBeneficiarios'])->name('informes.beneficiarios.buscar');
        Route::get('/contactos', [InformesController::class, 'buscarContacto'])->name('informes.contactos.buscar');

        Route::get('/previstas', [InformesController::class, 'llamadasprevistas'])->name('informes.previstas');
        Route::post('/previstas', [InformesController::class, 'buscarprevistas'])->name('informes.previstas.buscar');

        Route::get('/informes-beneficiario', function () {
            return view('informes.buscar_beneficiario');
        })->name('informes.informes-beneficiario');
        Route::post('/informes-beneficiario', [InformesController::class, 'buscarBeneficiario'])->name('informes.buscar-beneficiario');

        Route::get('/informes-teleoperador', function () {
            return view('informes.buscar_teleoperador');
        })->name('informes.informes-teleoperador');
        Route::post('/informes-teleoperador', [InformesController::class, 'buscarTeleoperador'])->name('informes.buscar-teleoperador');
        
        Route::prefix('llamadas')->group(function () {
            Route::get('/previstas', [InformesController::class, 'llamadasprevistas'])->name('informes.llamadas.previstas');
            Route::get('/entrantes/hoy', [InformesController::class, 'llamadasEntrantesHoy'])->name('informes.llamadas.entrantes.hoy');
            Route::get('/entrantes/siempre', [InformesController::class, 'llamadasEntrantesSiempre'])->name('informes.llamadas.entrantes.siempre');
            Route::get('/salientes/hoy', [InformesController::class, 'llamadasSalientesHoy'])->name('informes.llamadas.salientes.hoy');
            Route::get('/salientes/siempre', [InformesController::class, 'llamadasSalientesSiempre'])->name('informes.llamadas.salientes.siempre');
        });
    });

    //Rutas Usuarios
    Route::prefix('usuarios')->middleware('check.perfil:1')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('usuarios');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
        Route::post('/{usuario}/verificar', [UserController::class, 'verificar'])->name('usuarios.verificar');
    });
    //Rutas evaluación
    Route::prefix('evaluar')->group(function(){
        Route::get('/', [EvaluarController::class, 'index'])->name('evaluar.index');
        Route::get('/usuario', [EvaluarController::class, 'evaluarUsuario'])->name('evaluar.usuario');
        Route::post('/usuario', [EvaluarController::class, 'storeUsuario'])->name('evaluar.usuario.store');
        Route::get('/teleoperador', [EvaluarController::class, 'evaluarTeleoperador'])->name('evaluar.teleoperador');
        Route::post('/teleoperador', [EvaluarController::class, 'storeTeleoperador'])->name('evaluar.teleoperador.store');
        Route::get('/verTeleoperador', [EvaluarController::class, 'verTeleoperador'])->name('evaluar.verTeleoperador');
    });
    //Rutas audios
    Route::prefix('audios')->group(function(){
        Route::get('/', [AudioController::class, 'index'])->name('audios.index');
    });

});

    // Rutas de registro
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
// Ruta de inicio
