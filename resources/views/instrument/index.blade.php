

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
              	
                <h2>Instruments Availablity<span class="fa fa-angle-double-right"></span></h2>

			<table class="table">
				<br>
				<thead>
					
					<th>instruments Name</th>
					<th>Quantity</th>
					
					
				</thead>

				<tbody>
					
					@foreach ($instrument as $instrument)
						
						<tr>
						
							<td> <a href="instrument/{{ $instrument->ins_name }}/{{ $instrument->id }}"> {{ $instrument->ins_name }}</a></td>

							@foreach ($result as $element)
								
								@if ($element['ins_name'] == $instrument->ins_name)
									<td>{{ $element['total'] }}</td>

								@endif
							@endforeach

							



						<!-- 	
							<td><a href="{{ route('instrument.show', $instrument->id) }}" class="btn btn-default btn-sm">See Details</a></td> -->
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

	
	

