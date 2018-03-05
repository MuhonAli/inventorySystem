@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	


{!! Form::open(['route' => 'furniture.store','files' => true]) !!}

    
{!! Form::label('furniture_name', 'Furniture Name'); !!}
{{ Form::text('furniture_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('furniture_quantity', 'Quantity'); !!}
{{ Form::text('furniture_quantity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>


{{ Form::submit('Add furniture', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>

@endsection