<?php


namespace App\Repositories\Campaign;

use App\Models\Campaign\Campaign;
use Illuminate\Support\Facades\DB;


class CampaignRepository implements CampaignInterface
{

    //send the all data to campaign controller
    public function getAllData()
    {
        return Campaign::all();
    }

    //search data and send it controller
    public function searchData($data){

        $val = Campaign::query();
        if(isset($data['groupByFilter']) && !empty($data['groupByFilter'])){
            if ($data['groupByFilter'] == 'Pickup-Point') {
                $val->select('pick_up_point as name' ,DB::raw('count(*) as total'));
                $val->groupBy('pick_up_point');
            }
            if ($data['groupByFilter'] == 'Drop-off-Point') {
                $val->select('drop_off_point as name',DB::raw('count(*) as total'));
                $val->groupBy('drop_off_point');
            }
            if ($data['groupByFilter'] == "Institute") {
                $val->select('institute as name',DB::raw('count(*) as total'));
                $val->groupBy('institute');
            }
            if ($data['groupByFilter'] == "Name") {
                $val->select('name as name',DB::raw('count(*) as total'));
                $val->groupBy('name');
            }

        }

        else if(isset($data['name'] ) && !empty($data['name']) || isset($data['pickuppoint']) && !empty($data['pickuppoint'] ) ||
            isset($data['droppoint'] ) && !empty($data['droppoint']) || isset($data['institute']) && !empty($data['institute']) ||
            isset($data['datetime']) && !empty($data['datetime']))
        {
            if (isset($data['name']) && !empty($data['name'])) {
                $val->where('name', 'like', '%' .$data['name']. '%');
            }
            if (isset($data['pickuppoint']) && !empty($data['pickuppoint'])) {
                $val->where('pick_up_point', $data['pickuppoint']);
            }

            if (isset($data['droppoint']) && !empty($data['droppoint'])) {
                $val->where('drop_off_point', $data['droppoint']);
            }

            if (isset($data['institute']) && !empty($data['institute'])) {
                $val->where('institute', $data['institute']);
            }

            if (isset($data['datetime']) && !empty($data['datetime'])) {
                $date = explode("-", $data['datetime']);
                $from = date("Y-m-d", strtotime($date[0]));
                $to = date("Y-m-d", strtotime($date[1]));
                $val->whereBetween('date', [$from, $to]);

            }

        }

        return $val->get();


    }


}
