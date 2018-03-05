@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($furniture, ['route' => ['furniture.update', $furniture->id], 'method' => 'PUT', 'files'=> true]) !!}

   
{!! Form::open(['route' => 'furniture.store','files' => true]) !!}

    
{!! Form::label('furniture_name', 'furniture Name'); !!}
{{ Form::text('furniture_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('furniture_quantity', 'Quantity'); !!}
{{ Form::text('furniture_quantity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Html::linkRoute('furniture.show', 'Cancel', array($furniture->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>
  

@endsection