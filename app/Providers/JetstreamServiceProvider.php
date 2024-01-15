<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Illuminate\Validation\ValidationException;


class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->auth)
                ->orWhere('username', $request->auth)
                ->first();

            $waktu = date('H');
            if ($user && $user->is_active == 1 && Hash::check($request->password, $user->password) && $waktu < 17 && date('N') != 6 && date('N') != 7) {
                return $user;
            } elseif ($user && $user->is_active != 1) {
                throw ValidationException::withMessages([
                    'auth' => ['Akun dinonaktifkan.'],
                ]);
            } else {
                throw ValidationException::withMessages([
                    'auth' => ['Akses ditolak. Silakan coba lagi pada hari kerja.'],
                ]);
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
