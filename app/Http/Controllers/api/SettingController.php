<?php

namespace App\Http\Controllers\api;

use App\Setting;
use App\Http\Controllers\ApiResponseController;
use App\Http\Controllers\Controller\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RolController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings = Setting::from('settings as c')
                        ->selectRaw('c.*')->where('section_id', 1)->first();
        
        return $this->successResponse($settings);
    }
}