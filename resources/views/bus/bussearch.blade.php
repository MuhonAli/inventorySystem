
@extends('layouts.layout')

@section('content')

<section id="courseArchive">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="courseArchive_sidebar">
         
              <div class="single_sidebar">	
              	<br>
              	<div class="single_sidebar">	
              	


                <h2>Bus Booking<span class="fa fa-angle-double-right"></span></h2>  	
				

                <?php $count = count($bus);  ?> 

                @php
                use Carbon\Carbon;
                @endphp 

                @if($count>0)

                <div class="col-md-12">
                	@foreach ($bus as $bus)
	                	<div class="col-md-4">
	                		<div>
	                			<img src="{{ $bus->image }}" height="200px" width="340px"> 
	                		</div>
	                		<div style="text-align: center;">
	                			<h3>{{$bus->bus_name}}</h3>
	                			<p> Bus Number :  {{$bus->bus_number}}</p>
	                			<p> Capacity :  {{$bus->capacity}}</p>
	                			<p> Available :  {{ Carbon::parse($bus->date)->format('d M Y') }} </p>
	                			<a href="{{ url('/busbook/create') }}"><button class="btn-primary">booking</button></a><br><br>
	                		</div>

	                	</div>
                	@endforeach
                </div>

                @else
                	<h1>There is no Bus Schedule between {{ Carbon::parse($start)->format('d M Y') }}  and {{ Carbon::parse($end)->format('d M Y') }} </h1>
                @endif












		<br>




		</div>
	</div>

</div>
</div>
</section>


@endsection

	
	

