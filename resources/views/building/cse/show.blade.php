@extends('layouts.adminlayout')


@section('content')

	
<div class="col-md-8 col-md-offset-3">
<strong>Room No:{{$cse->room_no}}</strong>
<p> Capacity:{{$cse->capacity}}</p>
<p>Room Type:{{$cse->room_type}}</p>
{!! Html::linkRoute('cseinfo', 'Back', array($cse->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}


</div>

</div>
</div>
</section>


@endsection