@extends('adminlte::page')

@section('title', 'Ficha Catalográfica')

@section('content_header')
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form" method="POST" action="{{ route('manager.ficha.indeferir')}}">
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
            		        Feedback
            		    <span class="required-indicator">*</span>
            	        </label>
            	        <textarea class="form-control" name="feedback" rows="3"></textarea>
                    </div>
                </div>
            </section>

        	 <div class="form-group" >
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"> Indeferir </button>
                </div>
            </div>

        </form>
    </div>
</div>
@stop