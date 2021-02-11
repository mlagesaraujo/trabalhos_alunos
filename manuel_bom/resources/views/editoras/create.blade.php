@extends('layouts.app')



<!DOCTYPE html>
<html>
<head>
	<title>Create editoras</title>
</head>
<body>
<form action="{{route('editoras.store')}}" method="post">
	@csrf

Nome: <input type="text" name="nome"><br>
Morada: <input type="text" name="morada"><br>
Observações:<textarea name="observacoes"></textarea><br>
<input type="submit" value="Enviar">

</form>

</body>
</html>