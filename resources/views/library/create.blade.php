@extends('layouts.adminlayout')


@section('content')

<div class="row">
  <div class="col-md-9">
  	


{!! Form::open(['route' => 'library.store','files' => true]) !!}

    
{!! Form::label('book_name', 'Book Name'); !!}
{{ Form::text('book_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>

{!! Form::label('quantity', 'Quantity'); !!}
{{ Form::text('quantity', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('author', 'Author Name'); !!}
{{ Form::text('author', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5') ) }}<br>

{!! Form::label('category', 'Book Category'); !!}
{{ Form::text('category', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5') ) }}<br>


{{ Form::submit('Add to Library', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}

 	
</div>
</div>

@endsection