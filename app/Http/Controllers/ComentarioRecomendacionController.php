<?php

namespace App\Http\Controllers;

use App\Models\comentarioRecomendacion;
use App\Http\Controllers\Controller;
use App\libs\ResultResponse;
use Illuminate\Http\Request;

class ComentarioRecomendacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarioRecomendaciones = comentarioRecomendacion::all();

        $result = new ResultResponse();
        $result->setData($comentarioRecomendaciones);
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
            $this->validateComentarioRecomendacion($request);
            try {
                $newComentarioRecomendacion = new comentarioRecomendacion([
                        'id' => $request->id,
                        'id_comentario' => $request->id_comentario,
                        'id_recomendacion' => $request->id_recomendacion,
                ]);
                $newComentarioRecomendacion->save();

                $result = new ResultResponse();
                $result->setData($newComentarioRecomendacion);
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
    public function show(comentarioRecomendacion $comentarioRecomendacion)
    {
        $result = new ResultResponse();

        try {
            $comentarioRecomendacion = $comentarioRecomendacion->findorFail($comentarioRecomendacion->id);
            $result->setData($comentarioRecomendacion);
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
    public function edit(comentarioRecomendacion $comentarioRecomendacion)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comentarioRecomendacion $comentarioRecomendacion)
    {
        $result = new ResultResponse();
        try {
            $comentarioRecomendacion = $comentarioRecomendacion->findorFail($comentarioRecomendacion->id);
            $comentarioRecomendacion->update([
                'id' => $request->id,
                'id_comentario' => $request->id_comentario,
                'id_recomendacion' => $request->id_recomendacion,
            ]);
            $comentarioRecomendacion->save();            
            $result->setData($comentarioRecomendacion);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
    public function put(Request $request, comentarioRecomendacion $comentarioRecomendacion)
    {

        try {
            $comentarioRecomendacion = $comentarioRecomendacion->findorFail($comentarioRecomendacion->id);

            $comentarioRecomendacion->id = $request->get('id',$comentarioRecomendacion->id);
            $comentarioRecomendacion->id_comentario = $request->get('id_comentario',$comentarioRecomendacion->id_comentario);
            $comentarioRecomendacion->id_recomendacion = $request->get('id_recomendacion',$comentarioRecomendacion->id_recomendacion);

            $comentarioRecomendacion->save();            
            $result = new ResultResponse();
            $result->setData($comentarioRecomendacion);
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
     * Remove the specified resource from storage.
     */
    public function destroy(comentarioRecomendacion $comentarioRecomendacion)
    {
        $result = new ResultResponse();
        try {
            $comentarioRecomendacion = $comentarioRecomendacion->findorFail($comentarioRecomendacion->id);
            $comentarioRecomendacion->delete();
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
}
