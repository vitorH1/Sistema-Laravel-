<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CadInstrutoresController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecepController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioSair;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template.index'); 
});

//template
Route::post('painel', [UsuarioController::class, 'login'])->name('usuarios.login');
Route::post('/', [UsuarioController::class, 'logout'])->name('usuario.logout');

//instrutores edit
Route::get('Instrutores', [CadInstrutoresController::class, 'index'])->name('instrutores.index');
Route::post('instrutores', [CadInstrutoresController::class, 'insert'])->name('instrutores.insert');
Route::get('instrutores.inserir', [CadInstrutoresController::class, 'create'])->name('instrutores.inserir');
Route::get('instrutores/{item}/edit', [CadInstrutoresController::class, 'edit'])->name('instrutores.edit');
Route::put('instrutores/{item}', [CadInstrutoresController::class, 'editar'])->name('instrutores.editar');
Route::delete('instrutores/{item}', [CadInstrutoresController::class, 'delete'])->name('instrutores.delete');
Route::get('instrutores/{item}/delete', [CadInstrutoresController::class, 'modal'])->name('instrutores.modal');

//recepcionista edit
Route::get('recep', [RecepController::class, 'index'])->name('recep.index');
Route::post('recep', [RecepController::class, 'insert'])->name('recep.insert');
Route::get('recep/inserir', [RecepController::class, 'create'])->name('recep.inserir');
Route::get('recep/{item}/edit', [RecepController::class, 'edit'])->name('recep.edit');
Route::put('recep/{item}', [RecepController::class, 'editar'])->name('recep.editar');
Route::delete('recep/{item}', [RecepController::class, 'delete'])->name('recep.delete');
Route::get('recep/{item}/delete', [RecepController::class, 'modal'])->name('recep.modal');

//usuario view
Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::delete('usuarios/{item}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
Route::get('usuarios/{item}/delete', [UsuarioController::class, 'modal'])->name('usuarios.modal');

//categorias edit
Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('categorias', [CategoriaController::class, 'insert'])->name('categorias.insert');
Route::get('categorias/inserir', [CategoriaController::class, 'create'])->name('categorias.inserir');
Route::get('categorias/{item}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('categorias/{item}', [CategoriaController::class, 'editar'])->name('categorias.editar');
Route::delete('categorias/{item}', [CategoriaController::class, 'delete'])->name('categorias.delete');
Route::get('categorias/{item}/delete', [CategoriaController::class, 'modal'])->name('categorias.modal');

//veiculos edit
Route::get('veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::post('veiculos', [VeiculoController::class, 'insert'])->name('veiculos.insert');
Route::get('veiculos/inserir', [VeiculoController::class, 'create'])->name('veiculos.inserir');
Route::get('veiculos/{item}/edit', [VeiculoController::class, 'edit'])->name('veiculos.edit');
Route::put('veiculos/{item}', [VeiculoController::class, 'editar'])->name('veiculos.editar');
Route::delete('veiculos/{item}', [VeiculoController::class, 'delete'])->name('veiculos.delete');
Route::get('veiculos/{item}/delete', [VeiculoController::class, 'modal'])->name('veiculos.modal');


Route::get('Home-admin', [AdminController::class, 'index'])->name('admin.index');
Route::put('admin/{usuario}', [AdminController::class, 'editar'])->name('admin.editar');
Route::get('/', HomeController::class)->name('home');





