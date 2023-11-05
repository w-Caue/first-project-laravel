<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // $mostraContato = $contato->where('nome', $contato->nome)->pluck('nome');
        // $contato->save();


        $motivo_contatos = MotivoContato::all();

        return view('site.contato', compact('motivo_contatos'));
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no minimo 3 caractere',
            'nome.max' => 'O campo nome deve ter no maximo 40 caractere',
            'nome.unique' => 'O nome informado ja esta em uso',

            'email.email' => 'O email informado não é valido',

            'mensagem.max' => 'A mensagem deve ter no maximo 2000 caracteres',
            'required' => 'O campo :attribute é obrigatorio'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
