
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
              	
                <h2>Furniture Availablity<span class="fa fa-angle-double-right"></span></h2>  	

			<table class="table">
				<br>
				<thead>
					<th>ID</th>
					<th>furnitures Name</th>
					<th>Quantity</th>
					
					
				</thead>

				<tbody>
					
					@foreach ($furniture as $furniture)
						
						<tr>
							<th>{{ $furniture->id }}</th>
							<td> <a href="furniture\{{ $furniture->furniture_name }}\{{ $furniture->id }}">{{ $furniture->furniture_name }}</a> </td>
							@foreach ($result as $element)
								@if ($element['fur_name'] == $furniture->furniture_name)
									<td>{{ $element['total'] }}</td>
								@endif
							@endforeach

							
							
							<!-- 
							<td><a href="{{ route('furniture.show', $furniture->id) }}" class="btn btn-default btn-sm">See Details</a></td> -->
						</tr>

					@endforeach

					
					

				</tbody>
			</table></div>
	</div>

</div>
</div>
</section>
@endsection

	
	

