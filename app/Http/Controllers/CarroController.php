<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    public function FormularioCadastro(){
        return view('cadastrarCarro');
    }

    public function MostrarEditarCarro(){

        $dadosCarro = Carro::all();
        //dd($dadosCaminhao);
       
        $dadosCarro = Carro::query();
        $dadosCarro->when($request->marca,function($query,$v1){
            $query->where('marca','like','%'.$v1.'%');

        });
        return view('editarCarro',[
            'resgistrarCarro'=>$dadosCarro
        ]);
        $dadosCarro =$dadosCarro->get();
    }

    public function SalvarBancoCarro(Request $request){

        $dadosCarro = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' =>'string|required',
            'cor' => 'string|required',
            'valor' => 'string|nullable'
        ]);

        Carro::create($dadosCarro);
        return Redirect::route('home');
    }

    public function ApagarBancoCarro(Carro $registrosCarro){
        //dd($registrosCarros);
        $registrosCarros->delete();
        //Carro::findOrFail($id)->delete();
        return Redirect::route('editar-carro');
    }

    public function MostrarAlterarCarro(Carro $registrosCarros){
        return view('alterarCarros',['registrosCarros' => $registrosCarros]);
    }

    public function AlterarBancoCarro(Carro $registrosCarros, Request $request){
        $banco = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' => 'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'

        ]);
        $registrosCarros -> fill($banco);
        $registrosCarros->save();
        return Redirect::route('editar-carro');
    }
}