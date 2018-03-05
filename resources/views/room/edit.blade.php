@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($room, ['route' => ['room.update', $room->id], 'method' => 'PUT', 'files'=> true]) !!}

   
{!! Form::open(['route' => 'room.store','files' => true]) !!}
{!! Form::label('room_type', 'room Type'); !!}
{{ Form::text('room_type', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('room_number', 'room Number'); !!}
{{ Form::text('room_number', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('date', 'Date'); !!}
{{ Form::date('date', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Html::linkRoute('roominfo', 'Cancel', array($room->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>
  

@endsection