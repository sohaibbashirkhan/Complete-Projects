@extends('layouts.homelayout')

@section('content')

    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('webasset/img/slider/3.jpg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Next Ride</h6>
                        <h1>About <span>Us</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .modal-dialog {
            max-width: 80%; /* Adjust width as needed */
        }
        .modal-body {
            padding: 0;
        }
        .modal-title {
            color: white;
            text-align: center;
            margin: 0;
            width: 100%;
        }
    </style>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2>Search for Rental Cars</h2>
        <form action="{{ route('search') }}" method="GET">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="car_type">Car Type:</label>
                        <input type="text" class="form-control" id="car_type" name="car_type" placeholder="Enter car type">
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <input name="submit" type="submit" value="Search Location" class="btn btn-primary">
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Search for Rental Cars</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                    <form action="{{ route('rental-search.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="car_type">Car Type:</label>
                <input type="text" class="form-control" id="car_type" name="car_type" placeholder="Enter car type">
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <input name="submit" type="submit" value="Search Location" class="btn btn-primary">
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('searchModal'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>

    <!-- Blog Section -->
    <section class="blog2 section-padding">
        <div class="container">
            <div class="row">
                <!-- Blog Items -->
                @foreach([
                    ['img/blog/3.jpg', 'Rental', 'Documents required for car rental'],
                    ['img/blog/4.jpg', 'Sport Cars', 'Rental cost of sport and other cars'],
                    ['img/blog/5.jpg', 'Fines', 'Rental cars how to check driving fines?'],
                    ['img/blog/6.jpg', 'Airport', 'How to Rent a Car at the Airport Terminal?'],
                    ['img/blog/7.jpg', 'Rules', 'Penalties for violating the rules in rental cars'],
                    ['img/blog/8.jpg', 'Rental Car', 'How to check a car before renting?']
                ] as $blog)
                    <div class="col-lg-4 col-md-6 mb-45">
                        <div class="item">
                            <img src="{{ asset('webasset/' . $blog[0]) }}" class="img-fluid" alt="">
                            <div class="bottom-fade"></div>
                            <div class="title">
                                <h6>{{ $blog[0] }}</h6>
                                <h4>{{ $blog[2] }}</h4>
                            </div>
                            <div class="curv-butn icon-bg">
                                <a href="post.html" class="vid">
                                    <div class="icon">
                                        <i class="icon-show">
                                            <span>29<br><i>Apr</i></span>
                                        </i>
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
            </div>
            <!-- Pagination -->
            <div class="row">
                <div class="col-md-12 mt-15 text-center">
                    <ul class="pagination-wrap">
                        <li><a href="blog2.html#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="blog2.html#">1</a></li>
                        <li><a href="blog2.html#" class="active">2</a></li>
                        <li><a href="blog2.html#">3</a></li>
                        <li><a href="blog2.html#"><i class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Lets Talk -->
    <section class="lets-talk bg-img bg-fixed section-padding" data-overlay-dark="5" data-background="{{ asset('webasset/img/slider/3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6>Rent Your Car</h6>
                    <h5>Interested in Renting?</h5>
                    <p>Don't hesitate and send us a message.</p>
                    <a href="tel:+8001234567" class="button-1 mt-15 mb-15 mr-10"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#0" class="button-2 mt-15 mb-15">Rent Now <span class="ti-arrow-top-right"></span></a>
                </div>
            </div>
        </div>
    </section>

@endsection
