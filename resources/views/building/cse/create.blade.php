@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	


{!! Form::open(['route' => 'cse.store','files' => true]) !!}

    
{!! Form::label('room_no', 'Room No'); !!}
{{ Form::text('room_no', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('room_type', 'Room Type'); !!}
{{ Form::text('room_type', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>


{{ Form::submit('Add to CSE', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>

@endsection