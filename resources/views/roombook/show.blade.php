@extends('layouts.adminlayout')


@section('content')

	<section id="courseArchive">
      <div class="container">
        <div class="row">

<div class="col-md-6 col-md-offset-3">
<p>Customer Name: <strong>{{$roombook->customer_name}}</strong></p>
<p> Customer Address:<strong>{{$roombook->customer_address}}</strong></p>
<p> Customer Number:<strong>{{$roombook->customer_mobile}}</strong></p>
<p> Room No:<strong>{{$roombook->room_number}}</strong></p>

{!! Html::linkRoute('roombookinfo', 'Customer List', array($roombook->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>


</div>
</div>
</section>


@endsection