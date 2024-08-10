@extends('layouts.homelayout')

@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('webasset/img/slider/3.jpg') }}">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Next Ride</h6>
                    <h1>Rent <span>Cars</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Blog Section -->
    <section class="blog2 section-padding">
        <div class="container">
            <div class="row">
                @if($vehicles->isEmpty())
                    <p>No vehicles found for the given criteria.</p>
                @else
                    @foreach ($vehicles as $vehicle)
                        <div class="col-lg-4 col-md-6 mb-45">
                            <div class="item">
                                <!-- Display the vehicle's image -->
                                <img src="{{ asset('storage/vehicles/' . $vehicle->image) }}" class="img-fluid" alt="{{ $vehicle->name }}">
                                <div class="bottom-fade"></div>
                                <div class="title">
                                    <h6>{{ $vehicle->name }}</h6>
                                    <h4>{{ $vehicle->vehicle_type }}</h4>
                                </div>
                                <div class="curv-butn icon-bg">
                                    <a href="post.html" class="vid">
                                        <div class="icon">
                                            <i class="icon-show"><span>{{ $vehicle->name }}<br><i>{{ $vehicle->city }}</i></span></i>
                                            <i class="ti-arrow-top-right icon-hidden"></i>
                                        </div>
                                    </a>
                                    <div class="br-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                            <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="br-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                            <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Pagination -->
            <!-- <div class="row">
                <div class="col-md-12 mt-15 text-center">
                    <ul class="pagination-wrap">
                        <li><a href="blog2.html#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="blog2.html#">1</a></li>
                        <li><a href="blog2.html#" class="active">2</a></li>
                        <li><a href="blog2.html#">3</a></li>
                        <li><a href="blog2.html#"><i class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div> -->
        </div>
    </section>

@endsection
