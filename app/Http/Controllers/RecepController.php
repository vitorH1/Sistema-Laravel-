<?php

namespace App\Http\Controllers;

use App\Models\instrutore;
use App\Models\recepcionista;
use App\Models\usuario;
use Illuminate\Http\Request;

class RecepController extends Controller
{
    public function index(){
        $tabela = recepcionista::orderby('id', 'desc')->paginate();
        return view('painel-admin.recep.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.recep.create');
    }


    public function insert(Request $request){
        $tabela = new recepcionista();
        $tabela->nome = $request->nome;
        $tabela->email = $request->email;
        $tabela->cpf = $request->cpf;
        $tabela->telefone = $request->telefone;
        $tabela->endereco = $request->endereco;
        

        $tabela2 = new usuario();
        $tabela2->nome = $request->nome;
        $tabela2->usuario = $request->email;
        $tabela2->cpf = $request->cpf;
        $tabela2->senha = '123';
        $tabela2->nivel = 'recep';

        $itens = recepcionista::where('cpf', '=', $request->cpf)->orwhere('email', '=', $request->email)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.recep.create');
            
            
        }

        $tabela->save();
        $tabela2->save();
        return redirect()->route('recep.index');

    }


    public function edit(recepcionista $item){
        return view('painel-admin.recep.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, recepcionista $item){
         
        $item->nome = $request->nome;
        $item->email = $request->email;
        $item->cpf = $request->cpf;
        $item->telefone = $request->telefone;
        $item->endereco = $request->endereco;
        
       

        $oldcpf = $request->oldcpf;
        $oldemail = $request->oldemail;
        

        if($oldcpf != $request->cpf){
            $itens = recepcionista::where('cpf', '=', $request->cpf)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('CPF já Cadastrado!') </script>";
                return view('painel-admin.recep.edit', ['item' => $item]);   
                
            }
        }

       
        if($oldemail != $request->email){
            $itens = recepcionista::where('email', '=', $request->email)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Email já Cadastrado!') </script>";
                return view('painel-admin.recep.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('recep.index');
 
     }


     public function delete(recepcionista $item){
        $item->delete();
        return redirect()->route('recep.index');
     }

     public function modal($id){
        $item = recepcionista::orderby('id', 'desc')->paginate();
        return view('painel-admin.recep.index', ['itens' => $item, 'id' => $id]);

     }


}
