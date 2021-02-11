@extends('layouts.app')



<!DOCTYPE html>
<html>
<head>
	<title>Create editoras</title>
</head>
<body>
<form action="{{route('editoras.update',['id'=>$editora->id_editora])}}" method="post">
	@csrf
	@method ('patch')
Nome: <input type="text" name="nome" value="{{$editora->nome}}"><br>
Morada: <input type="text" name="morada" value="{{$editora->morada}}"><br>
Observações:<textarea name="observacoes">{{$editora->observacoes}}</textarea><br>
<input type="submit" value="Enviar">

</form>

</body>
</html>