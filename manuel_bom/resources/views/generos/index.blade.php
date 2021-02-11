@extends('layouts.app')

	@if(auth()->check())
Id utilizador: {{Auth::user()->id}}<br>
Email: {{Auth::user()->email}}<br>
Nome: {{Auth::user()->name}}<br>

	<br>
<a href="{{route('logout')}}" 
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

<ul>
@foreach($generos as $genero)
<li>
<a href="{{route('generos.show',['id'=>$genero->id_genero])}}">
	{{$genero->designacao}}</a></li>
@endforeach
</ul>
{{$generos->render()}}