

@extends('layouts.adminlayout')

@section('content')


<div class="row">
  <div class="col-md-9">


<a href="{{ route('library.create') }}" class="btn btn-info btn-block">libraryd New Room</a>
			<table class="table">
				<br><br>
				<h4>Available Books</h4>
			
				<hr>
				<thelibrary>
					
					<th>Book No</th>
					<th>Book Name</th>
					<th>Quantity</th>
					<th>Author</th>
					<th>Category</th>
					
					
					
				</thelibrary>

				<tbody>
					
					@foreach ($library as $library)
						
						<tr>
						
							<td>{{ $library->id }}</td>
							<td>{{ $library->book_name }}</td>
							<td>{{ $library->quantity }}</td>
							<td>{{ $library->author }}</td>
							<td>{{ $library->category }}</td>
							
<td>{!! Html::linkRoute('library.edit', 'Update', array($library->id), array('class' => 'btn btn-info btn-block')) !!}</td>					


<td>{!! Form::open(['route' => ['library.destroy', $library->id], 'method' => 'DELETE']) !!}</td>


<td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}</td>


{!! Form::close() !!}		
							
							
					
					@endforeach

					
					

				</tbody>
			</table>
		</div>
	</div>

</div>
				
@endsection

	
	

