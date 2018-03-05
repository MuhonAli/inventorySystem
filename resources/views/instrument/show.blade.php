@extends('layouts.adminlayout')


@section('content')

	
<div class="col-md-6 col-md-offset-3">
<p>instrument Name: <strong>{{$instrument->ins_name}}</strong></p>
<p> Quantity:<strong>{{$instrument->ins_quantity}}</strong></p>

{!! Html::linkRoute('instrumentinfo', 'instruments List', array($instrument->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>


@endsection