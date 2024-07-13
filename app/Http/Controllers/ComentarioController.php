<?php

namespace App\Http\Controllers;

use App\Models\comentario;
use App\Http\Controllers\Controller;
use App\libs\ResultResponse;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarios = comentario::all();

        $result = new ResultResponse();
        $result->setData($comentarios);
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
            $newComentario = new Comentario([
                    'fecha_de_publicacion' => $request->fecha_de_publicacion,
                    'calificacion' => $request->calificacion,
                    'descripcion' => $request->descripcion,
                    'id_usuario' => $request->id_usuario,
                    'id_sitio_turistico' => $request->id_sitio_turistico,
            ]);
            $newComentario->save();

            $result = new ResultResponse();
            $result->setData($newComentario);
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
    public function show(comentario $comentario)
    {
        $result = new ResultResponse();

        try {
            $comentario = $comentario->findorFail($comentario->id);
            $result->setData($comentario);
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
    public function edit(comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comentario $comentario)
    {
        $result = new ResultResponse();
        try {
            $comentario = $comentario->findorFail($comentario->id);
            $comentario->update([
                'fecha_de_publicacion' => $request->fecha_de_publicacion,
                'calificacion' => $request->calificacion,
                'descripcion' => $request->descripcion,
                'id_usuario' => $request->id_usuario,
                'id_sitio_turistico' => $request->id_sitio_turistico,
            ]);
            $comentario->save();            
            $result->setData($comentario);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
    public function put(Request $request, Comentario $comentario)
    {

        try {
            $comentario = $comentario->findorFail($comentario->id);

            $comentario->fecha_de_publicacion = $request->get('fecha_de_publicacion',$comentario->fecha_de_publicacion);
            $comentario->calificacion = $request->get('calificacion',$comentario->calificacion);
            $comentario->descripcion = $request->get('descripcion',$comentario->descripcion);
            $comentario->id_usuario = $request->get('id_usuario',$comentario->id_usuario);
            $comentario->id_sitio_turistico = $request->get('id_sitio_turistico',$comentario->id_sitio_turistico);

            $comentario->save();            
            $result = new ResultResponse();
            $result->setData($comentario);
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
    public function destroy(comentario $comentario)
    {
            $result = new ResultResponse();
        try {
            $comentario = $comentario->findorFail($comentario->id);
            $comentario->delete();
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
}
