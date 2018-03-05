@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($bus, ['route' => ['bus.update', $bus->id], 'method' => 'PUT', 'files'=> true]) !!}

   
{!! Form::open(['route' => 'bus.store','files' => true]) !!}
{!! Form::label('bus_name', 'Bus Name'); !!}
{{ Form::text('bus_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('bus_number', 'Bus Number'); !!}
{{ Form::text('bus_number', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('date', 'Date'); !!}
{{ Form::date('date', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Html::linkRoute('businfo', 'Cancel', array($bus->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>
  

@endsection