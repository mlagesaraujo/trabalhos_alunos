
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
@foreach($autores as $autor)
<li><a href="{{route('autores.show',['id'=>$autor->id_autor])}}">
	{{$autor->nome}}</a></li>
@endforeach
</ul>
<!--{{$autores->render()}}-->