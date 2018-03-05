

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">
@if(Session::has('roomaddce'))
  
            
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('roomaddce') }}
                </div>
            
 	   @endif

<a href="{{ route('ce.create') }}" class="btn btn-info btn-block">Add New Room</a>
			<table class="table">
				<br><br>
				<h4>Room Information in ce Building</h4>
			
				<hr>
				<thead>
					
					<th>Room No</th>
					<th>Room capacity</th>
					<th>Room type</th>
					
					
					
				</thead>

				<tbody>
					
					@foreach ($ce as $ce)
						
						<tr>
						
							<td>{{ $ce->room_no }}</td>
							<td>{{ $ce->capacity }}</td>
							<td>{{ $ce->room_type }}</td>

							<td><a href="/add/ce/furniture/{{$ce->id}}" class="btn btn-primary">Add Furniture</a></td>
							<td><a href="/add/ce/instrument/{{$ce->id}}" class="btn btn-primary">Add Instrument</a></td>
							
<td>{!! Html::linkRoute('ce.edit', 'Update', array($ce->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['ce.destroy', $ce->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

