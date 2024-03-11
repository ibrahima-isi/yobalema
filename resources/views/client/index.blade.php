@extends('layouts.client.base')

@section('title', "Home")

@section('content')

    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 overlay" style="background-image: url({{ asset('clients/images/hero_1.jpg') }})">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="feature-car-rent-box-1">
                            <h3>Range Rover S7</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <span>Vehicules Disponibles</span>
                                    <span class="spec">{{ $vehicules_count }}</span>
                                </li>
                            </ul>
                            <div class="p-3 d-flex align-items-center bg-light">
                                <span>Louer un vehicule pour 500F ttc/Km</span>
                                <a href="#form-location" class="ml-auto btn btn-primary">Commencer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-0 pb-0 site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Debut forulaire de location -->
                    <form id="form-location" class="trip-form needs-validation"
                          action="{{ route('admin.location.store') }}"
                     novalidate method="POST" >
                     @csrf
                        <div class="mb-4 row align-items-center">
                            <div class="col-md-6">
                                <h3 class="m-0">Begin your trip here</h3>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <span class="text-primary">{{ $vehicules_count }}</span> <span>cars available</span>
                            </div>
                        </div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="row">
                            @include('shared.select', ['name' => 'vehicule_id', 'label'=>'Catégorie',
                            'class' => 'col-md-2', 'value' => old('vehicule_id'), 'options' => $categories])

                            @include('shared.input', ['type'=>'datetime-local', 'name' => 'heure_depart',
                                'label' => 'Heure de départ', 'class' => 'col-md-2', 'value' => old('heure_depart')])

                            @include('shared.input', ['type' => 'date', 'name' => 'date_location',
                                'label' => 'Date de location', 'class' => 'col-md-2', 'value' => old('date_location')])

                            <script>
                                document.getElementById('date_location').min = new Date().toISOString().split('T')[0];
                            </script>

                            @include('shared.input', ['name' => 'lieu_depart', 'label' => 'Lieu de Départ',
                                      'class' => 'col-md-3', 'value' => old('lieu_depart')])

                            @include('shared.input', ['name' => 'lieu_destination', 'label' => 'Lieu de Destination',
                                      'class' => 'col-md-3', 'value' => old('lieu_destination')])
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="submit" value="Louer un véhicule" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h3>Our Offer</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Iure nesciunt nemo vel earum maxime neque!</p>
                    <p>
                        <a href="#" class="btn btn-primary custom-prev">Previous</a>
                        <span class="mx-2">/</span>
                        <a href="#" class="btn btn-primary custom-next">Next</a>
                    </p>
                </div>
                <div class="col-lg-9">

                    <div class="nonloop-block-13 owl-carousel">
                        <div class="item-1">
                            <a href="#"><img src="{{ asset('clients/images/img_1.jpg') }}" alt="Image"
                                             class="img-fluid"></a>
                            <div class="item-1-contents">
                                <div class="text-center">
                                    <h3><a href="#">Range Rover S64 Coupe</a></h3>
                                    <div class="rating">
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                    </div>
                                    <div class="rent-price"><span>$250/</span>day</div>
                                </div>
                                <ul class="specs">
                                    <li>
                                        <span>Doors</span>
                                        <span class="spec">4</span>
                                    </li>
                                    <li>
                                        <span>Seats</span>
                                        <span class="spec">5</span>
                                    </li>
                                    <li>
                                        <span>Transmission</span>
                                        <span class="spec">Automatic</span>
                                    </li>
                                    <li>
                                        <span>Minium age</span>
                                        <span class="spec">18 years</span>
                                    </li>
                                </ul>
                                <div class="d-flex action">
                                    <a href="contact.html" class="btn btn-primary">Rent Now</a>
                                </div>
                            </div>
                        </div>


                        <div class="item-1">
                            <a href="#"><img src="{{ asset('clients/images/img_2.jpg') }}" alt="Image"
                                             class="img-fluid"></a>
                            <div class="item-1-contents">
                                <div class="text-center">
                                    <h3><a href="#">Range Rover S64 Coupe</a></h3>
                                    <div class="rating">
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                    </div>
                                    <div class="rent-price"><span>$250/</span>day</div>
                                </div>
                                <ul class="specs">
                                    <li>
                                        <span>Doors</span>
                                        <span class="spec">4</span>
                                    </li>
                                    <li>
                                        <span>Seats</span>
                                        <span class="spec">5</span>
                                    </li>
                                    <li>
                                        <span>Transmission</span>
                                        <span class="spec">Automatic</span>
                                    </li>
                                    <li>
                                        <span>Minium age</span>
                                        <span class="spec">18 years</span>
                                    </li>
                                </ul>
                                <div class="d-flex action">
                                    <a href="contact.html" class="btn btn-primary">Rent Now</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section section-3" style="background-image: url({{ asset('clients/images/hero_2.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="mb-5 text-center col-12">
                    <h2 class="text-white">Our services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
                        <div class="service-1-contents">
                            <h3>Repair</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
                        <div class="service-1-contents">
                            <h3>Car Accessories</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
                        <div class="service-1-contents">
                            <h3>Own a Car</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mb-5 site-section">
        <div class="text-center row justify-content-center">
            <div class="mb-5 text-center col-7">
                <h2>How it works</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda,
                    dolorum necessitatibus eius earum voluptates sed!
                </p>
            </div>
        </div>
        <div class="how-it-works d-flex">
            <div class="step">
                <span class="number"><span>01</span></span>
                <span class="caption">Time &amp; Place</span>
            </div>
            <div class="step">
                <span class="number"><span>02</span></span>
                <span class="caption">Car</span>
            </div>
            <div class="step">
                <span class="number"><span>03</span></span>
                <span class="caption">Details</span>
            </div>
            <div class="step">
                <span class="number"><span>04</span></span>
                <span class="caption">Checkout</span>
            </div>
            <div class="step">
                <span class="number"><span>05</span></span>
                <span class="caption">Done</span>
            </div>

        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="mb-5 text-center row justify-content-center">
                <div class="mb-5 text-center col-7">
                    <h2>Customer Testimony</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda,
                        dolorum necessitatibus eius earum voluptates sed!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="mb-4 col-lg-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem,
                                deserunt eveniet veniam. Ipsam, nam, voluptatum "
                            </p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{ asset('clients/images/person_1.jpg') }}" alt="Image" class="mr-3 img-fluid">
                            <span>Mike Fisher</span>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>"Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam,
                                voluptatum"
                            </p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{ asset('clients/images/person_2.jpg') }}" alt="Image" class="mr-3 img-fluid">
                            <span>Jean Stanley</span>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-4 mb-lg-0">
                    <div class="testimonial-2">
                        <blockquote class="mb-4">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem,
                                deserunt eveniet veniam. Ipsam, nam, voluptatum"
                            </p>
                        </blockquote>
                        <div class="d-flex v-card align-items-center">
                            <img src="{{ asset('clients/images/person_3.jpg' )}}" alt="Image" class="mr-3 img-fluid">
                            <span>Katie Rose</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white site-section">
        <div class="container">
            <div class="mb-5 text-center row justify-content-center">
                <div class="mb-5 text-center col-7">
                    <h2>Our Blog</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda,
                        dolorum necessitatibus eius earum voluptates sed!
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="mb-4 col-lg-4 col-md-6">
                    <div class="post-entry-1 h-100">
                        <a href="single.html">
                            <img src="{{ asset('clients/images/post_1.jpg') }}" alt="Image"
                                 class="img-fluid">
                        </a>
                        <div class="post-entry-1-contents">

                            <h2><a href="single.html">The best car rent in the entire planet</a></h2>
                            <span class="mb-3 meta d-inline-block">July 17, 2019 <span class="mx-2">by</span>
                                <a href="#">Admin</a></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta,
                                dolore harum molestias consectetur.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-4 col-md-6">
                    <div class="post-entry-1 h-100">
                        <a href="single.html">
                            <img src="{{ asset('clients/images/img_2.jpg') }}" alt="Image"
                                 class="img-fluid">
                        </a>
                        <div class="post-entry-1-contents">

                            <h2><a href="single.html">The best car rent in the entire planet</a></h2>
                            <span class="mb-3 meta d-inline-block">July 17, 2019 <span class="mx-2">by</span>
                                <a href="#">Admin</a></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta,
                                dolore harum molestias consectetur.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mb-4 col-lg-4 col-md-6">
                    <div class="post-entry-1 h-100">
                        <a href="single.html">
                            <img src="{{ asset('clients/images/img_3.jpg') }}" alt="Image"
                                 class="img-fluid">
                        </a>
                        <div class="post-entry-1-contents">

                            <h2><a href="single.html">The best car rent in the entire planet</a></h2>
                            <span class="mb-3 meta d-inline-block">July 17, 2024, <span class="mx-2">by</span>
                                <a href="#">Admin</a></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta,
                                dolore harum molestias consectetur.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="map" style="height: 400px;"></div>

    <script>
        function initMap() {
            // Coordonnées pour centrer la carte
            var myLatLng = {lat: -34.397, lng: 150.644};

            // Créer une carte avec la clé API
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 8
            });

            // Ajouter un marqueur
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
        }
    </script>

@endsection
