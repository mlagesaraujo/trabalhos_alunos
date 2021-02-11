@extends('layouts.app')
<!--id criador pagina tem de ser igual id utilizador para editar e deletar-->


ID:{{$livro->id_user}}<br>
<?php 
$idcr=$livro['id_user'];

 ?>



@section('content')
<p style="color: red;">ID:{{$livro->id_livro}}<br></p>
Titulo:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>
Isbn:{{$livro->isbn}}<br>
@if(isset($livro->genero->designacao))
{{$livro->genero->designacao}}<br>
@endif
@if(isset($livro->autores->nome))
{{$livro->autores->nome}}<br>
@endif
@foreach($livro->autores as $autor)
{{$autor->nome}}<br>
@endforeach
<br>
<br>
<br>
<hr/>
<p style="color: red ; text-align:center;" class="bg-info">Autores:<br></p>

 @if(count($livro->autores)>0)
 
@foreach($livro->autores as $autor)
{{$autor->nome}}<br>
@endforeach

@else
<hr/>
<div class="alert alert-danger" role='alert'>
	sem autor definido
</div>
@endif
<hr/>
<br>
<br>
<br>
<hr/>
<p style="color: red; text-align:center; " class="bg-info">Editoras:<br></p>
	



@if(count($livro->editoras)>0)
@foreach($livro->editoras as $editora)
{{$editora->nome}}<br>
@endforeach
<hr/>
@else
<div class="alert alert-danger" role='alert'>
	sem editora definido
</div>
@endif
<br>
<br>

@if(session()->has('mensagem'))
<div class="alert alert-danger" role="alert">
{{session('mensagem')}}
</div>

@endif



@if(auth()->user()->id == $livro->id_user )
            <a href="{{route('livros.edit',['id'=>$livro->id_livro])}}" >Editar Livro</a>

            <a href="{{route('livros.delete',['id'=>$livro->id_livro])}}" class="btn btn-primary">Eliminar Livro</a> 

@endif

@endsection

