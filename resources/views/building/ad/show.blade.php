@extends('layouts.adminlayout')


@section('content')

	
<div class="col-md-8 col-md-offset-3">
<strong>Room No:{{$ad->room_no}}</strong>
<p> Author:{{$ad->capacity}}</p>
<p>category:{{$ad->room_type}}</p>

{!! Html::linkRoute('adinfo', 'Back', array($ad->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>




@endsection