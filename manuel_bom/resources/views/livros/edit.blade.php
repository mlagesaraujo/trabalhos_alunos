@extends('layouts.app')



@section('content')
<form action="{{route('livros.update',['id'=>$livro->id_livro])}}" method="post">
	@csrf
	@method ('patch')

Id utilizador : <input type="text" value="{{Auth::user()->id}}"  style="display:none" /><br>
Titulo: <input type="text" name="titulo" value="{{$livro->titulo}}"><br>
@if($errors->has('titulo'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Idioma: <input type="text" name="idioma" value="{{$livro->idioma}}"><br>
@if($errors->has('idioma'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Total paginas: <input type="text" name="total_paginas" value="{{$livro->total_paginas}}"><br>
@if($errors->has('total_paginas'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Data edição: <input type="date" name="data_edicao" value="{{$livro->data_edicao}}"><br>
@if($errors->has('data_edicao'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
ISBN: <input type="text" name="isbn" value="{{$livro->isbn}}"><br>
@if($errors->has('isbn'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Observações:<textarea name="observacoes">{{$livro->observacoes}}</textarea><br>
@if($errors->has('observacoes'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
Imagem capa: <input type="text" name="imagem_capa" value="{{$livro->imagem_capa}}"><br>
<br>
Genero: <select name="id_genero">
	@foreach($generos as $genero)
	<option value="{{$genero->id_genero}}" 
		@if($genero->id_genero==$livro->id_genero)selected @endif
		>
		
		{{$genero->designacao}}</option>
	@endforeach
</select>
<br>


Autor:<select name="id_autor[]" multiple="multiple">
	@foreach($autores as $autor)
	<option value="{{$autor->id_autor}}" 
		@if(in_array($autor->id_autor,$autoresLivros))selected @endif
		>
		
		{{$autor->nome}}</option>
	@endforeach
</select>

<br>
Editora: <select name="id_editora[]" multiple="multiple">
	@foreach($editoras as $editora)
	<option value="{{$editora->id_editora}}"
@if(in_array($editora->id_editora,$editorasLivros))selected @endif
		>{{$editora->nome}}</option>
	@endforeach
</select><br>
Sinopse: <textarea name="sinopse">{{$livro->sinopse}} </textarea><br>
@if($errors->has('sinopse'))

Deverá indicar um ISBN correto (13carateres)
<br>
@endif
<input type="submit" value="Enviar">


</form>




@endsection