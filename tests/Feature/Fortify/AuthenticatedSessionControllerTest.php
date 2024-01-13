<?php

namespace Tests\Feature\Fortify;

use Illuminate\Cache\RateLimiter;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Events\TwoFactorAuthenticationChallenged;
use Laravel\Fortify\Features;
use Laravel\Fortify\LoginRateLimiter;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Mockery;
use PragmaRX\Google2FA\Google2FA;

class AuthenticatedSessionControllerTest extends OrchestraTestCase
{
    use RefreshDatabase;

    public function test_the_login_view_is_returned()
    {
        $this->mock(LoginViewResponse::class)
                ->shouldReceive('toResponse')
                ->andReturn(response('hello world'));

        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSeeText('hello world');
    }

    public function test_user_can_authenticate()
    {
        TestAuthenticationSessionUser::forceCreate([
            'name' => 'Taylor Otwell',
            'email' => 'taylor@laravel.com',
            'password' => bcrypt('secret'),
        ]);

        $response = $this->withoutExceptionHandling()->post('/login', [
            'email' => 'taylor@laravel.com',
            'password' => 'secret',
        ]);

        $response->assertRedirect('/home');
    }
}
