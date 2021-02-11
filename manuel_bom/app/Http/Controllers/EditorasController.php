<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;
class EditorasController extends Controller
{
       public function index(){
	//$editora=editora::all()->sortbydesc('ide');
	$editora= Editora::paginate(4);

	return view ('editoras.index', ['editoras'=>$editora]);
}
public function show (Request $request){
	$idEditora=$request->id;

	//$livro = Livro::findOrFail($idLivro);

	//$livro= livro::find($idLivro);

	$editora=Editora::where('id_editora',$idEditora)->first();
	
	return view ('editoras.show',['editora'=>$editora]);
}
public function create() {

	
	return view ('editoras.create');
}
public function store(Request $request){
	// $novoGenero = $request ->all()

	$novoEditora=$request -> validate ([
		'nome'=>['required','min:3','max:100'],
		'morada'=>['nullable','min:3','max:100'],
		'observacoes'=>['nullable','min:3','max:255'],
	]);
$editora=Editora::create($novoEditora);
	return redirect()->route('editoras.show',['id'=>$editora->id_editora]);
}
public function edit (Request $request){
$idEditora=$request->id;
$editora = Editora::where('id_editora',$idEditora)->first();

return view('editoras.edit',['editora'=>$editora]);
}

public function update (Request $request){
$idEditora=$request->id;
$editora=Editora::findOrFail($idEditora);

$autalizarEditora=$request -> validate ([
		'nome'=>['required','min:3','max:100'],
		'morada'=>['nullable','min:3','max:100'],
		'observacoes'=>['nullable','min:3','max:255'],
	]);
$editora->update($autalizarEditora);

return redirect()->route('editoras.show',['id'=>$editora->id_editora]);
}

public function delete(Request $request){
$idEditora=$request->id;
$editora = Livro::where('id_editora',$idEditora)->first();

return view('livros.delete',['editora'=>$editora]);
}

public function destroy(Request $request){
$idEditora=$request->id;
$editora=Editora::findOrFail($idEditora);
$editora->delete();

return redirect()->route('editoras.index')->with('mensagem','editora eliminado!');
}
}
