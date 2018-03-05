@extends('layouts.adminlayout')


@section('content')

	
<div class="col-md-8 col-md-offset-3">
<strong>Room No:{{$eee->room_no}}</strong>
<p> Author:{{$eee->capacity}}</p>
<p>category:{{$eee->room_type}}</p>

{!! Html::linkRoute('eeeinfo', 'Back', array($eee->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>




@endsection