@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	
  	@if($errors->any())
  	<h4>{{$errors->first()}}</h4>
  	@endif


{!! Form::open(['url' => 'add/cse','files' => true]) !!}

	{{ Form::hidden('id', $id, array('class' => 'form-control') ) }}
	{{ Form::hidden('type', $type, array('class' => 'form-control') ) }}
	
@if ($type == 'furniture')
	{!! Form::label('Add Furniture', 'Add Furniture'); !!}
	{!! Form::select('furniture' , array('' => 'Select Furniture') + $data,null, ['class' => 'form-control'] ) !!} <br>

	{!! Form::label('Quantity', 'Quantity'); !!}
	{{ Form::text('quantity', null, array('class' => 'form-control') ) }}<br>

	
@else
	{!! Form::label('Add Instrument', 'Add Instrument'); !!}
	{!! Form::select('instrument' , array('' => 'Select Instrument') + $data,null, ['class' => 'form-control'] ) !!}<br>
	
	{!! Form::label('Quantity', 'Quantity'); !!}
	{{ Form::text('quantity', null, array('class' => 'form-control') ) }}<br>

@endif
    

{{ Form::submit('Add to CSE', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}
 

 	
</div>
</div>

@endsection