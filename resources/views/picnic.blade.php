@extends('layouts.homelayout')

@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('webasset/img/slider/3.jpg') }}">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Next Ride</h6>
                    <h1>Picnic Transport <span>Booking </span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabs -->
<!-- Booking Form -->
<section class="contact section-padding">
    <div class="container">
        <div class="row">
            <!-- Form -->
            <div class="col-lg-12 col-md-12 mb-30">
                <div class="form-box">
                <form method="POST" action="{{ route('picnics.store') }}">
                @csrf
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="section-title text-center">PICNIC <span>BOOKING</span></div>

                            <!-- Personal Information -->
                            <div class="col-md-6 form-group">
                                <input name="name" type="text" placeholder="Your Name *" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input name="email" type="email" placeholder="Your Email *" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input name="phone" type="text" placeholder="Your Phone Number *" required>
                            </div>

                            <!-- Picnic Details -->
                            <div class="col-md-6 form-group">
                                <input name="picnic_location" type="text" placeholder="Picnic Location *" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input name="picnic_date" type="date" placeholder="Picnic Date *" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input name="number_of_guests" type="number" placeholder="Number of Guests *" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input name="start_time" type="time" placeholder="Start Time *" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input name="end_time" type="time" placeholder="End Time *" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <select name="service_type" required>
                                    <option value="" disabled selected>Type of Service *</option>
                                    <option value="standard">Standard</option>
                                    <option value="luxury">Luxury</option>
                                </select>
                            </div>

                            <!-- Additional Comments -->
                            <div class="col-md-12 form-group">
                                <textarea name="comments" id="comments" cols="30" rows="4" placeholder="Additional Comments"></textarea>
                            </div>

                            <!-- Submit Button -->
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
