<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = Foto::all();

        $result = new ResultResponse();
        $result->setData($fotos);
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
        $this->validateFoto($request);

        try {
            $newFoto = new Foto([
                    'id' => $request->id,
                    'foto' => $request->foto,
                    'id_comentario' => $request->id_comentario,
            ]);
            $newFoto->save();

            $result = new ResultResponse();
            $result->setData($newFoto);
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
    public function show(foto $foto)
    {
            $result = new ResultResponse();

            try {
                $foto = $foto->findorFail($foto->id);
                $result->setData($foto);
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
    public function edit(foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, foto $foto)
    {
        $this->validateFoto($request);
        $result = new ResultResponse();
        try {
            $foto = $foto->findorFail($foto->id);
            $foto->update([
                'id' => $request->id,
                'foto' => $request->foto,
                'id_comentario' => $request->id_comentario,
            ]);
            $foto->save();            
            $result->setData($foto);
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
    public function put(Request $request, Foto $foto)
    {
        $this->validateFoto($request);

        try {
            $foto = $foto->findorFail($foto->id);

            $foto->id = $request->get('id',$foto->id);
            $foto->foto = $request->get('foto',$foto->foto);
            $foto->id_comentario = $request->get('id_comentario',$foto->id_comentario);

            $foto->save();            
            $result = new ResultResponse();
            $result->setData($foto);
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
    public function destroy(foto $foto)
    {
        $result = new ResultResponse();
        try {
            $foto = $foto->findorFail($foto->id);
            $foto->delete();
            $result->setStatusCode(ResultResponse::SUCCESS_CODE);
            $result->setMessage(ResultResponse::MESSAGE_SUCCESS);
        } catch (\Exception $e) {
            $result->setStatusCode(ResultResponse::ERROR_CODE);
            $result->setMessage(ResultResponse::MESSAGE_ERROR);
        }
        return response()->json($result);
    }
}
