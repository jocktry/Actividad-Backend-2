<?php

namespace App\Http\Controllers;

use App\Models\recomendacion;
use App\Http\Controllers\Controller;
use App\libs\ResultResponse;
use Illuminate\Http\Request;

class RecomendacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recomendaciones = recomendacion::all();

        $result = new ResultResponse();
        $result->setData($recomendaciones);
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
        $this->validateRecomendacion($request);

        try {
            $newRecomendacion = new recomendacion([
                    'id' => $request->id,
                    'nombre' => $request->nombre,
            ]);
            $newRecomendacion->save();

            $result = new ResultResponse();
            $result->setData($newRecomendacion);
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
    public function show(recomendacion $recomendacion)
    {
        $result = new ResultResponse();

        try {
            $recomendacion = $recomendacion->findorFail($recomendacion->id);
            $result->setData($recomendacion);
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
    public function edit(recomendacion $recomendacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, recomendacion $recomendacion)
    {
        $this->validateRecomendacion($request);
        $result = new ResultResponse();
        try {
            $recomendacion = $recomendacion->findorFail($recomendacion->id);
            $recomendacion->update([
                'id' => $request->id,
                'nombre' => $request->nombre,
            ]);
            $recomendacion->save();            
            $result->setData($recomendacion);
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
    public function destroy(recomendacion $recomendacion)
    {
        $result = new ResultResponse();
        try {
            $recomendacion = $recomendacion->findorFail($recomendacion->id);
            $recomendacion->delete();
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
}
