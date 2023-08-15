<?php

namespace App\Http\Controllers\api;

use App\Commune;
use App\User;
use App\Http\Controllers\ApiResponseController;
use App\Http\Controllers\Controller\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommuneController extends ApiResponseController
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
    public function index(Request $request)
    {
        $region_id = $request->segment(3);

        $communes = Commune::where('region_id', $region_id)->orderBy('commune', 'ASC')->get();
        
        return $this->successResponse($communes);
    }
}