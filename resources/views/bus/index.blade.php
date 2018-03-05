
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
			{{--
			<table class="table">
				<br>
				<thead>
				
					<th>Bus Name</th>
					<th>Bus Number</th>
					<th>Capacity</th>
					<th>Availabla</th>
					
					
				</thead>

				<tbody>
					
					@foreach ($bus as $bus)
						
						<tr>
							
							<td>{{ $bus->bus_name }}</td>
							<td>{{ $bus->bus_number }}</td>
							<td>{{ $bus->capacity }}</td>
							<td>{{ $bus->date }}</td>
							<td><a href="{{ url('/busbook/create') }}"><button class="btn-default">booking</button></a></td>
													
							
							
							<!-- 
							<td><a href="{{ route('bus.show', $bus->id) }}" class="btn btn-default btn-sm">See Details</a></td> -->
						</tr>

					@endforeach

				</tbody>
			</table>
		--}}

		<br>

		{!! Form::open(['url' => 'bussearch']) !!}

		{{ csrf_field() }}

		<div class="col-md-6">
			{!! Form::label('Start', 'Start'); !!}
			{{ Form::date('sdate', null, array('class' => 'form-control', 'required' => '')) }}<br>
		</div>

		<div class="col-md-6">
			{!! Form::label('End', 'End'); !!}
			{{ Form::date('edate', null, array('class' => 'form-control', 'required' => '')) }}<br>
		</div>

		<style type="text/css">
			.button{text-align: center;}
			#submit {font-size: 20px; font-weight: bold; padding: 10px 10px}
		</style>
		<div class="button">
			{{ Form::submit('submit', array('class' => 'btn btn-success')) }}
		</div>

		{!! Form::close() !!}



		







		</div>
	</div>

</div>
</div>
</section>


@endsection

	
	

