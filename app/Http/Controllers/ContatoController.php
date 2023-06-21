<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        //print_r($request->all());
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // echo $request->input('nome');
        // echo '<br>';
        // echo $request->input('email');

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');


        // $contato = new SiteContato();
        // $contato->create($request->all());

        //$contato->save();
        //print_r($contato->getAttributes());

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedback = [
            'nome.min'      => 'O campo :attribute precisa ter no minimo 3 caracteres!',
            'nome.max'      => 'O campo :attribute poder ter no máximo 40 caracteres!',
            'email.email'         => 'O email inforamdo não é válido!',
            'motivo_contatos_id.required'         => 'O campo motivo contato é obrigatório!',
            'required'               => 'O campo :attribute deve ser preenchido!'
        ];

        //validação dos dados recebidos do formulário via request
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
