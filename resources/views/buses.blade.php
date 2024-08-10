@extends('layouts.homelayout')

@section('content')

    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('webasset/img/slider/3.jpg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Next Ride</h6>
                        <h1>Picnic & School <span>Bus </span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Form -->
    <section class="contact section-padding">
        <div class="container">
            <div class="row">
                <!-- Form -->
                <div class="col-lg-12 col-md-12 mb-30">
                    <div class="form-box">
                        <form method="POST" action="{{ route('buses.store') }}">
                            @csrf
                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="section-title text-center">BUS  <span>BOOKING</span></div>

                                <div class="col-md-6 form-group">
                                    <input name="name" type="text" placeholder="Your Name *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="email" type="email" placeholder="Your Email *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="phone" type="text" placeholder="Your Number *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input id="pickup_location" name="pickup_location" type="date" placeholder="Pick-Up Location *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input id="dropoff_location" name="dropoff_location" type="date" placeholder="Drop-Off Location *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="pickup_date" type="date" placeholder="Pick-Up Date *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="dropoff_date" type="date" placeholder="Drop-Off Date *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="dropoff_date" type="date" placeholder="Drop-Off Date *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <select name="service_type" required>
                                        <option value="" disabled selected>Type of Service *</option>
                                        <option value="daily">Daily</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>

                                <div class="col-md-12 form-group">
                                    <textarea name="comments" id="comments" cols="30" rows="4" placeholder="Additional Comments"></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <input name="submit" type="submit" value="Book Now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection
