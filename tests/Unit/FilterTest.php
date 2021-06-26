<?php

namespace Tests\Unit;

use App\Models\Campaign\Campaign;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FilterTest extends TestCase
{

    /*
      * Name: Dip Ghosh
      * Email :dip@shuttlebd.com
      * Mobile :+8801744499902
      * protected function
      * login route
      */
    protected function loginRoute()
    {
        return route('login');
    }
    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * protected function
     * dashboard route
     */
    protected function dashboardRoute(){
        return route('home');
    }
    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * protected function
    * filter route route
    */
    protected function filterRoute(){
        return route('campaign-list');
    }
    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * filter Test view
     */
    public function testSearchFilter()
    {
        $this->post($this->loginRoute(), [
            'email' => 'admin@shuttlebd.com',
            'password' => 'secret'
        ]);
        $response = $this->post($this->filterRoute(), [
            'pickuppoint'=>'Mirpur',
            'droppoint'=>'Mirpur'
        ]);

       $response->assertSee('Mirpur');

    }
    /*
 * Name: Dip Ghosh
 * Email :dip@shuttlebd.com
 * Mobile :+8801744499902
 * filter Test database
 */
    public function testSearchFilterDatabase()
    {
        $this->post($this->loginRoute(), [
            'email' => 'admin@shuttlebd.com',
            'password' => 'secret'
        ]);
        $response = $this->post($this->filterRoute(), [
            'pickuppoint'=>'Mirpur',
            'droppoint'=>'Mirpur'
        ]);
       $response->content(['attributes']);
       $this->assertIsObject($response);






    }
}
