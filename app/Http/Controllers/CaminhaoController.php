<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Caminhao;

class CaminhaoController extends Controller
{
    public function FormularioCadastro(){
        return view('cadastrarCaminhao');
    }

    public function MostrarEditarCaminhao(){

        $dadosCaminhao = Caminhao::all();
        //dd($dadosCaminhao);
       
        $dadosCaminhao = Caminhao::query();
        $dadosCaminhao->when($request->marca,function($query,$v1){
            $query->where('marca','like','%'.$v1.'%');

        });
        return view('editarCaminhao',[
            'resgistrarCaminhao'=>$dadosCaminhao
        ]);
        $dadosCaminhao =$dadosCaminhao->get();
    }

    public function SalvarBanco(Request $request){

        $dadosCaminhao = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' =>'string|required',
            'cor' => 'string|required',
            'valor' => 'string|nullable'
        ]);

        Caminhao::create($dadosCaminhao);
        return Redirect::route('home');
    }

    public function ApagarBancoCaminhao(Caminhao $registrosCaminhoes){
        //dd($registrosCaminhoes);
        $registrosCaminhoes->delete();
        //Caminhao::findOrFail($id)->delete();
        return Redirect::route('editar-caminhao');
    }

    public function MostrarAlterarCaminhao(Caminhao $registrosCaminhoes){
        return view('alterarCaminhao',['registrosCaminhoes' => $registrosCaminhoes]);
    }

    public function AlterarBancoCaminhao(Caminhao $registrosCaminhoes, Request $request){
        $banco = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'

        ]);
        $registrosCaminhoes -> fill($banco);
        $registrosCaminhoes->save();
        return Redirect::route('editar-caminhao');
    }
}
