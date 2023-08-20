<?php

namespace App\Http\Controllers\api;

use App\Region;
use App\User;
use App\Http\Controllers\ApiResponseController;
use App\Http\Controllers\Controller\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegionController extends ApiResponseController
{
    public function __construct(Request $request)
    {
        $this->user = User::where('api_token', $request->api_token)->first();
    }

    /**
     * Store the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::orderBy('region_id', 'ASC')->get();
        
        return $this->successResponse($regions);
    }

    /**
     * Store the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
            $ip = explode(":", $ip);
            $ip = $ip[3];
        } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            $ip = explode(":", $ip);
            $ip = $ip[3];
        }
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }

        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

        $region = Region::where('region', 'like', $details->region)->first();
        
        return $this->successResponse($region);
    }
}