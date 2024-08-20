<?php

namespace App\Http\Controllers;

use App\Models\veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index(){
        $tabela = veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.veiculos.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.veiculos.create');
    }


    public function insert(Request $request){
        $tabela = new veiculo();
       
        $tabela->placa = $request->placa;
        $tabela->categoria = $request->categoria;
        $tabela->km = $request->km;
        $tabela->cor = $request->cor;
        $tabela->marca = $request->marca;
        $tabela->ano = $request->ano;
        $tabela->data_revisao = $request->data;
        $tabela->instrutor = $request->instrutor;
                
        $itens = veiculo::where('placa', '=', $request->placa)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Veículo já Cadastrado!') </script>";
            return view('painel-admin.veiculos.create');
            
        }

      

        $tabela->save();
       
        return redirect()->route('veiculos.index');

    }


    public function edit(veiculo $item){
        return view('painel-admin.veiculos.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, veiculo $item){
         
       
        $item->placa = $request->placa;
        $item->categoria = $request->categoria;
        $item->km = $request->km;
        $item->cor = $request->cor;
        $item->marca = $request->marca;
        $item->ano = $request->ano;
        $item->data_revisao = $request->data;
        $item->instrutor = $request->instrutor; 
        $old = $request->old;
       
       
        if($old != $request->placa){
            $itens = veiculo::where('placa', '=', $request->placa)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Veículo já Cadastrado!') </script>";
                return view('painel-admin.veiculos.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('veiculos.index');
 
     }


     public function delete(veiculo $item){
        $item->delete();
        return redirect()->route('veiculos.index');
     }

     public function modal($id){
        $item = veiculo::orderby('id', 'desc')->paginate();
        return view('painel-admin.veiculos.index', ['itens' => $item, 'id' => $id]);

     }


}
