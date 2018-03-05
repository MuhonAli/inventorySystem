@extends('layouts.adminlayout')


@section('content')

	<section id="courseArchive">
      <div class="container">
        <div class="row">

<div class="col-md-6 col-md-offset-3">
<p>Customer Name: <strong>{{$busbook->customer_name}}</strong></p>
<p> Customer Address:<strong>{{$busbook->customer_address}}</strong></p>
<p> Customer Number:<strong>{{$busbook->customer_mobile}}</strong></p>
<p> Bus Number:<strong>{{$busbook->bus_number}}</strong></p>

{!! Html::linkRoute('busbookinfo', 'Customer List', array($busbook->id), array('class' => 'btn btn-info btn-block')) !!}
{!! Form::close() !!}
</div>


</div>
</div>
</section>


@endsection