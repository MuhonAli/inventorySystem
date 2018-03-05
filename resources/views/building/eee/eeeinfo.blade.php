

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">
  		@if(Session::has('roomaddeee'))
  
            
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('roomaddeee') }}
                </div>
            
 	   @endif


<a href="{{ route('eee.create') }}" class="btn btn-info btn-block">Add New Room</a>
			<table class="table">
				<br><br>
				<h4>Room Information in EEE Building</h4>
			
				<hr>
				<thead>
					
					<th>Room No</th>
					<th>Room capacity</th>
					<th>Room type</th>
					
					
					
				</thead>

				<tbody>
					
					@foreach ($eee as $eee)
						
						<tr>
						
							<td>{{ $eee->room_no }}</td>
							<td>{{ $eee->capacity }}</td>
							<td>{{ $eee->room_type }}</td>

							<td><a href="/add/eee/furniture/{{$eee->id}}" class="btn btn-primary">Add Furniture</a></td>
							<td><a href="/add/eee/instrument/{{$eee->id}}" class="btn btn-primary">Add Instrument</a></td>
							
<td>{!! Html::linkRoute('eee.edit', 'Update', array($eee->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['eee.destroy', $eee->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

