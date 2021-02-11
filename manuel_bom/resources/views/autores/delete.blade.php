@extends('layouts.app')

<h2>deseja eliminar o autor</h2>
<h2>{{$Autor->nome}}</h2>

<form method="post" action="{{route('autores.destroy',['id'=>$Autor->id_autor])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">





</form>