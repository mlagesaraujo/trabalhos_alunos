@extends('layouts.app')


@section('content')

	@if(auth()->check())
Id utilizador: {{Auth::user()->id}}<br>
Email: {{Auth::user()->email}}<br>
Nome: {{Auth::user()->name}}<br>

	<br>

<a href="{{route('logout')}} " 
onclick="event.preventDefault(); 
document.getElementById('logout-form').submit();">
	Logout
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
     @csrf
</form>
@endif
<br>
<br>
<br>


@foreach($livros as $livro)
<li>
	<a href="{{route('livros.show',['id'=>$livro->id_livro])}}">
		{{$livro->titulo}}
	</a>
ID: {{$livro->id_user}}
</li>
@endforeach
<br>
<br>
<a href="{{route('livros.create')}}">criar</a>



@endsection