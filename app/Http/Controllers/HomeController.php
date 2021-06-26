<?php

namespace App\Http\Controllers;

use App\Models\Assignment\Assignment;
use App\Models\Campaign\Campaign;
use App\Repositories\Assignment\AssignmentInterface;
use App\Repositories\Campaign\CampaignInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    protected $assignment;
    protected $campaign;

    public function __construct(AssignmentInterface $assignment,CampaignInterface $campaign)
    {
        $this->middleware('auth');
        $this->assignment = $assignment;
        $this->campaign = $campaign;
    }

  /*
  * Name: Dip Ghosh
  * Email :dip@shuttlebd.com
  * Mobile :+8801744499902
  * show the data with filtering
  * @return view
  */
    public function index()
    {
        //call the interface method
        $campaigns = $this->campaign->getAllData();

        //call the interface method
        $assignments =$this->assignment->getAllData();
        $subLabel = NULL;
        return view('home', compact('campaigns', 'assignments','subLabel'));
    }

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * show the data with filtering
    * @return view
    */
    public function admin()
    {
        return view('layouts.admin.dashboard');
    }

    /*
    * Name: Dip Ghosh
    * Email :dip@shuttlebd.com
    * Mobile :+8801744499902
    * filter the data
    * @param $Request $request
    * @return view
    */
    public function search(Request $request)
    {
        $dataSearch = $request->all();

        //call campaign repository
        $campaigns = $this->campaign->searchData($dataSearch);
        $subLabel = isset($dataSearch['groupByFilter']) ? $dataSearch['groupByFilter'] : NULL;

        //call assignment Respositroy
        $assignments =$this->assignment->getAllData();
        return view('home', compact('campaigns','dataSearch', 'subLabel','assignments'));
    }

}
