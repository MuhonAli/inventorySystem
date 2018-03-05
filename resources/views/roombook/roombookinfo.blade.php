

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-12">


<a href="#" class="btn btn-info btn-block">Room Booked</a>
			<table class="table">
				<br><br>
				
			
				<hr>
				<theroombook>
					
					<th>customer id</th>
					<th>customer name</th>
					<th>customer address</th>
					<th>customer mobile</th>
					<th>Room number</th>
					<th>Status</th>
					
					
					
				</theroombook>

				<tbody>
					
					@foreach ($roombook as $roombook)
						
						<tr>
						
							<td>{{ $roombook->id }}</td>
							<td>{{ $roombook->customer_name }}</td>
							<td>{{ $roombook->customer_address }}</td>
							<td>{{ $roombook->customer_mobile }}</td>
							<td>{{ $roombook->room_number }}</td>
							@if ($roombook->status == '0')
								<td><a href="roomconfirm/{{ $roombook->id }}" class="btn btn-success btn-block">Pending</a></td>
							@else

							<td><a href="#" class="btn btn-primary btn-block">Approved</a></td>

							@endif
							
<td>{!! Html::linkRoute('roombook.edit', 'Update', array($roombook->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['roombook.destroy', $roombook->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

