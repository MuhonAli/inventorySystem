@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($lb, ['route' => ['lb.update', $lb->id], 'method' => 'PUT', 'filbs'=> true]) !!}

     
{!! Form::label('room_no', 'Room No'); !!}
{{ Form::text('room_no', null, array('class' => 'form-control', 'required' => '', 'maxlbngth' => '255')) }}<br>
 
{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlbngth' => '1') ) }}<br>

{!! Form::label('room_type', 'Room Type'); !!}
{{ Form::text('room_type', null, array('class' => 'form-control', 'required' => '', 'minlbngth' => '5') ) }}<br>


	
					
{!! Html::linkRoute('lbinfo', 'Cancel', array($lb->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>


@endsection