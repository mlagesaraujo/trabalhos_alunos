<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;

class LivrosController extends Controller
{
		public function index(){
				//$livro= Livro::all()->sortbydesc('idl');
				//$livro= Livro::paginate(10);
			$livro= Livro::all();
				return view ('livros.index', ['livros'=>$livro]);
		}

		public function show (Request $request){
			$utilizador="";
			$idLivro=$request->id;
		    
			//$livro = Livro::findOrFail($idLivro);

			//$livro= livro::find($idLivro);



		//************
			//******aqui
		        if(Auth::check()){
		            $userAtual=Auth::user()->id;
		      
		        }
			$livro=Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras'])->first();

			//************
			//******aqui
			return view ('livros.show',['livro'=>$livro,
				'utilizador'=>$utilizador]); 


		}

		public function create() {
			$generos=Genero::all();
			$autores=Autor::all();
			$editoras=Editora::all();

			return view ('livros.create',[
			'generos'=>$generos,
			'autores'=>$autores,
			'editoras'=>$editoras
			]);
		}


		public function store(Request $request){
			// $novoLivro = $request ->all()

			$novoLivro=$request -> validate ([
				'titulo'=>['required','min:3','max:100'],
				'idioma'=>['nullable','min:3','max:20'],
				'total_paginas'=>['nullable','numeric','min:1'],
				'data_edicao'=>['nullable','date'],
				'isbn'=>['required','min:13','max:13'],
				'observacoes'=>['nullable','min:3','max:255'],
				'imagem_capa'=>['nullable'],
				'id_genero'=>['nullable','numeric'],
				//'id_autor'=>['nullable','numeric'],
				'sinopse'=>['nullable','min:3','max:255'],
				'id_user'=>['nullable','required','min:1','max:50'],
			]);


		//************
			//******aqui

		    if(Auth::check()){
		        $userAtual=Auth::user()->id;
		        $novoLivro['id_user']=$userAtual;
		    }



			$editoras=$request->id_editora;
			$autores=$request->id_autor;



			$livro=livro::create($novoLivro);
			$livro->autores()->attach($autores);
			$livro->editoras()->attach($editoras);

			return redirect()->route('livros.show',['id'=>$livro->id_livro]);
		}


		public function edit (Request $request){
			$idLivro=$request->id;
			$generos=Genero::all();
			$autores=Autor::all();
			$editoras=Editora::all();

			$livro = Livro::where('id_livro',$idLivro)->with(['autores','editoras','user'])->first();
			$autoresLivros=[];

			foreach($livro->autores as $autor) {
				$autoresLivros[]=$autor->id_autor;
			}
			$editorasLivros=[];
			foreach($livro->editoras as $editora) {
				$editorasLivros[]=$editora->id_editora;
			}
			return view('livros.edit',['livro'=>$livro,
				'generos'=>$generos,
				'autores'=>$autores,
				'autoresLivros'=>$autoresLivros,
				'editoras'=>$editoras,
				'editorasLivros'=>$editorasLivros
			]);
		}

		public function update (Request $request){
			$idLivro=$request->id;
			$livro=Livro::findOrFail($idLivro);

			$autalizarLivro=$request -> validate ([
					'titulo'=>['required','min:3','max:100'],
					'idioma'=>['nullable','min:3','max:20'],
					'total_paginas'=>['nullable','numeric','min:1'],
					'data_edicao'=>['nullable','date'],
					'isbn'=>['required','min:13','max:13'],
					'observacoes'=>['nullable','min:3','max:255'],
					'imagem_capa'=>['nullable'],
					'id_genero'=>['nullable','numeric'],
					//'id_autor'=>['nullable','numeric'],
					'sinopse'=>['nullable','min:3','max:255']
				]);
			$autores=$request->id_autor;
			$editoras=$request->id_editora;
			$livro->update($autalizarLivro);
			$livro->autores()->sync($autores);
			$livro->editoras()->sync($editoras);

			return redirect()->route('livros.show',['id'=>$livro->id_livro]);
		}

		public function delete(Request $request){
			$idLivro=$request->id;
			$livro = Livro::where('id_livro',$idLivro)->first();

			return view('livros.delete',['livro'=>$livro]);
		}

		public function destroy(Request $request){
			$idLivro=$request->id;
			$livro=Livro::findOrFail($idLivro);
			$autoresLivros=Livro::findOrFail($idLivro)->autores;
			$livro->autores()->detach($autoresLivros);

			$livro->delete();

			return redirect()->route('livros.index')->with('mensagem','livro eliminado!');
		}
}