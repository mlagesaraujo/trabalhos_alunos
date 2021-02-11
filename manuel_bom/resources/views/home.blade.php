@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Você está logado!') }}




                <div align="center">
                <div class="col-md-6">
                     
                    <button type="button" class="btn btn-md btn-outline-info ">
                      <a href="{{route('livros.index')}}">Livros</a>
                    </button> 
                    <button type="button" class="btn btn-md btn-outline-info ">
                   <a href="{{route('generos.index')}}">Generos</a>
                    </button>
                </div>
                <div class="col-md-6">
                     
                    <button type="button" class="btn btn-outline-info btn-block">
                   <a href="{{route('editoras.index')}}">Editoras</a>
                    </button> 
                    <button type="button" class="btn btn-outline-info btn-block">
                       <a href="{{route('autores.index')}}">Autores</a>
                    </button>
                </div>
                </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
