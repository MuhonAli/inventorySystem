

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
              	
                <h2>{{$name}} Location And Quantity <span class="fa fa-angle-double-right"></span></h2>

			<table class="table">
				<br>
				<thead>
					
					<th>Building</th>
					<th>Room No</th>
					<th>Quantity</th>
					
				</thead>

				<tbody>
					
					@if (count($cse)>0)
						
						@foreach ($cse as $cses)
						
						<tr>
							<td>CSE</td>
							<td>{{ $cses->room_no }}</td>
							<td>{{ $cses->quantity }}</td>

						@endforeach

					@endif

					@if (count($ce)>0)
						
						@foreach ($ce as $ces)
						
						<tr>
							<td>CE</td>
							<td>{{ $ces->room_no }}</td>
							<td>{{ $ces->quantity }}</td>

						@endforeach

					@endif


					@if (count($eee)>0)
						
						@foreach ($eee as $eees)
						<tr>
							<td>EEE</td>
							<td>{{ $eees->room_no }}</td>
							<td>{{ $eees->quantity }}</td>

						@endforeach

					@endif

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
</div>
</section>
				
@endsection

	
	

