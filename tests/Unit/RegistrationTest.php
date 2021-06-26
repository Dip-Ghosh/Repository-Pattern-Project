<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class RegistrationTest extends TestCase
{
    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * protected function
     * base url of the page
     */
    protected function baseRoute(){
        return route('/');
    }

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * protected function
    * registration url of the page
    */
    protected  function registrationGetRoute(){
        return route('register');
    }

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * protected function
    * registration save data url of the page
    */
    protected  function registrationPostRoute(){
        return route('register');
    }
    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * protected function
     * after logged in where to go function
     * home route
     */
    protected function successfulRegistrationRoute()
    {
        return route('home');
    }

    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * after logged in where to go function
     * retrun dashboard
     */
    public function testUserCanRegister()
    {
        Event::fake();

        $response = $this->from($this->registrationGetRoute())->post($this->registrationPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);

        $response->assertRedirect($this->successfulRegistrationRoute());
        $this->assertCount(1, $users = User::all());
        $this->assertAuthenticatedAs($user = $users->first());
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertTrue(Hash::check('i-love-laravel', $user->password));
        Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * user cannot register without name
    * return home
    */
    public function testUserCannotRegisterWithoutName()
    {
        $response = $this->from($this->registrationGetRoute())->post($this->registrationPostRoute(), [
            'name' => '',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);

        $users = User::all();

        $this->assertCount(0, $users);
        $response->assertRedirect($this->registrationGetRoute());
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * user cannot register without email
      * return home
      */
    public function testUserCannotRegisterWithoutEmail()
    {
        $response = $this->from($this->registrationGetRoute())->post($this->registrationPostRoute(), [
            'name' => 'John Doe',
            'email' => '',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);

        $users = User::all();

        $this->assertCount(0, $users);
        $response->assertRedirect($this->registrationGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * user cannot register without valid email
      * return home
      */
    public function testUserCannotRegisterWithInvalidEmail()
    {
        $response = $this->from($this->registrationGetRoute())->post($this->registrationPostRoute(), [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-laravel',
        ]);

        $users = User::all();

        $this->assertCount(0, $users);
        $response->assertRedirect($this->registrationGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * user cannot register without password
      * return home
      */
    public function testUserCannotRegisterWithoutPassword()
    {
        $response = $this->from($this->registrationGetRoute())->post($this->registrationPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $users = User::all();

        $this->assertCount(0, $users);
        $response->assertRedirect($this->registrationGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * user cannot register without confirm password
      * return home
      */
    public function testUserCannotRegisterWithoutPasswordConfirmation()
    {
        $response = $this->from($this->registrationGetRoute())->post($this->registrationPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => '',
        ]);

        $users = User::all();

        $this->assertCount(0, $users);
        $response->assertRedirect($this->registrationGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * user cannot register password mismatch
      * return home
      */
    public function testUserCannotRegisterWithPasswordsNotMatching()
    {
        $response = $this->from($this->registrationGetRoute())->post($this->registrationPostRoute(), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'i-love-laravel',
            'password_confirmation' => 'i-love-symfony',
        ]);

        $users = User::all();

        $this->assertCount(0, $users);
        $response->assertRedirect($this->registrationGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

}
