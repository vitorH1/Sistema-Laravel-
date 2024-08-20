@extends('template.painel-admin')
@section('title', 'Inserir Veículos')
@section('content')
<h6 class="mb-4"><i>CADASTRO DE VEÍCULOS</i></h6><hr>
<form method="POST" action="{{route('veiculos.insert')}}">
        @csrf

        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Placa</label>
                    <input type="text" class="form-control" id="" name="placa" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Categoria</label>
                    <select class="form-control" name="categoria" id="categoria">
                    
                    <?php
                        use App\Models\categoria;
                        $tabela = categoria::all();
                    ?>
                    
                    @foreach($tabela as $item)
                    <option value='{{$item->nome}}' >{{$item->nome}}</option>
                    @endforeach 
                    
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">KM</label>
                    <input type="text" class="form-control" id="" name="km" required>
                </div>
            
            </div>
                        
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Instrutor</label>
                    <select class="form-control" name="instrutor">
                    <?php
                        use App\Models\instrutore;
                        $tabela = instrutore::all();
                    ?>
                    <option value='0' >Selecionar Instrutor</option>
                    @foreach($tabela as $item)
                    <option value='{{$item->id}}' >{{$item->nome}}</option>
                    @endforeach 
                    </select>
                </div>
            </div>

           
            
        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cor</label>
                    <input type="text" class="form-control" id="" name="cor" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Marca</label>
                    <input type="text" class="form-control" id="" name="marca" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ano</label>
                    <input type="text" class="form-control" id="" name="ano" required>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Última Revisão</label>
                    <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data" name="data">
                </div>
            </div>

        </div>


       

        <p align="right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection