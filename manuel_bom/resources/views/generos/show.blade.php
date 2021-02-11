@extends('layouts.app')
ID:{{$genero->id_genero}}<br>
designação:{{$genero->designacao}}<br>
Observações:{{$genero->observacoes}}
@foreach ($genero->livro as $livro)
<h3>{{$livro->titulo}}</h3>
@endforeach
<br>
@if(auth()->check())
<a href="{{route('generos.edit',['id'=>$genero->id_genero])}}">Editar</a>
<a href="{{route('generos.delete',['id'=>$genero->id_genero])}}">Eliminar</a>
@endif

@if(session()->has('mensagem'))
<div class="alert alert-danger" role="alert">
{{session('mensagem')}}
</div>
@endif