@extends('layouts.layout')


@section('content')

	<section id="courseArchive">
      <div class="container">
        <div class="row">

<div class="col-md-6 col-md-offset-3">
<p>furniture Name: <strong>{{$furniture->furniture_name}}</strong></p>
<p> Quantity:<strong>{{$furniture->furniture_quantity}}</strong></p>

{!! Html::linkRoute('furniture.index', 'Furnitures List', array($furniture->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>


</div>
</div>
</section>


@endsection