

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
              	
                <h2>EEE Building Room Number {{$id}} Information <span class="fa fa-angle-double-right"></span></h2>
				
				@if (count($eee_fur) > 0 || count($eee_ins) > 0)
	                <table class="table">
	                	<thead>
	                		<center><th>Name</th></center>
	                		<center><th>Quantity</th></center>	
	                	</thead>

	                	<tbody>

	                		@if (count($eee_fur > 0 ))
	                		@foreach ($eee_fur as $eee_furs)
	                		<tr>
	                			<center><td>{{ $eee_furs->furniture_name }}</td></center>
	                			<center><td>{{ $eee_furs->quantity}}</td></center>
	                		</tr>
	                		@endforeach
	                		@endif	

	                		@if (count($eee_ins > 0 ))
	                		@foreach ($eee_ins as $eee_inss)
	                		<tr>
	                			<center><td>{{ $eee_inss->ins_name }}</td></center>
	                			<center><td>{{ $eee_inss->quantity}}</td></center>
	                		</tr>
	                		@endforeach
	                		@endif	
	                	</tbody>
	                </table>
				@else
					<h3 style="text-align: center; padding: 10px 0px;">No Furniture or Instrument available in Room Number {{$id}}</h3>
				@endif

		</div>
	</div>

</div>
</div>
</section>
				
@endsection

	
	

