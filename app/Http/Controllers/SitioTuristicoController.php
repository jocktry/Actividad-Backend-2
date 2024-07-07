<?php

namespace App\Http\Controllers;

use App\Models\sitioTuristico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitioTuristicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = new ResultResponse();
        $result->setData(SitioTuristico::all());
        $result->setStatusCode(ResultResponse::SUCCESS_CODE);
        $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateSitioTuristico($request);

        try {
            $newSitioTuristico = new SitioTuristico([
                    'nombre' => $request->nombre,
                    'calificacion' => $request->calificacion,
                    'foto' => $request->foto,
                    'descripcion' => $request->descripcion,
                    'latitud' => $request->latitud,
                    'longitud' => $request->longitud,
                    'id_ciudad' => $request->id_ciudad,
            ]);
            $newSitioTuristico->save();

            $result = new ResultResponse();
            $result->setData($newSitioTuristico);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
            return response()->json($result);
        } catch (\Exception $e) {
            $result = new ResultResponse();
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage($e->getMessage());
            return response()->json($result);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(sitioTuristico $sitioTuristico)
    {
        $result = new ResultResponse();

        try {
            $sitioTuristico = $sitioTuristico->findorFail($sitioTuristico->id);
            $result->setData($sitioTuristico);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }

        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sitioTuristico $sitioTuristico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sitioTuristico $sitioTuristico)
    {
        $this->validateSitioTuristico($request);
        $result = new ResultResponse();
        try {
            $sitioTuristico = $sitioTuristico->findorFail($sitioTuristico->id);
            $sitioTuristico->update([
                'nombre' => $request->nombre,
                'calificacion' => $request->calificacion,
                'foto' => $request->foto,
                'descripcion' => $request->descripcion,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'id_ciudad' => $request->id_ciudad,
            ]);
            $sitioTuristico->save();            
            $result->setData($sitioTuristico);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
    public function put(Request $request, sitioTuristico $sitioTuristico)
    {
        $this->validateSitioTuristico($request);
        
        try {
            $sitioTuristico = $sitioTuristico->findorFail($sitioTuristico->id);

            $sitioTuristico->foto = $request->get('foto',$sitioTuristico->foto);
            $sitioTuristico->calificacion = $request->get('calificacion',$sitioTuristico->calificacion);
            $sitioTuristico->nombre = $request->get('nombre',$sitioTuristico->nombre);
            $sitioTuristico->latitud = $request->get('latitud',$sitioTuristico->latitud);
            $sitioTuristico->longitud = $request->get('longitud',$sitioTuristico->longitud);
            $sitioTuristico->id_ciudad = $request->get('id_ciudad',$sitioTuristico->id_ciudad);

            $sitioTuristico->save();            
            $result = new ResultResponse();
            $result->setData($sitioTuristico);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sitioTuristico $sitioTuristico)
    {
        $result = new ResultResponse();
        try {
            $sitioTuristico = $sitioTuristico->findorFail($sitioTuristico->id);
            $sitioTuristico->delete();
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
}
