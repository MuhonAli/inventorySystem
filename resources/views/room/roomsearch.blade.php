
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
              	
                <h2>Room Booking<span class="fa fa-angle-double-right"></span></h2>  	

                <?php $count = count($room);  ?> 
	                @php
		                use Carbon\Carbon;
	                @endphp 

                	@if($count > 0)

						<table class="table">
							<br>
							<thead>
							
								<th>Room Type</th>
								<th>Room Number</th>
								<th>Capacity</th>
								<th>Availabla</th>
								
							</thead>

							<tbody>
								

									@foreach ($room as $room)
										
										<tr>
											
											<td>{{ $room->room_type }}</td>
											<td>{{ $room->room_number }}</td>
											<td>{{ $room->capacity }}</td>
											<td>{{ Carbon::parse($room->date)->format('d M Y') }}</td>
											<td><a href="{{ url('/roombook/create') }}"><button class="btn-default">booking</button></a></td>
											
											
											
											
											<!-- 
											<td><a href="{{ route('room.show', $room->id) }}" class="btn btn-default btn-sm">See Details</a></td> -->
										</tr>

									@endforeach
								
								
								

							</tbody>
						</table></div>
					@else
						<h1>There is no Room Available between {{ Carbon::parse($start)->format('d M Y') }} and {{ Carbon::parse($end)->format('d M Y') }}</h1>
					@endif
	</div>

</div>
</div>
</section>
@endsection

	
	

