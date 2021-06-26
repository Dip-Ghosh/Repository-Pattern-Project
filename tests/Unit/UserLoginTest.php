<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Assignment\Assignment;
use App\Models\Campaign\Campaign;
use App\Models\User;
use Database\Factories\Campaign\CampaignFactory;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use function Psy\debug;

class UserLoginTest extends TestCase
{
    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * protected function
    * login route
    */
    protected function login(){

        return route('login');
    }

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * protected function
    * after logged in where to go function
    * home route
    */
    protected function successfulLoginRoute()
    {
        return route('home');
    }

    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * protected function
     * base url of the page
     */
    protected function baseRoute()
    {
        return '/';
    }

    /*
   * Name: Dip Ghosh
   * Email :dip@shuttlebd.com
   * Mobile :+8801744499902
   * protected function
   * logout route
   */
    protected function logout()
    {
        return route('logout');
    }

    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * takes email and email to login
     *  if successfully login then it will redirect to the dashboard page
     */
    public function test_login_information()
    {

        $user = User::factory()->create([
            'password' => Hash::make($password = 'secret'),
        ]);

        $response = $this->post($this->login(), [
            'email' =>$user->email,
            'password' =>$password
        ]);

        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);


    }


     /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * takes email and email to login
      *  if successfully logout then it will redirect to the home page
      */
    public function test_user_can_logout()
    {
        $this->be(User::factory()->create());
        $response = $this->post($this->logout());
        $response->assertRedirect($this->baseRoute());
        $this->assertGuest();
    }

     /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * takes wrong email and email to login
      *  if successfully login then it will redirect to the home page
      */
    public function test_user_can_not_login_with_wrong_credentials(){

        $user = User::factory()->create([
            'password' => Hash::make('i-love-laravel'),
        ]);

        $response = $this->from($this->baseRoute())->post($this->login(), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect($this->baseRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


}
