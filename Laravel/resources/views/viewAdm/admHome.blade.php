@extends('layouts.admLay1')
@section('refUbi')
<ol class="breadcrumb">
	<li><a href="#">Administracion</a></li>
	<li class="active">Estado del dia</li>
</ol>

@endsection
@section('content')
<div class="col-lg-12">
            <section class="panel">
                    <header class="panel-heading  align-lg-center">
                            <h2><strong>C.S.J.O.</strong>Bienvenido  Administracion</h2>
                    </header>
            </section>
        </div>

@endsection

@section('scripts')
<script>

    $(document).ready(function(){

    $("#formID").submit(function(e){
            e.preventDefault();
            if($(this).parsley( 'validate' )){
                alert("send");
            }
        });
        
        //iCheck[components] validate
        $('input').on('ifChanged', function(event){
            $(event.target).parsley( 'validate' );
        });
        
    });
</script>



@endsection

