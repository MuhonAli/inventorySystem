@extends('layouts.adminlayout')


@section('content')

	<section id="courseArchive">
      <div class="container">
        <div class="row">

<div class="col-md-6 col-md-offset-3">
<p>room Name: <strong>{{$room->room_type}}</strong></p>
<p> Number:<strong>{{$room->room_number}}</strong></p>
<p> Capacity:<strong>{{$room->capacity}}</strong></p>
<p> Date:<strong>{{$room->date}}</strong></p>

{!! Html::linkRoute('roominfo', 'room List', array($room->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>


</div>
</div>
</section>


@endsection