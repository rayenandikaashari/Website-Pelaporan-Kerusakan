
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\LaporanKerusakanController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

Route::prefix('operator')
    ->name('operator.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/laporan', [LaporanKerusakanController::class, 'index'])
            ->name('laporan.index');

        Route::get('/laporan/buat', [LaporanKerusakanController::class, 'create'])
            ->name('laporan.create');

        Route::post('/laporan', [LaporanKerusakanController::class, 'store'])
            ->name('laporan.store');

        Route::get('/laporan/{laporan}', [LaporanKerusakanController::class, 'show'])
            ->name('laporan.show');
    });

    Route::get('/dashboard', function () {
        return match (auth()->user()->role) {
            'operator' => redirect()->route('operator.dashboard'),
            'teknisi' => redirect()->route('teknisi.dashboard'),
            'supervisor' => redirect()->route('supervisor.dashboard'),
            default => abort(403, 'Role pengguna tidak valid.'),
        };
    })->name('dashboard');

    Route::get('/operator/dashboard', function () {
        abort_unless(auth()->user()->role === 'operator', 403);
        return view('operator.dashboard');
    })->name('operator.dashboard');

    Route::get('/teknisi/dashboard', function () {
        abort_unless(auth()->user()->role === 'teknisi', 403);
        return view('teknisi.dashboard');
    })->name('teknisi.dashboard');

    Route::get('/supervisor/dashboard', function () {
        abort_unless(auth()->user()->role === 'supervisor', 403);
        return view('supervisor.dashboard');
    })->name('supervisor.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
