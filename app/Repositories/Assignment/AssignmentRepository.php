<?php


namespace App\Repositories\Assignment;

use App\Models\Assignment\Assignment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class AssignmentRepository implements AssignmentInterface
{

    //send the all data to controller
    public function getAllData()
    {
        return Assignment::all();
    }

    //get data from controller and save it in Assignment table
    public function saveData(array $data)
    {

        $value = [
            'dateline'=>$data['dateline'],
            'acquistion_officer'=>$data['officer'],
            'instruction'=>$data['instruction'],
            'created_at'=>Carbon::now(),
            'created_by'=>Auth::id(),
            'status'=>'Active'
        ];
        return Assignment::create($value);
    }
}
