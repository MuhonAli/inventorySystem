

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">


<a href="{{ route('instrument.create') }}" class="btn btn-info btn-block">Add New Instrument</a>
			<table class="table">
				<br><br>
				<h4>Available Insturmetns</h4>
			
				<hr>
				<theinstrument>
					
					<th>instrument No</th>
					<th>instrument Name</th>
					<th>Quantity</th>
					
					
					
				</theinstrument>

				<tbody>
					
					@foreach ($instrument as $instrument)
						
						<tr>
						
							<td>{{ $instrument->id }}</td>
							<td>{{ $instrument->ins_name }}</td>
							<td>{{ $instrument->ins_quantity }}</td>
							
<td>{!! Html::linkRoute('instrument.edit', 'Update', array($instrument->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['instrument.destroy', $instrument->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

