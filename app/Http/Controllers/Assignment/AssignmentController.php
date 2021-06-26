<?php

namespace App\Http\Controllers\Assignment;

use App\Http\Controllers\Controller;
use App\Models\Assignment\Assignment;
use App\Repositories\Assignment\AssignmentInterface;
use Illuminate\Http\Request;
use App\Http\Requests\AssignmentValidation;
use App\Traits\ResponseCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
class AssignmentController extends Controller
{
    use ResponseCode;
    protected $assignment;


    public function __construct( AssignmentInterface $assignment)
    {
        $this->assignment = $assignment;
        $this->middleware('auth');
    }

    /*
     * Name: Dip Ghosh
     * Email :dip@shuttlebd.com
     * Mobile :+8801744499902
     * store the data in Database
     * @param: form data from ajax request
     * @return response
     */
    public function store( AssignmentValidation $request ){

        //call the assignment interface with parameter
        $inserted = $this->assignment->saveData( $request->all() );
$data =[];
        if(!$inserted){
            //call the traits failure response
           return  $this->failure($data,'Something went wrong!');
        }
        else{
            //call the traits success response
            return $this->success($data,'Successfully Inserted');
        }

    }


}
