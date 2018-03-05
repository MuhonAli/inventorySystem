@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	


{!! Form::open(['route' => 'instrument.store','files' => true]) !!}

    
{!! Form::label('ins_name', 'Instrument Name'); !!}
{{ Form::text('ins_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('ins_quantity', 'Quantity'); !!}
{{ Form::text('ins_quantity', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>


{{ Form::submit('Add instrument', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>

@endsection