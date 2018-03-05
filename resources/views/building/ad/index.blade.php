

@extends('layouts.layout')

@section('content')

  <section id="courseArchive">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="courseArchive_sidebar">
         
              <div class="single_sidebar">	
              	<br><br>
              	<div class="single_sidebar">	
              	
                <h2>Administration Building Information<span class="fa fa-angle-double-right"></span></h2>
			<table class="table">
				
				<thead>
				
					<center><th>Room No</th></center>
					<center><th>Room capacity</th></center>
					<center><th>Room type</th></center>
					
					
					
				</thead>

				<tbody>
					
					@foreach ($ad as $ad)
						
						<tr>
						
							<td>{{ $ad->room_no }}</td>
							<td>{{ $ad->capacity }}</td>
							<td>{{ $ad->room_type }}</td>
							
							
							
							
							<!-- <td><a href="{{ route('ad.show', $ad->id) }}" class="btn btn-default btn-sm">Details</a></td> -->
						</tr>

					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
</div>
</section>
				
@endsection

	
	

