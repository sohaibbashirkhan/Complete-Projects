@extends('layouts.homelayout')

@section('content')
<!-- Header Banner -->
<section class="banner-header middle-height section-padding bg-img" data-overlay-dark="6" data-background="{{asset('webasset/img/slider/4.jpg')}}">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6>Book Your Transport</h6>
                    <h1>Choose Your Service</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabs -->
<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="register-tab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register Vehicle</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="book-tab" data-bs-toggle="tab" href="#book" role="tab" aria-controls="book" aria-selected="false">Book Ride</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
            <!-- Register Vehicle Form -->
            <div class="mt-4">
                <h5>Register Your Vehicle</h5>
                <form method="post" action="{{ route('vehicle.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="driver_name">Driver Name</label>
                        <input type="text" name="driver_name" id="driver_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="photo_driver">Photo</label>
                        <input type="file" name="photo_driver" id="photo_driver" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type</label>
                        <input type="text" name="vehicle_type" id="vehicle_type" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="vehicle_model">Vehicle Model</label>
                        <input type="text" name="vehicle_model" id="vehicle_model" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="license_plate">License Plate</label>
                        <input type="text" name="license_plate" id="license_plate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" name="color" id="color" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register Vehicle</button>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
            <!-- Book Ride Form -->
            <div class="mt-4">
                <h5>Book Your Ride</h5>
                <form method="post" action="{{ route('bookings.store') }}">
                @csrf
                 <!-- Success Message -->
                 @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                    <div class="form-group">
                        <label for="pickupLocation">Customer Name </label>
                        <input type="text" name="customer_Name" id="Customer_Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pickupLocation">Pick-Up Location</label>
                        <input type="text" name="pickup_location" id="pickupLocation" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dropoffLocation">Drop-Off Location</label>
                        <input type="text" name="dropoff_location" id="dropoffLocation" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pickupDate">Pick-Up Date</label>
                        <input type="date" name="pickup_date" id="pickupDate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pickupTime">Pick-Up Time</label>
                        <input type="time" name="pickup_time" id="pickupTime" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                                    <input name="submit" type="submit" value="Ride Now">
                                </div>                </form>
            </div>
        </div>
    </div>
</div>

@endsection
