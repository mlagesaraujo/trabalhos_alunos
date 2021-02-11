<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
class AutoresController extends Controller
{
   public function index(){
	//$autor=autor::all()->sortbydesc('idl');
	$Autor= Autor::paginate(100);
	//$autor= Autor::all();
	return view ('autores.index', ['autores'=>$Autor]);
}
public function show (Request $request){
	$idAutor=$request->id;

	//$livro = Livro::findOrFail($idLivro);

	//$livro= livro::find($idLivro);

	$Autor=Autor::where('id_autor',$idAutor)->first();
	
	return view ('autores.show',['Autor'=>$Autor]);
}
public function create() {

	
	return view ('autores.create');
}
public function store(Request $request){
	// $novoLivro = $request ->all()

	$novoAutor=$request -> validate ([
		'nome'=>['required','min:3','max:100'],
		'nacionalidade'=>['nullable','min:3','max:20'],
		'data_nascimento'=>['nullable','date'],
		'fotografia'=>['nullable'],
		
	]);
$Autor=Autor::create($novoAutor);
	return redirect()->route('autores.show',['id'=>$Autor->id_autor]);



}
public function edit (Request $request){
$idAutor=$request->id;
$Autor = Autor::where('id_autor',$idAutor)->first();

return view('autores.edit',['autor'=>$Autor]);
}

public function update (Request $request){
$idAutor=$request->id;
$Autor=Autor::findOrFail($idAutor);

$autalizarAutor=$request -> validate ([
		'nome'=>['required','min:3','max:100'],
		'nacionalidade'=>['nullable','min:3','max:20'],
		'data_nascimento'=>['nullable','date'],
		'fotografia'=>['nullable'],
	]);
$Autor->update($autalizarAutor);

return redirect()->route('autores.show',['id'=>$Autor->id_autor]);
}
public function delete(Request $request){
$idAutor=$request->id;
$Autor = Autor::where('id_Autor',$idAutor)->first();

return view('autores.delete',['Autor'=>$Autor]);
}

public function destroy(Request $request){
$idAutor=$request->id;
$Autor=Autor::findOrFail($idAutor);
$Autor->delete();

return redirect()->route('autores.index')->with('mensagem','Autor eliminado!');
}


}
