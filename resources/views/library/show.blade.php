@extends('layouts.adminlayout')


@section('content')

<section id="courseArchive">
      <div class="container">
        <div class="row">

	
<div class="col-md-6 col-md-offset-3">
	<br><br>
<p>Book Name:{{$library->book_name}}</p>
<p>Book Name:{{$library->quantity}}</p>
<p> Author:{{$library->author}}</p>
<p>category:{{$library->category}}</p>

{!! Html::linkRoute('libraryinfo', 'Back', array($library->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>


</div>
</div>
</section>

@endsection