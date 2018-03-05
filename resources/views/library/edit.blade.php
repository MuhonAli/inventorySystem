@extends('layouts.adminlayout')

<div class="col-md-6">
@section('content')

<br><br><br><br>
	
{!! Form::model($library, ['route' => ['library.update', $library->id], 'method' => 'PUT', 'files'=> true]) !!}

   
{!! Form::label('book_name', 'Book Name'); !!}
{{ Form::text('book_name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>

{!! Form::label('quantity', 'Quantity'); !!}
{{ Form::text('quantity', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}<br>
 
{!! Form::label('author', 'Author Name'); !!}
{{ Form::text('author', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5') ) }}<br>

{!! Form::label('category', 'Book Category'); !!}
{{ Form::text('category', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5') ) }}<br>


	
					
{!! Html::linkRoute('libraryinfo', 'Cancel', array($library->id), array('class' => 'btn btn-danger btn-block')) !!}
					
					'
{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					 
			
{!! Form::close() !!}
	
</div>


@endsection