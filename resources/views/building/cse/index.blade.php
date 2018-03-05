

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
              	
                <h2>CSE Building Information <span class="fa fa-angle-double-right"></span></h2>
			
			<table class="table">
				
				<thead>
				
					<center><th>Room No</th></center>
					<center><th>Room capacity</th></center>
					<center><th>Room type</th></center>	
					
					
				</thead>

				<tbody>
					
					@foreach ($tsc as $tscs)
						
						<tr>
						
							<center><td><a href="/cse/show/{{ $tscs['id'] }}">{{ $tscs['room_no'] }}</a> </td></center>
							<center><td>{{ $tscs['capacity'] }}</td></center>
							<center><td>{{ $tscs['room_type'] }}</td></center>
							
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

	
	

