<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $primaryKey="id_livro";

    protected $table="livros";

  public function genero(){

  	return $this->belongsTo('App\Models\Genero', 'id_genero');
  }
public function autor(){

  	return $this->belongsTo('App\Models\Autor', 'id_autor');
  }
     public function editora(){
        return $this->hasMany('App\Models\Editora', 'id_editora');
    }
  public function autores(){
  	return $this->belongsToMany('App\Models\Autor','autores_livros','id_livro','id_autor')->withTimestamps();
  }
  public function editoras(){
    return $this->belongsToMany('App\Models\Editora','editoras_livros','id_livro','id_editora')->withTimestamps();
  }

    public function user(){

        return $this->belongsTo('App\Models\User','id_user');
    }



  public $fillable =[
'titulo',
'idioma',
'ttal_paginas',
'total_edicao',
'isbn',
'observacoes',
'imagem_capa',
'id_genero',
'id_autor',
'sinopse',
'id_user'
  ];




}
