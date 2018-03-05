@extends('layouts.layout')



@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
           
           
            <form action="#" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" class="form-control" required name="name">
                        </div>

                        <div class="form-group">
                            <label for="name">Your Address</label>
                            <input type="text" id="name" class="form-control" required name="name">
                        </div>

                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Your Mobile No</label>
                            <input type="text" id="address" class="form-control" required name="address">
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Confirm Bus Number</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    
              
                <button type="submit" class="btn btn-info btn-block">Book Now</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="#"></script>
    <script type="text/javascript" src="#"></script>
@endsection