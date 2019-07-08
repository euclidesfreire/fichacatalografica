@extends('adminlte::page')

@section('title', 'Ficha Catalográfica')

@section('content_header')
@stop

@section('content')
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-info active">
                            <input type="radio" name="status" value="all" checked="checked"> Todos
                        </label>
                        <label class="btn btn-success">
                            <input type="radio" name="status" value="active"> Deferidos
                        </label>
                        <label class="btn btn-warning">
                            <input type="radio" name="status" value="inactive"> Solicitados
                        </label>
                        <label class="btn btn-danger">
                            <input type="radio" name="status" value="expired"> Indeferidos
                        </label>							
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($fichas as $ficha)
                <tr data-status="{{$ficha['datastatus']}}">
                    <td>{{$ficha['id']}}</td>
                    <td>{{$ficha['titulo']}}</td>
                    <td><span class="label {{$ficha['label']}}">{{$ficha['status']}}</span></td>
                    <td><a href="{{url($ficha['link'] . '/' . $ficha['id'])}}" class="btn btn-sm manage">{{$ficha['action']}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 

     <style type="text/css">
	.table-wrapper {
        width: 100%;
        background: #fff;
        padding: 20px 30px 5px;
        margin: 0px auto;
        box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
    }
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		min-width: 50px;
		border-radius: 2px;
		border: none;
		padding: 6px 12px;
		font-size: 95%;
		outline: none !important;
		height: 30px;
	}
    .table-title {
		border-bottom: 1px solid #e9e9e9;
		padding-bottom: 15px;
		margin-bottom: 5px;
		background: #fff;
		margin: -20px -31px 10px;
		padding: 15px 30px;
		color: #fff;
    }
    .table-title h2 {
		margin: 2px 0 0;
		font-size: 24px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 40px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table td a {
        color: #2196f3;
    }
	table.table td .btn.manage {
		padding: 2px 10px;
		background: #37BC9B;
		color: #fff;
		border-radius: 2px;
	}
	table.table td .btn.manage:hover {
		background: #2e9c81;		
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$(".btn-group .btn").click(function(){
		var inputValue = $(this).find("input").val();
		if(inputValue != 'all'){
			var target = $('table tr[data-status="' + inputValue + '"]');
			$("table tbody tr").not(target).hide();
			target.fadeIn();
		} else {
			$("table tbody tr").fadeIn();
		}
	});
	// Changing the class of status label to support Bootstrap 4
    var bs = $.fn.tooltip.Constructor.VERSION;
    var str = bs.split(".");
    if(str[0] == 4){
        $(".label").each(function(){
        	var classStr = $(this).attr("class");
            var newClassStr = classStr.replace(/label/g, "badge");
            $(this).removeAttr("class").addClass(newClassStr);
        });
    }
});
</script>
@stop