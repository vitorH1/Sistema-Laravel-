<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $tabela = categoria::orderby('id', 'desc')->paginate();
        return view('painel-admin.categorias.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.categorias.create');
    }


    public function insert(Request $request){
        $tabela = new categoria();
        $tabela->nome = $request->nome;
                
        $itens = categoria::where('nome', '=', $request->nome)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Categoria já Cadastrada!') </script>";
            return view('painel-admin.categorias.create');
            
        }

      

        $tabela->save();
       
        return redirect()->route('categorias.index');

    }


    public function edit(categoria $item){
        return view('painel-admin.categorias.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, categoria $item){
         
        $item->nome = $request->nome;
         
        $old = $request->old;
       
       
        if($old != $request->nome){
            $itens = categoria::where('nome', '=', $request->nome)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Categoria já Cadastrada!') </script>";
                return view('painel-admin.categorias.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('categorias.index');
 
     }


     public function delete(categoria $item){
        $item->delete();
        return redirect()->route('categorias.index');
     }

     public function modal($id){
        $item = categoria::orderby('id', 'desc')->paginate();
        return view('painel-admin.categorias.index', ['itens' => $item, 'id' => $id]);

     }


}
