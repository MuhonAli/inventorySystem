@extends('layouts.adminlayout')


@section('content')

	
<div class="col-md-8 col-md-offset-3">
<strong>Room No:{{$ce->room_no}}</strong>
<p> Author:{{$ce->capacity}}</p>
<p>category:{{$ce->room_type}}</p>

{!! Html::linkRoute('ceinfo', 'Back', array($ce->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>




@endsection