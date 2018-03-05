@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	


{!! Form::open(['route' => 'room.store','files' => true]) !!}

    
{!! Form::label('room_type', 'room Type'); !!}
{{ Form::text('room_type', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('room_number', 'room Number'); !!}
{{ Form::text('room_number', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('date', 'Date'); !!}
{{ Form::date('date', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{{ Form::submit('Add room', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>

@endsection