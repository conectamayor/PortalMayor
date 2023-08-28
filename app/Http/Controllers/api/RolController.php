<?php

namespace App\Http\Controllers\api;

use App\Rol;
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
        $rols = Rol::from('rols as c')
                        ->selectRaw('c.*')
                        ->paginate(10);
        
        return $this->successResponse($rols);
    }

        /**
     * Store the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = $request->input('rol');
    
        // Obtén los permisos seleccionados (array)
        $permissions = $request->input('permissions', []);

        // Aquí recorres el array de permisos y haces lo que necesites con cada valor
        foreach ($permissions as $permission) {
            echo $permission;
            echo '<br>';
        }
    }
}