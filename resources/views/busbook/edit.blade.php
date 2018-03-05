@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($busbook, ['route' => ['busbook.update', $busbook->id], 'method' => 'PUT', 'files'=> true]) !!}

   
   
{!! Form::label('customer_name', 'Your Name'); !!}
{{ Form::text('customer_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('customer_address', 'Your Address'); !!}
{{ Form::text('customer_address', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('customer_mobile', 'Your Mobile No'); !!}
{{ Form::text('customer_mobile', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('bus_number', 'Confirm Bus Number'); !!}
{{ Form::text('bus_number', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Html::linkRoute('busbookinfo', 'Cancel', array($busbook->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>
  

@endsection