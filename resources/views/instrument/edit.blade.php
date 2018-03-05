@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($instrument, ['route' => ['instrument.update', $instrument->id], 'method' => 'PUT', 'files'=> true]) !!}

   
{!! Form::open(['route' => 'instrument.store','files' => true]) !!}

{!! Form::label('ins_name', 'instrument Name'); !!}
{{ Form::text('ins_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('ins_quantity', 'Quantity'); !!}
{{ Form::text('ins_quantity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>


{!! Html::linkRoute('instrumentinfo', 'Cancel', array($instrument->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>
  

@endsection