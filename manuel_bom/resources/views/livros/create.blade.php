@extends('layouts.app')




<!DOCTYPE html>
<html>
<head>
	<title>Create livros</title>
</head>
<body>
	@section('content')
<form action="{{route('livros.store')}}" method="post">
	@csrf
Id utilizador : <input type="text" value="{{Auth::user()->id}}"  style="display:none" />{{Auth::user()->id}} <br>
Titulo: <input type="text" name="titulo" value="{{old('titulo')}}"><br>
@if($errors->has('titulo'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Idioma: <input type="text" name="idioma" value="{{old('idioma')}}"><br>
@if($errors->has('idioma'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Total paginas: <input type="text" name="total_paginas" value="{{old('total_paginas')}}"><br>
@if($errors->has('total_paginas'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Data edição: <input type="date" name="data_edicao" value="{{old('data_edicao')}}"><br>
@if($errors->has('data_edicao'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
ISBN: <input type="text" name="isbn" value="{{old('isbn')}}"><br>
@if($errors->has('isbn'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Observações:<textarea name="observacoes" value="{{old('observacoes')}}"></textarea><br>
@if($errors->has('observacoes'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Imagem capa: <input type="text" name="imagem_capa" value="{{old('imagem_capa')}}"><br>
Genero: <select name="id_genero">
	@foreach($generos as $genero)
	<option value="{{$genero->id_genero}}">{{$genero->designacao}}</option>
	@endforeach
</select><br>
Autor: <select name="id_autor[]" multiple="multiple">
	@foreach($autores as $autor)
	<option value="{{$autor->id_autor}}">{{$autor->nome}}</option>
	@endforeach
</select><br>
Editora: <select name="id_editora[]" multiple="multiple">
	@foreach($editoras as $editora)
	<option value="{{$editora->id_editora}}">{{$editora->nome}}</option>
	@endforeach
</select><br>
Sinopse: <textarea name="sinopse">{{old('sinopse')}} </textarea><br>
@if($errors->has('sinopse'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif

<input type="submit" value="Enviar">
</form>

</body>
</html>



@endsection