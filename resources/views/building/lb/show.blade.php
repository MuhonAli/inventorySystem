@extends('layouts.adminlayout')


@section('content')

	
<div class="col-md-8 col-md-offset-3">
<strong>Room No:{{$lb->room_no}}</strong>
<p> Author:{{$lb->capacity}}</p>
<p>category:{{$lb->room_type}}</p>

{!! Html::linkRoute('lbinfo', 'Back', array($lb->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>




@endsection