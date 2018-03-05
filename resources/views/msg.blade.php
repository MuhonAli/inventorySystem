
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
								{{-- 
								@if($msg == 'approved')
									<h1>Your Book for Bus Number {{  $bus_number }} has been approved.</h1>
								@else
									<h1>Your Book for Bus Number {{  $bus_number }} number has been pending.</h1>
								@endif
								--}}

								@php
									use Carbon\Carbon;
								@endphp

								@if (count($bus) > 0)
									@foreach ($bus as $data)
										@if ($data->status == 1)
											<h1 style="background:  #343a40; text-align: center; border-radius: 4%; padding: 10px 0px; color: white; font-size: 26px;">Your Book for Bus Number {{  $data->bus_number }} on {{ Carbon::parse($data->date)->format('d M Y') }} has been  approved </h1>
										@else
											<h1 style="background:  #BDE5F8; text-align: center; border-radius: 4%; padding: 10px 0px; color: black; font-size: 26px;">Your Book for Bus Number {{  $data->bus_number }} on {{ Carbon::parse($data->date)->format('d M Y') }} has been Pending. </h1>

										@endif
										<br>
									@endforeach	
								@endif

								@if (count($room) > 0)
									@foreach ($room as $data)
										@if ($data->status == 1)
											<h1 style="background:  #343a40; text-align: center; border-radius: 4%; padding: 10px 0px; color: white; font-size: 26px;">Your Book for Room Number {{  $data->room_number }} on {{ Carbon::parse($data->date)->format('d M Y') }} has been  approved </h1>
										@else
											<h1 style="background:  #BDE5F8; text-align: center; border-radius: 4%; padding: 10px 0px; color: black; font-size: 26px;">Your Book for Room Number {{  $data->room_number }} on {{ Carbon::parse($data->date)->format('d M Y') }} has been Pending. </h1>

										@endif
										<br>
									@endforeach	
								@endif

									
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection

	
	

