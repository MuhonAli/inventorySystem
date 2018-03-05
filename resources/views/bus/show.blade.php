@extends('layouts.adminlayout')


@section('content')

	<section id="courseArchive">
      <div class="container">
        <div class="row">

<div class="col-md-6 col-md-offset-3">
<p>bus Name: <strong>{{$bus->bus_name}}</strong></p>
<p> Number:<strong>{{$bus->bus_number}}</strong></p>
<p> Capacity:<strong>{{$bus->capacity}}</strong></p>
<p> Date:<strong>{{$bus->date}}</strong></p>

{!! Html::linkRoute('businfo', 'bus List', array($bus->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>


</div>
</div>
</section>


@endsection