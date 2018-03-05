
@extends('layouts.adminlayout')

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

			<table class="table">
				<br>
				<thead>
				
					<th>Customer Name</th>
					<th>Customer Address</th>
					<th>Customer Mobile</th>
					<th>Bus Number</th>
					
					
				</thead>

				<tbody>
					
					@foreach ($roombook as $roombook)
						
						<tr>
							
							<td>{{ $roombook->customer_name }}</td>
							<td>{{ $roombook->customer_address }}</td>
							<td>{{ $roombook->customer_mobile }}</td>
							<td>{{ $roombook->room_number }}</td>
							<td><a href="{{ url('/roombook') }}"><button class="btn-default">booking</button></a></td>
							
							
							
							
							<!-- 
							<td><a href="{{ route('roombook.show', $roombook->id) }}" class="btn btn-default btn-sm">See Details</a></td> -->
						</tr>

					@endforeach

					
					

				</tbody>
			</table></div>
	</div>

</div>
</div>
</section>
@endsection

	
	

