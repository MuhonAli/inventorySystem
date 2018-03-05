

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">
@if(Session::has('roomaddad'))
  
            
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('roomaddad') }}
                </div>
            
 	   @endif

<a href="{{ route('ad.create') }}" class="btn btn-info btn-block">Add New Room</a>
			<table class="table">
				<br><br>
				<h4>Room Information in Administration Building</h4>
			
				<hr>
				<thead>
					
					<th>Room No</th>
					<th>Room capacity</th>
					<th>Room type</th>
					
					
					
				</thead>

				<tbody>
					
					@foreach ($ad as $ad)
						
						<tr>
						
							<td>{{ $ad->room_no }}</td>
							<td>{{ $ad->capacity }}</td>
							<td>{{ $ad->room_type }}</td>
							
<td>{!! Html::linkRoute('ad.edit', 'Update', array($ad->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['ad.destroy', $ad->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

