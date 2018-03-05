@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	


{!! Form::open(['route' => 'lb.store','filbs' => true]) !!}

    
{!! Form::label('room_no', 'Room No'); !!}
{{ Form::text('room_no', null, array('class' => 'form-control', 'required' => '', 'maxlbngth' => '255')) }}<br>
 
{!! Form::label('capacity', 'Capacity'); !!}
{{ Form::text('capacity', null, array('class' => 'form-control', 'required' => '', 'minlbngth' => '1') ) }}<br>

{!! Form::label('room_type', 'Room Type'); !!}
{{ Form::text('room_type', null, array('class' => 'form-control', 'required' => '', 'minlbngth' => '1') ) }}<br>


{{ Form::submit('Add to Library Building', array('class' => 'btn btn-success btn-lg btn-block', 'stylb' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>

@endsection