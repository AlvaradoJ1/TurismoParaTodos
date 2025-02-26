<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Comentario;
use App\Models\LikeComentario;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TrasnporteController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\RestauranteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitiosController;
use App\Models\Transporte;
use App\Http\Controllers\ComentarioController;
use Illuminate\Http\Request;

Route::get('/', [PruebasController::class, "index"])->name('index');


Route::post("/login", [LoginController::class, 'authenticate'])
    ->name("login.auth")
    ->middleware('throttle:login');


Route::get("/logout", [LoginController::class, 'logout'])->name("logout");

   

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('throttle:login');

    
    Route::get('/registrar', [RegistrarController::class, 'index'])->name('registrar');
});

Route::get('/restaurantes', [RestauranteController::class, 'index'])->name('restaurantes');
Route::get('/restaurantes/restaurante/{id}', [RestauranteController::class, 'verRestaurante'])->name('verRestaurante');

Route::get('/hoteles', [HotelController::class, 'index'])->name('hoteles');
Route::get('/hoteles/hotel/{id}', [HotelController::class, 'verHotel'])->name('verHotel');

Route::get('/transportes', [TrasnporteController::class, 'index'])->name('transportes');
Route::get('/transportes/transporte/{id}', [TrasnporteController::class, 'verTransporte'])->name('verTransporte');

Route::get('/acerca', [PruebasController::class, 'acerca'])->name('acerca');


Route::post('/registrar', [RegistrarController::class, 'store'])->name('registrar.store');


Route::get('/sitios', [SitiosController::class, 'index'])->name('sitios');
Route::get('/sitios/sitio/{id}', [SitiosController::class, 'verSitio'])->name('verSitio');


Route::post('/sitios/sitio/{id}', [ComentarioController::class, 'storeSitio'])->name('comentarios.store.sitio');
Route::post('/restaurantes/restaurante/{id}', [ComentarioController::class, 'storeRestaurante'])->name('comentarios.store.restaurante');
Route::post('/hoteles/hotel/{id}', [ComentarioController::class, 'storeHotel'])->name('comentarios.store.hotel');
Route::post('/transportes/transporte/{id}', [ComentarioController::class, 'storeTransporte'])->name('comentarios.store.transporte');

Route::get('/test-auth', function () {
    return Auth::check() ? 'Usuario autenticado' : 'No autenticado';
});

use App\Http\Controllers\LikeComentarioController;
use App\Models\ComentarioSitio;
use App\Models\ComentarioRestaurante;
use App\Models\ComentarioHotel;
use App\Models\ComentarioTransporte;
use App\Http\Controllers\ThemeController;

Route::post('/set-theme', [ThemeController::class, 'setTheme'])->name('set-theme');

Route::middleware(['role:admin'])->group(function () {
    //admin de sitios
    Route::get('/sitios/admin', [SitiosController::class, 'adminIndex'])->name('sites.index');
    Route::post('/sitios/admin', [SitiosController::class, 'store'])->name('sites.store');
    Route::get('/sitios/admin/{id}', [SitiosController::class, 'updateId'])->name('sites.updateId');
    Route::put('/sitios/admin/{id}', [SitiosController::class, 'update'])->name('sites.update');
    Route::delete('/sitios/admin/{id}', [SitiosController::class, 'destroy'])->name('sites.destroy');

    //admin de restaurantes
    Route::get('/restaurantes/admin', [RestauranteController::class, 'adminIndex'])->name('restaurantes.index');
    Route::post('/restaurantes/admin', [RestauranteController::class, 'store'])->name('restaurantes.store');
    Route::get('/restaurantes/admin/{id}', [RestauranteController::class, 'updateId'])->name('restaurantes.updateId');
    Route::put('/restaurantes/admin/{id}', [RestauranteController::class, 'update'])->name('restaurantes.update');
    Route::delete('/restaurantes/admin/{id}', [RestauranteController::class, 'destroy'])->name('restaurantes.destroy');

    //admin de hoteles
    Route::get('/hoteles/admin', [HotelController::class, 'adminIndex'])->name('hoteles.index');
    Route::post('/hoteles/admin', [HotelController::class, 'store'])->name('hoteles.store');
    Route::get('/hoteles/admin/{id}', [HotelController::class, 'updateId'])->name('hoteles.updateId');
    Route::put('/hoteles/admin/{id}', [HotelController::class, 'update'])->name('hoteles.update');
    Route::delete('/hoteles/admin/{id}', [HotelController::class, 'destroy'])->name('hoteles.destroy');

    //admin de transportes
    Route::get('/transportes/admin', [TrasnporteController::class, 'adminIndex'])->name('transportes.index');
    Route::post('/transportes/admin', [TrasnporteController::class, 'store'])->name('transportes.store');
    Route::get('/transportes/admin/{id}', [TrasnporteController::class, 'updateId'])->name('transportes.updateId');
    Route::put('/transportes/admin/{id}', [TrasnporteController::class, 'update'])->name('transportes.update');
    Route::delete('/transportes/admin/{id}', [TrasnporteController::class, 'destroy'])->name('transportes.destroy');
});



// Ruta para obtener los likes del usuario autenticado
Route::get('/user-likes', function () {

    $userId = Auth::id();
    $likes = LikeComentario::where('usuario_id', $userId)
        ->select('comentario_id', 'tipo') // Obtenemos también el tipo
        ->get();

    return response()->json($likes);
});



Route::post('/likesitio', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 403);
    }

    $comentarioId = $request->input('id');
    $tipo = $request->input('tipo'); // Si realmente necesitas este campo
    $userId = Auth::id();


    //funcionalidad de cometarios sitios
    $comentarioSitio = ComentarioSitio::find($comentarioId);
    if (!$comentarioSitio) {
        return response()->json(['success' => false, 'message' => 'Comentario no encontrado'], 404);
    }

    // Buscar si el usuario ya ha dado "Me Gusta"
    $like = LikeComentario::where('comentario_id', $comentarioId)
        ->where('usuario_id', $userId)
        ->where('tipo', $tipo) // Agregamos la condición para el tipo
        ->first();

    if ($like) {
        // Si ya existe, eliminarlo
        $like->delete();
        $comentarioSitio->decrement('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioSitio->likes_count, 'liked' => false]);
    } else {
        // Si no existe, agregarlo
        LikeComentario::create([
            'comentario_id' => $comentarioId,
            'usuario_id' => $userId,
            'usuario' => Auth::user()->name, // Asegúrate de que `name` es correcto en tu modelo `User`
            'tipo' => $tipo
        ]);
        $comentarioSitio->increment('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioSitio->likes_count, 'liked' => true]);
    }
});



Route::post('/likerestaurante', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 403);
    }

    $comentarioId = $request->input('id');
    $tipo = $request->input('tipo'); // Si realmente necesitas este campo
    $userId = Auth::id();

    //funcionalidad de cometarios Restaurante
    $comentarioRestaurante = ComentarioRestaurante::find($comentarioId);
    if (!$comentarioRestaurante) {
        return response()->json(['success' => false, 'message' => 'Comentario no encontrado'], 404);
    }

    // Buscar si el usuario ya ha dado "Me Gusta"
    $like = LikeComentario::where('comentario_id', $comentarioId)
        ->where('usuario_id', $userId)
        ->where('tipo', $tipo) // Agregamos la condición para el tipo
        ->first();

    if ($like) {
        // Si ya existe, eliminarlo
        $like->delete();
        $comentarioRestaurante->decrement('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioRestaurante->likes_count, 'liked' => false]);
    } else {
        // Si no existe, agregarlo
        LikeComentario::create([
            'comentario_id' => $comentarioId,
            'usuario_id' => $userId,
            'usuario' => Auth::user()->name, // Asegúrate de que `name` es correcto en tu modelo `User`
            'tipo' => $tipo
        ]);
        $comentarioRestaurante->increment('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioRestaurante->likes_count, 'liked' => true]);
    }
});



    //funcionalidad de cometarios Hotel
Route::post('/likehotel', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 403);
    }

    $comentarioId = $request->input('id');
    $tipo = $request->input('tipo'); // Si realmente necesitas este campo
    $userId = Auth::id();


    $comentarioHotel = ComentarioHotel::find($comentarioId);
    if (!$comentarioHotel) {
        return response()->json(['success' => false, 'message' => 'Comentario no encontrado'], 404);
    }

    // Buscar si el usuario ya ha dado "Me Gusta"
    $like = LikeComentario::where('comentario_id', $comentarioId)
        ->where('usuario_id', $userId)
        ->where('tipo', $tipo) // Agregamos la condición para el tipo
        ->first();

    if ($like) {
        // Si ya existe, eliminarlo
        $like->delete();
        $comentarioHotel->decrement('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioHotel->likes_count, 'liked' => false]);
    } else {
        // Si no existe, agregarlo
        LikeComentario::create([
            'comentario_id' => $comentarioId,
            'usuario_id' => $userId,
            'usuario' => Auth::user()->name, // Asegúrate de que `name` es correcto en tu modelo `User`
            'tipo' => $tipo
        ]);
        $comentarioHotel->increment('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioHotel->likes_count, 'liked' => true]);
    }
});







Route::post('/liketransporte', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 403);
    }

    $comentarioId = $request->input('id');
    $tipo = $request->input('tipo'); // Si realmente necesitas este campo
    $userId = Auth::id();

    //funcionalidad de cometarios Transporte
    $comentarioTransporte = ComentarioTransporte::find($comentarioId);
    if (!$comentarioTransporte) {
        return response()->json(['success' => false, 'message' => 'Comentario no encontrado'], 404);
    }

    // Buscar si el usuario ya ha dado "Me Gusta"
    $like = LikeComentario::where('comentario_id', $comentarioId)
        ->where('usuario_id', $userId)
        ->where('tipo', $tipo) // Agregamos la condición para el tipo
        ->first();
    if ($like) {
        // Si ya existe, eliminarlo
        $like->delete();
        $comentarioTransporte->decrement('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioTransporte->likes_count, 'liked' => false]);
    } else {
        // Si no existe, agregarlo
        LikeComentario::create([
            'comentario_id' => $comentarioId,
            'usuario_id' => $userId,
            'usuario' => Auth::user()->name, // Asegúrate de que `name` es correcto en tu modelo `User`
            'tipo' => $tipo
        ]);
        $comentarioTransporte->increment('likes_count');

        return response()->json(['success' => true, 'likes' => $comentarioTransporte->likes_count, 'liked' => true]);
    }
});



Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es'])) {
        session()->put('locale', $locale); // Guarda el idioma en la sesión
        app()->setLocale($locale); // Cambia el idioma de la aplicación
    }
    return redirect()->back(); // Redirige a la página anterior
})->name('language.switch');
