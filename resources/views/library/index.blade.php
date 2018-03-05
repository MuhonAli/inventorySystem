

@extends('layouts.layout')

@section('content')

      <section id="courseArchive">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="courseArchive_sidebar">

 <div class="single_sidebar">	
 	 <h2>Book List <span class="fa fa-angle-double-right"></span></h2>


<form class= "container" action="/librarysearch" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search Book"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
              	               

<div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-md-offset-2">
  	
   		
			<table class="table">
				<br><br>
				<thead>
					<th>Book Id</th>
					<th>Book Name</th>
					<th>Quantity</th>
					<th>Author</th>
					<th>Book Category</th>
					
					
					
				</thead>

				<tbody>
					
					@foreach ($library as $library)
						
						<tr>
							<th>{{ $library->id }}</th>
							<td>{{ $library->book_name }}</td>
							<td>{{ $library->quantity }}</td>
							<td>{{ $library->author }}</td>
							<td>{{ $library->category }}</td>


					@endforeach

					
					

				</tbody>
			</table>
		</div>



              </div>
              <!-- End single sidebar -->

</div>
            </div>
          </div>
          <!-- start course archive sidebar -->
</div>
</div>
</section>

				
@endsection

	
	

