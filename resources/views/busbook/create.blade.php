@extends('layouts.layout')


@section('content')
  <section id="courseArchive">
      <div class="container">
<div class="row">
  <div class="col-md-4 col-md-offset-4">
  	
<br>

{!! Form::open(['route' => 'busbook.store','files' => true]) !!}

    
{!! Form::label('customer_name', 'Your Name'); !!}
{{ Form::text('customer_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('customer_address', 'Your Address'); !!}
{{ Form::text('customer_address', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('customer_mobile', 'Your Mobile No'); !!}
{{ Form::text('customer_mobile', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}<br>

{!! Form::label('bus_number', 'Confirm Bus Number'); !!}
{{ Form::text('bus_number', null, array('class' => 'form-control', 'required' => '', 'minlength' => '1') ) }}

{{ Form::submit('Book Now!', array('class' => 'btn btn-info btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>
</div>
</section>

@endsection