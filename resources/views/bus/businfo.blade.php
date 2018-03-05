

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">

  	@php
  	use Carbon\Carbon;
  	@endphp 

<a href="{{ route('bus.create') }}" class="btn btn-info btn-block">Add New bus</a>
			<table class="table">
				<br><br>
				<h4>Available Bus</h4>
			
				<hr>
				<thebus>
					
					<th>bus id</th>
					<th>bus Name</th>
					<th>Bus Number</th>
					<th>Capacity</th>
					<th>Date</th>
					
					
					
				</thebus>

				<tbody>
					
					@foreach ($bus as $bus)
						
						<tr>
						
							<td>{{ $bus->id }}</td>
							<td>{{ $bus->bus_name }}</td>
							<td>{{ $bus->bus_number }}</td>
							<td>{{ $bus->capacity }}</td>
							<td>{{ Carbon::parse($bus->date)->format('d M Y') }}</td>
							
<td>{!! Html::linkRoute('bus.edit', 'Update', array($bus->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['bus.destroy', $bus->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

