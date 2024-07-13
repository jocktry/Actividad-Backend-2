<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Http\Controllers\Controller;
use App\libs\ResultResponse;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ciudades = Ciudad::all();

        $result = new ResultResponse();
        $result->setData($ciudades);
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

        try {
            $newCiudad = new Ciudad([
                    'foto' => $request->foto,
                    'calificacion' => $request->calificacion,
                    'nombre' => $request->nombre,
                    'latitud' => $request->latitud,
                    'longitud' => $request->longitud,
            ]);
            //IMPRIMIR EN TERMINAL $newCiudad
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln($newCiudad);
            $newCiudad->save();

            $result = new ResultResponse();
            $result->setData($newCiudad);
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
    public function show(Ciudad $ciudad)
    {
        $result = new ResultResponse();

        try {
            $ciudad = $ciudad->findorFail($ciudad->id);
            $result->setData($ciudad);
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
    public function edit(Ciudad $ciudad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ciudad $ciudad)
    {
        $result = new ResultResponse();
        try {
            $ciudad = $ciudad->findorFail($ciudad->id);
            $ciudad->update([
                'foto' => $request->foto,
                'calificacion' => $request->calificacion,
                'nombre' => $request->nombre,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
            ]);
            $ciudad->save();            
            $result->setData($ciudad);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
    public function put(Request $request, Ciudad $ciudad)
    {

        try {
            $ciudad = $ciudad->findorFail($ciudad->id);

            $ciudad->foto = $request->get('foto',$ciudad->foto);
            $ciudad->calificacion = $request->get('calificacion',$ciudad->calificacion);
            $ciudad->nombre = $request->get('nombre',$ciudad->nombre);
            $ciudad->latitud = $request->get('latitud',$ciudad->latitud);
            $ciudad->longitud = $request->get('longitud',$ciudad->longitud);

            $ciudad->save();            
            $result = new ResultResponse();
            $result->setData($ciudad);
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
    public function destroy(Ciudad $ciudad)
    {
        $result = new ResultResponse();
        try {
            $ciudad = $ciudad->findorFail($ciudad->id);
            $ciudad->delete();
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
}
