@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	


{!! Form::open(['route' => 'bus.store','files' => true]) !!}

    
{!! Form::label('bus_name', 'Bus Name'); !!}
{{ Form::text('bus_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('bus_number', 'Bus Number'); !!}
{{ Form::text('bus_number', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('Image', 'Bus Image'); !!} <br>
{{ Form::file('image', null, array('class' => 'form-control', 'required' => '') ) }}<br><br>

{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('date', 'Date'); !!}
{{ Form::date('date', null, array('class' => 'form-control', 'required' => '') ) }}<br>

{{ Form::submit('Add Bus', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>

@endsection