<?php

namespace Tests\Unit;

use App\Models\Assignment\Assignment;
use App\Models\User;
use Tests\TestCase;

class AssignmentTest extends TestCase
{

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * protected function
    * login route
    */
    protected function login()
    {
        return route('login');
    }

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * protected function
    *  assignment Store route
    */
    protected function assignmentStoreRoute()
    {
        return route('assignment-store');
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
      * Assignment Store test
      */
    public function testStoreAssignment()
    {
        $user = User::factory()->create();

        $this->post($this->login(), [
            'email' => $user->email,
            'password' => $user->password
        ]);

        $task = Assignment::factory()->create();
        $this->post($this->assignmentStoreRoute(), $task->toArray());
        $this->assertEquals(1, Assignment::all()->count());

    }
}
