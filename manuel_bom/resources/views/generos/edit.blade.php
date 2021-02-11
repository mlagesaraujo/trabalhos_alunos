@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<title>Create Generos</title>
</head>
<body>
<form action="{{route('generos.update',['id'=>$genero->id_genero])}}" method="post">
	@csrf
	@method ('patch')
Designação:<input type="text" name="designacao" value="{{$genero->designacao}}"><br>
Observações:<textarea name="observacoes">{{$genero->observacoes}}</textarea><br>
<input type="submit" value="Enviar">

</form>

</body>
</html>