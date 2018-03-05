

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-12">

			<table class="table">
				<br><br>
				<h4>Available busbook</h4>
			
				<hr>
				<thebusbook>
					
					<th>customer id</th>
					<th>customer name</th>
					<th>customer address</th>
					<th>customer mobile</th>
					<th>bus number</th>
					<th>Status</th>
					
					
					
				</thebusbook>

				<tbody>
					
					@foreach ($busbook as $busbook)
						
						<tr>
						
							<td>{{ $busbook->id }}</td>
							<td>{{ $busbook->customer_name }}</td>
							<td>{{ $busbook->customer_address }}</td>
							<td>{{ $busbook->customer_mobile }}</td>
							<td>{{ $busbook->bus_number }}</td>
							@if ($busbook->status == '0')
								<td><a href="bookconfirm/{{ $busbook->id }}" class="btn btn-success btn-block">Pending</a></td>
							@else

							<td><a href="#" class="btn btn-primary btn-block">Approved</a></td>

							@endif
							
<td>{!! Html::linkRoute('busbook.edit', 'Update', array($busbook->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['busbook.destroy', $busbook->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

