    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Api\LandingPageController; // Impor controller

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    */

    // Tambahkan route ini
    Route::get('/landing-data', [LandingPageController::class, 'getData']);


    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Admin API endpoints (basic list & create)
    use App\Http\Controllers\Api\StudentController;
    use App\Http\Controllers\Api\BeritaController;
    use App\Http\Controllers\Api\UserController;
    use App\Http\Controllers\Api\DashboardController;

    Route::get('/admin/students', [StudentController::class, 'index']);
    Route::post('/admin/students', [StudentController::class, 'store']);
    Route::get('/admin/students/stats', [StudentController::class, 'getStats']);

    Route::get('/admin/berita', [BeritaController::class, 'index']);
    Route::post('/admin/berita', [BeritaController::class, 'store']);

    Route::get('/admin/users', [UserController::class, 'index']);
    Route::post('/admin/users', [UserController::class, 'store']);

    // Dashboard endpoints
    Route::get('/admin/dashboard-stats', [DashboardController::class, 'getStats']);
    Route::get('/admin/aktivitas-terbaru', [DashboardController::class, 'getAktivitasTerbaru']);