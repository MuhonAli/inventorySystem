

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">

  	@php
  		use Carbon\Carbon;
  	@endphp


			<table class="table">
				<br><br>
		
			
				<hr>
				<theroom>
					
					<th>room id</th>
					<th>room Type</th>
					<th>room Number</th>
					<th>Capacity</th>
					<th>Date</th>
					
					
					
				</theroom>

				<tbody>
					
					@foreach ($room as $room)
						
						<tr>
						
							<td>{{ $room->id }}</td>
							<td>{{ $room->room_type }}</td>
							<td>{{ $room->room_number }}</td>
							<td>{{ $room->capacity }}</td>
							<td>{{ Carbon::parse($room->date)->format('d M Y') }}</td>
							
<td>{!! Html::linkRoute('room.edit', 'Update', array($room->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['room.destroy', $room->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

