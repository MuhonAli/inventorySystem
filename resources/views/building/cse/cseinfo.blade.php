

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">

		@if(Session::has('roomaddcse'))
  
            
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('roomaddcse') }}
                </div>
            
 	   @endif
<a href="{{ route('cse.create') }}" class="btn btn-info btn-block">Add New Room</a>
			<table class="table">
				<br><br>

				<h4>Room Information in CSE Building</h4>
			
				<hr>
				<thead>
					
					<th>Room No</th>
					<th>Room capacity</th>
					<th>Room type</th>
					
					
					
				</thead>

				<tbody>
					
					@foreach ($cse as $cse)
						
						<tr>
						
							<td>{{ $cse->room_no }}</td>
							<td>{{ $cse->capacity }}</td>
							<td>{{ $cse->room_type }}</td>

							<td><a href="/add/cse/furniture/{{$cse->id}}" class="btn btn-primary">Add Furniture</a></td>
							<td><a href="/add/cse/instrument/{{$cse->id}}" class="btn btn-primary">Add Instrument</a></td>
							
<td>{!! Html::linkRoute('cse.edit', 'Update', array($cse->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['cse.destroy', $cse->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

