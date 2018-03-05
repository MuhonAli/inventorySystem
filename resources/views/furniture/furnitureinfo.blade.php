

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">


<a href="{{ route('furniture.create') }}" class="btn btn-info btn-block">Add New furniture</a>
			<table class="table">
				<br><br>
				<h4>Available Insturmetns</h4>
			
				<hr>
				<thefurniture>
					
					<th>furniture No</th>
					<th>furniture Name</th>
					<th>Quantity</th>
					
					
					
				</thefurniture>

				<tbody>
					
					@foreach ($furniture as $furniture)
						
						<tr>
						
							<td>{{ $furniture->id }}</td>
							<td>{{ $furniture->furniture_name }}</td>
							<td>{{ $furniture->furniture_quantity }}</td>
							
<td>{!! Html::linkRoute('furniture.edit', 'Update', array($furniture->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['furniture.destroy', $furniture->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

