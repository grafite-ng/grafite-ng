<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
      /*$tag         = $request->input("tag");
      $local       = $request->input("local");
      $contacto    = $request->input("contacto");
      $dataInicial = $request->input("data_inicial");
      $dataFinal   = $request->input("data_final");
      $conteudo    = $request->input("conteudo");

      return \App\Mensagem::search($contacto, $conteudo, $dataInicial, $dataFinal, $tag, $local);*/
      return \App\Mensage::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $mensagem = $request->json()->all();
      return \App\Mensagem::create($mensagem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      return \App\Mensagem::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      return \App\Mensagem::destroy($id);
    }
}
