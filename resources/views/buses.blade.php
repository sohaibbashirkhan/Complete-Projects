@extends('layouts.homelayout')

@section('content')

    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('webasset/img/slider/3.jpg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Next Ride</h6>
                        <h1>Drive <span>Us</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Process -->
    <section class="process section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-subtitle">Steps</div>
                    <div class="section-title white">Car Rental <span>Process</span></div>
                </div>
            </div>
            <div class="row">
                <!-- Process steps here -->
            </div>
        </div>
    </section>

    <!-- Booking Form -->
    <section class="contact section">
        <div class="container">
            <div class="row">
                <!-- Form -->
                <div class="col-lg-6 col-md-12 mb-30">
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
                                <div class="section-title">Bus Booking <span>Form</span></div>

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
                                    <input id="pickup_location" name="pickup_location" type="text" placeholder="Pick-Up Location *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input id="dropoff_location" name="dropoff_location" type="text" placeholder="Drop-Off Location *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="pickup_date" type="date" placeholder="Pick-Up Date *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="dropoff_date" type="date" placeholder="Drop-Off Date *" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <select name="service_type" required>
                                        <option value="" disabled selected>Type of Service *</option>
                                        <option value="daily">Daily</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>

                                <div class="col-md-12 form-group">
                                    <textarea name="comments" id="comments" cols="30" rows="4" placeholder="Additional Comments"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <input name="submit" type="submit" value="Book Now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-6 col-md-12">
                    <div class="info-box">
                        <h5>Contact Information</h5>
                        <ul>
                            <li><span class="ti-location-pin"></span> 123 Street, City, Country</li>
                            <li><span class="ti-mobile"></span> (123) 456-7890</li>
                            <li><span class="ti-email"></span> example@domain.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
