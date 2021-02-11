@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<title>Create generos</title>
</head>
<body>
<form action="{{route('generos.store')}}" method="post">
	@csrf

Designação: <input type="text" name="designacao"><br>
Observações:<textarea name="observacoes"></textarea><br>
<input type="submit" value="Enviar">

</form>

</body>
</html>