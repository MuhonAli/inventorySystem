@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($eee, ['route' => ['eee.update', $eee->id], 'method' => 'PUT', 'files'=> true]) !!}

     
{!! Form::label('room_no', 'Room No'); !!}
{{ Form::text('room_no', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('room_type', 'Room Type'); !!}
{{ Form::text('room_type', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5') ) }}<br>


	
					
{!! Html::linkRoute('eeeinfo', 'Cancel', array($eee->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>


@endsection