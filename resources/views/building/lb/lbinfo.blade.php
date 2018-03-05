

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">

@if(Session::has('roomaddlb'))
  
            
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('roomaddlb') }}
                </div>
            
 	   @endif
<a href="{{ route('lb.create') }}" class="btn btn-info btn-block">Add New Room</a>
			<table class="table">
				<br><br>
				<h4>Room Information in Library Building</h4>
			
				<hr>
				<thead>
					
					<th>Room No</th>
					<th>Room capacity</th>
					<th>Room type</th>
					
					
					
				</thead>

				<tbody>
					
					@foreach ($lb as $lb)
						
						<tr>
						
							<td>{{ $lb->room_no }}</td>
							<td>{{ $lb->capacity }}</td>
							<td>{{ $lb->room_type }}</td>
							
<td>{!! Html::linkRoute('lb.edit', 'Update', array($lb->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['lb.destroy', $lb->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

