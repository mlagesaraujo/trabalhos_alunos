@extends('layouts.app')


<!DOCTYPE html>
<html>
<head>
	<title>Create livros</title>
</head>
<body>
<form action="{{route('autores.store')}}" method="post">
	@csrf
	
Nome: <input type="text" name="nome"><br>
Nacionalidade: <input type="text" name="nacionalidade"><br>
Data Nascimento: <input type="date" name="data_nascimento"><br>
fotografa: <input type="text" name="fotografia"><br>

<input type="submit" value="Enviar">

</form>

</body>
</html>