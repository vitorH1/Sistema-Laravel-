@extends('template.painel-admin')
@section('title', 'Inserir Categorias')
@section('content')
<h6 class="mb-4"><i>CADASTRO DE CATEGORIAS</i></h6><hr>
<form method="POST" action="{{route('categorias.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>

               
        <button type="submit" class="btn btn-primary mt-4 mb-3">Salvar</button>
       
           
        </div>
    </form>
@endsection