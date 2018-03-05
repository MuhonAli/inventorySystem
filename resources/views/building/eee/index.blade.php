

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
              	
                <h2>EEE Building Information<span class="fa fa-angle-double-right"></span></h2>
			<table class="table">
				
				<thead>
				
					<center><th>Room No</th></center>
					<center><th>Room capacity</th></center>
					<center><th>Room type</th></center>
					
					
				</thead>

				<tbody>
					
					@foreach ($tsc as $tscs)
						
						<tr>
						
							<td> <a href="eee/show/{{ $tscs['id'] }}">{{ $tscs['room_no'] }}</a> </td>
							<td>{{ $tscs['capacity'] }}</td>
							<td>{{ $tscs['room_type'] }}</td>
							
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

	
	

