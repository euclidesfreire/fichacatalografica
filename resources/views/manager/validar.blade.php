@extends('adminlte::page')

@section('title', 'Ficha Catalográfica')

@section('content_header')
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form" method="POST" action="{{ route('manager.ficha.validar')}}">
            @csrf
     
            <section>
                <legend>Indeferir Solicitação de Ficha Catalográfica</legend>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                    	@foreach($ficha as $f)
                        <label>
            	            #
            	        </label>
                        <span>{{$f->id}}</span>
                        <br/>
                        <label>
            	            Título:
            	        </label> 
                        <span>{{$f->titulo}}</span>
                        <input type="hidden" name="id_ficha" value="{{$f->id}}">
                        @endforeach
                    </div>
                
                    <div class="form-group col-md-6">
            	        <label>
            		        Código CDU
            		    <span class="required-indicator">*</span>
            	        </label>
            	        <input type="text" name="cdu" class="form-control">
                    </div>
                </div>
            </section>

        	 <div class="form-group" >
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"> Validar </button>
                </div>
            </div>

        </form>
    </div>
</div>
@stop