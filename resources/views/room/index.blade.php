
@extends('layouts.layout')

@section('content')

<section id="courseArchive">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="courseArchive_sidebar">

					<div class="single_sidebar">	
						<br>
						<div class="single_sidebar">	

							<h2>Room Booking <span class="fa fa-angle-double-right"></span></h2>  	

							<br>

							{!! Form::open(['url' => 'roomsearch']) !!}

							{{ csrf_field() }}

							<div class="col-md-6">
								{!! Form::label('Start', 'Start'); !!}
								{{ Form::date('sdate', null, array('class' => 'form-control', 'required' => '')) }}<br>
							</div>

							<div class="col-md-6">
								{!! Form::label('End', 'End'); !!}
								{{ Form::date('edate', null, array('class' => 'form-control', 'required' => '')) }}<br>
							</div>

							<style type="text/css">
							.button{text-align: center;}
							#submit {font-size: 20px; font-weight: bold; padding: 10px 10px}
						</style>
						<div class="button">
							{{ Form::submit('submit', array('class' => 'btn btn-success')) }}
						</div>

						{!! Form::close() !!}











					</div>
				</div>

			</div>
		</div>
	</section>


	@endsection

	
	

