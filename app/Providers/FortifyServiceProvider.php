<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

     
    public function register(): void
    {
        /*---- ICI -- session flash de déconnexion (with) -----*/

        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {
                return redirect()->route('home')->with('deconnexion', 'Vous êtes bien déconnectés !');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        /*----page de login--------*/
        Fortify::loginView(function () {
            return view('auth.login');
        });

        /*----authentification--------*/
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
     
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

        /*----enregistrement--------*/
        Fortify::registerView(function () {
            return view('auth.register');
        });

        /*----vérification email--------*/
        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

        /*----demande de lien pour mot de passe oublié--------*/
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });
        /*----reset de mot de passe oublié--------*/
        Fortify::resetPasswordView(function (Request $request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
