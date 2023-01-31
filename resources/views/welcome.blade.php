<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="themelocator">
    <meta name="description" content="">

    <title>ROCKDALOCOME | Real Estate.</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oxanium:200,300,400,500,600,700,800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">


    <!-- icons -->
    <link rel="icon" href="{{ asset('assets/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('assets/images/ico/apple-touch-icon-precomposed.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('assets/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('assets/images/ico/apple-touch-icon-72-precomposed.html') }}">
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ asset('assets/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <!-- icons -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Template Developed By themelocator -->
</head>

<body>
    <header class="tl-header header-style-1">
        <div class="tl-topbar">
            <div class="container">
                @include('layouts.components.loginheader')
            </div><!-- /.container -->
        </div><!-- /.tl-topbar -->

        <div class="tl-menu menu-absolute menu-sticky">
            @include('layouts.components.header')
        </div><!-- /.tl-menu -->
    </header><!-- /.tl-header -->

    <div class="lt-banner banner-style-1 bg-image"
        style="background-image: url({{ asset('assets/images/bg/banner-bg2.jpg') }});">
        <div id="home-slider" class="carousel slide home-slider banner-content" data-ride="carousel">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="banner-text">
                            <h1>Find Your</h1>
                            <h2>Dream Home for Living</h2>
                            <p>Did you need a residential apartments with
                                qualities features well conducive environment and all luxury of your choice..?
                                Your choice is all available at Rock Dalocome Properties (RDP).</p>
                            <p>Satisfaction, honestly and transparency is our model.</p>
                            <form action="#">
                                <div class="form-content">
                                    <div class="search-content">
                                        <input class="form-control" name="search" type="text"
                                            placeholder="Search here..">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>City</option>
                                            <option>Washington</option>
                                            <option>New Jersey</option>
                                            <option>Los angeles</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>State</option>
                                            <option>New York</option>
                                            <option>California</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                    <div class="button">
                                        <input type="submit" value="Search" class="btn btn-primary">
                                    </div>
                                </div><!-- /.row -->
                            </form>
                        </div>
                    </div><!-- /.container -->
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <div class="container">
                        <div class="banner-text">
                            <h1>Find Your</h1>
                            <h2>Golden value RockDalocome Properties</h2>
                            <p>We always strive to provide an exceptional commitment of excellence to all of our
                                clients. Whether you are seeking to purchase a luxury home of your own or sell a
                                distinctive property, we harness the power of our market knowledge, our networks,
                                marketing tools and accumulated experience to make sure we pair you with the right buyer
                                or seller that fully satisfies your individual needs.</p>
                            <form action="#">
                                <div class="form-content">
                                    <div class="search-content">
                                        <input class="form-control" name="search" type="text"
                                            placeholder="Search here..">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>City</option>
                                            <option>Washington</option>
                                            <option>New Jersey</option>
                                            <option>Los angeles</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>State</option>
                                            <option>New York</option>
                                            <option>California</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                    <div class="button">
                                        <input type="submit" value="Search" class="btn btn-primary">
                                    </div>
                                </div><!-- /.row -->
                            </form>
                        </div>
                    </div><!-- /.container -->
                </div><!-- /.carousel-item -->
            </div>
            <a class="carousel-control-prev" href="#home-slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#home-slider" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div><!-- /.home-slider -->
        <div class="mouse-inner-area text-center">
            <div class="container">
                <div class="mouse-inner">
                    <div class="thumb">
                        <img src="{{ asset('assets/images/others/mouse-thumb.png') }}" alt="Image" class="img-fluid">
                        <a href="#about" class="mouse-icon">
                            <span class="wheel"></span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </div>
                </div><!-- /.mouse-inner -->
            </div><!-- /.mouse-inner-area -->
        </div><!-- /.mouse-inner-area -->
    </div><!-- /.lt-banner -->

    <div class="lt-section" id="about">
        <div class="section-content about-content section-padding">
            <div class="about-thumb">
                <img src="{{ asset('assets/images/about/about.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-thumb-content">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/about/about-thumb1.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="thumb thumb-2">
                                <img src="{{ asset('assets/images/about/about-thumb2.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="lt-video">
                                <a href="https://www.youtube.com/watch?v=AI3pORAXU4g"><span class="icon"><i
                                            class="fa fa-play" aria-hidden="true"></i></span>Watch Video</a>
                            </div>
                        </div><!-- /.about-thumb-content -->
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="lt-about">
                            <div class="section-title">
                                <span>We have 10 Years of</span>
                                <h1>Exprience in <span>Real-Estate</span> Business</h1>
                                <p style="text-align: justify;">We have been in business for over 10 years, for clients
                                    in diaspora you can trust us
                                    to deliver well finished homes.
                                    RockDalocome has helped enhance commercial real estate market. With our integrated
                                    service lines of brokerage, property management, construction and investments, our
                                    team of professionals deliver start-to-finish results to our tenants, owners and
                                    investors.</p>
                            </div>
                            <a href="{{ route('about') }}" class="btn btn-primary radius">Read More</a>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content section-padding bg-color">
            <div class="container">
                <div class="title-center">
                    <div class="section-title">
                        <h1>Recently Added</h1>
                        <div class="paragraph">
                            This <b id="demo"></b>, we are offering special discounts on selected properties. Take
                            advantage of
                            this offer today.
                        </div>
                    </div>
                </div><!-- /.title-center -->

                <div class="property-slider arrow-style-1">
                    <div class="property style-1">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/property/10.jpg') }}" alt="Image"
                                class="img-fluid">
                            <div class="overlay">
                                <div class="property-status">
                                    <a href="#">For Rent</a>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="{{ asset('assets/images/property/10.jpg') }}"
                                                class="lt-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="property-info">
                            <div class="info-top">
                                <h2><a href="{{ route('property-details') }}">Modern Duplex House</a></h2>
                                <div class="d-flex map-location justify-content-between">
                                    <div class="left-content">
                                        <span class="map-icon"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i></span>
                                        <span>8514 W. Pennington St</span>
                                    </div>
                                </div>
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Badroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                    alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-footer d-flex justify-content-between">
                                <div class="price align-self-center">
                                    <h3>$4,500/m</h3>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="#"><i class="fa fa-recycle" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div><!-- /.author -->
                            </div><!-- /.property-footer -->
                        </div><!-- /.property-info -->
                    </div><!-- /.property -->

                    <div class="property style-1">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/property/11.jpg') }}" alt="Image"
                                class="img-fluid">
                            <div class="overlay">
                                <div class="property-status">
                                    <a href="#">For Sale</a>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="{{ asset('assets/images/property/11.jpg') }}"
                                                class="lt-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="property-info">
                            <div class="info-top">
                                <h2><a href="{{ route('property-details') }}">Villa on Grand Avenue</a></h2>
                                <div class="d-flex map-location justify-content-between">
                                    <div class="left-content">
                                        <span class="map-icon"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i></span>
                                        <span>8514 W. Pennington St</span>
                                    </div>
                                </div>
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Badroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                    alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-footer d-flex justify-content-between">
                                <div class="price align-self-center">
                                    <h3>$4,500/m</h3>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="#"><i class="fa fa-recycle" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div><!-- /.author -->
                            </div><!-- /.property-footer -->
                        </div><!-- /.property-info -->
                    </div><!-- /.property -->

                    <div class="property style-1">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/property/12.jpg') }}" alt="Image"
                                class="img-fluid">
                            <div class="overlay">
                                <div class="property-status">
                                    <a href="#">For Rent</a>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="{{ asset('assets/images/property/12.jpg') }}"
                                                class="lt-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="property-info">
                            <div class="info-top">
                                <h2><a href="{{ route('property-details') }}">Maple Penthouse</a></h2>
                                <div class="d-flex map-location justify-content-between">
                                    <div class="left-content">
                                        <span class="map-icon"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i></span>
                                        <span>8514 W. Pennington St</span>
                                    </div>
                                </div>
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Badroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                    alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-footer d-flex justify-content-between">
                                <div class="price align-self-center">
                                    <h3>$4,500/m</h3>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="#"><i class="fa fa-recycle" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div><!-- /.author -->
                            </div><!-- /.property-footer -->
                        </div><!-- /.property-info -->
                    </div><!-- /.property -->

                    <div class="property style-1">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/property/13.jpg') }}" alt="Image"
                                class="img-fluid">
                            <div class="overlay">
                                <div class="property-status">
                                    <a href="#">For Rent</a>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="{{ asset('assets/images/property/13.jpg') }}"
                                                class="lt-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="property-info">
                            <div class="info-top">
                                <h2><a href="{{ route('property-details') }}">Maple Penthouse</a></h2>
                                <div class="d-flex map-location justify-content-between">
                                    <div class="left-content">
                                        <span class="map-icon"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i></span>
                                        <span>8514 W. Pennington St</span>
                                    </div>
                                </div>
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Badroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                    alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                        <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                    alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-footer d-flex justify-content-between">
                                <div class="price align-self-center">
                                    <h3>$4,500/m</h3>
                                </div>
                                <div class="icons">
                                    <ul class="global-list">
                                        <li><a href="#"><i class="fa fa-recycle" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div><!-- /.author -->
                            </div><!-- /.property-footer -->
                        </div><!-- /.property-info -->
                    </div><!-- /.property -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content section-padding">
            <div class="container">
                <div class="title-center">
                    <div class="section-title">
                        <h1>Properties</h1>
                        <div class="paragraph">
                            <p>We are committed to building strong, sustainable, proactive and long term relationships
                                with both corporate and private clients. We strive to deliver the best results and
                                maximum satisfaction.</p>
                        </div>
                    </div>
                </div><!-- /.title-center -->
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="property style-1">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/property/10.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="property-status">
                                        <a href="#">For Rent</a>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="property-info">
                                <div class="info-top">
                                    <h2><a href="#">Modern Duplex House</a></h2>
                                    <div class="d-flex map-location justify-content-between">
                                        <div class="left-content">
                                            <span class="map-icon"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i></span>
                                            <span>8514 W. Pennington St</span>
                                        </div>
                                    </div>
                                    <div class="meta">
                                        <ul class="global-list">
                                            <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Badroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                        alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-footer d-flex justify-content-between">
                                    <div class="price align-self-center">
                                        <h3>$4,500/m</h3>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="#"><i class="fa fa-recycle"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div><!-- /.author -->
                                </div><!-- /.property-footer -->
                            </div><!-- /.property-info -->
                        </div><!-- /.property -->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="property style-1">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/property/11.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="property-status">
                                        <a href="#">For Sale</a>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="property-info">
                                <div class="info-top">
                                    <h2><a href="#">Villa on Grand Avenue</a></h2>
                                    <div class="d-flex map-location justify-content-between">
                                        <div class="left-content">
                                            <span class="map-icon"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i></span>
                                            <span>8514 W. Pennington St</span>
                                        </div>
                                    </div>
                                    <div class="meta">
                                        <ul class="global-list">
                                            <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Badroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                        alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-footer d-flex justify-content-between">
                                    <div class="price align-self-center">
                                        <h3>$4,500/m</h3>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="#"><i class="fa fa-recycle"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div><!-- /.author -->
                                </div><!-- /.property-footer -->
                            </div><!-- /.property-info -->
                        </div><!-- /.property -->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="property style-1">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/property/12.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="property-status">
                                        <a href="#">For Rent</a>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="property-info">
                                <div class="info-top">
                                    <h2><a href="#">Maple Penthouse</a></h2>
                                    <div class="d-flex map-location justify-content-between">
                                        <div class="left-content">
                                            <span class="map-icon"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i></span>
                                            <span>8514 W. Pennington St</span>
                                        </div>
                                    </div>
                                    <div class="meta">
                                        <ul class="global-list">
                                            <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Badroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                        alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-footer d-flex justify-content-between">
                                    <div class="price align-self-center">
                                        <h3>$4,500/m</h3>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="#"><i class="fa fa-recycle"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div><!-- /.author -->
                                </div><!-- /.property-footer -->
                            </div><!-- /.property-info -->
                        </div><!-- /.property -->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="property style-1">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/property/13.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="property-status">
                                        <a href="#">For Rent</a>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="property-info">
                                <div class="info-top">
                                    <h2><a href="#">Villa on Grand Avenue </a></h2>
                                    <div class="d-flex map-location justify-content-between">
                                        <div class="left-content">
                                            <span class="map-icon"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i></span>
                                            <span>8514 W. Pennington St</span>
                                        </div>
                                    </div>
                                    <div class="meta">
                                        <ul class="global-list">
                                            <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Badroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                        alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-footer d-flex justify-content-between">
                                    <div class="price align-self-center">
                                        <h3>$4,500/m</h3>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="#"><i class="fa fa-recycle"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div><!-- /.author -->
                                </div><!-- /.property-footer -->
                            </div><!-- /.property-info -->
                        </div><!-- /.property -->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="property style-1">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/property/14.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="property-status">
                                        <a href="#">For Rent</a>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="property-info">
                                <div class="info-top">
                                    <h2><a href="#">Mikan Lounge</a></h2>
                                    <div class="d-flex map-location justify-content-between">
                                        <div class="left-content">
                                            <span class="map-icon"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i></span>
                                            <span>8514 W. Pennington St</span>
                                        </div>
                                    </div>
                                    <div class="meta">
                                        <ul class="global-list">
                                            <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Badroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                        alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-footer d-flex justify-content-between">
                                    <div class="price align-self-center">
                                        <h3>$4,500/m</h3>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="#"><i class="fa fa-recycle"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div><!-- /.author -->
                                </div><!-- /.property-footer -->
                            </div><!-- /.property-info -->
                        </div><!-- /.property -->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="property style-1">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/property/15.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="property-status">
                                        <a href="#">For Rent</a>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="property-info">
                                <div class="info-top">
                                    <h2><a href="#">Maple Penthouse</a></h2>
                                    <div class="d-flex map-location justify-content-between">
                                        <div class="left-content">
                                            <span class="map-icon"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i></span>
                                            <span>8514 W. Pennington St</span>
                                        </div>
                                    </div>
                                    <div class="meta">
                                        <ul class="global-list">
                                            <li><span><img src="{{ asset('assets/images/others/icon7.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Badroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon8.png') }}"
                                                        alt="Image" class="img-fluid"></span>6 Bathroom</li>
                                            <li><span><img src="{{ asset('assets/images/others/icon9.png') }}"
                                                        alt="Image" class="img-fluid"></span>6000 Sf.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-footer d-flex justify-content-between">
                                    <div class="price align-self-center">
                                        <h3>$4,500/m</h3>
                                    </div>
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="#"><i class="fa fa-recycle"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div><!-- /.author -->
                                </div><!-- /.property-footer -->
                            </div><!-- /.property-info -->
                        </div><!-- /.property -->
                    </div>
                </div><!-- /.row -->
                <div class="button mt-4 text-center">
                    <a href="{{ route('property') }}" class="btn btn-primary">View More</a>
                </div>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content section-padding text-center bg-image section-before"
            style="background-image: url({{ asset('assets/images/bg/cta.jpg') }});">
            <div class="container">
                <div class="cta-content">
                    <span>Buy and Sell Your Property with</span>
                    <h1>RockDalocome Real Estate Comapany</h1>
                    <div class="buttons">
                        <a href="#" class="btn btn-transparent">Browes Property</a>
                        <a href="{{ route('property-submit') }}" class="btn btn-primary">Submit Property</a>
                    </div>
                </div><!-- feature-content -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content lt-get-a-quote section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="quote-info">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/others/quote-thumb.jpg') }}" alt="Quote Image"
                                    class="img-fluid">
                            </div>
                            <div class="quote-text">
                                <h2>Start Your First Business With Us!</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="quote-form">
                            <h1>Message Us</h1>
                            <p>We will be glad to get feedback from our client.</p>
                            <span class="border"></span>
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name*">
                                    <input type="email" class="form-control" placeholder="Email*">
                                    <input type="text" class="form-control" placeholder="Subject*">
                                    <textarea name="message" class="form-control" placeholder="Message*" cols="30" rows="10"></textarea>
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content section-padding bg-color">
            <div class="container-fluid">
                <div class="title-center">
                    <div class="section-title">
                        <h1>Our Projects</h1>
                        <div class="paragraph">
                            <p>Affordable Housing
                                For Everyone
                                Real Estate Professionalism at its peak</p>
                        </div>
                    </div>
                </div><!-- /.title-center -->
                <div class="project-content">
                    <div class="project-slider">
                        <div class="project">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/project/1.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                </div>
                                <h2><a href="{{ route('property-details') }}">Melina Corporate</a></h2>
                                <span>Abeokuta</span>
                            </div><!-- /.project-info -->
                        </div><!-- /.project -->
                        <div class="project">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/project/2.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                </div>
                                <h2><a href="#">Globally World</a></h2>
                                <span>Poland</span>
                            </div><!-- /.project-info -->
                        </div><!-- /.project -->

                        <div class="project">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/project/3.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                </div>
                                <h2><a href="{{ route('property-details') }}">Dramatically Parallel</a></h2>
                                <span>Germany</span>
                            </div><!-- /.project-info -->
                        </div><!-- /.project -->
                        <div class="project">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/project/4.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                </div>
                                <h2><a href="#">Professionally Matrix </a></h2>
                                <span>Japan</span>
                            </div><!-- /.project-info -->
                        </div><!-- /.project -->

                        <div class="project">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/project/5.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                </div>
                                <h2><a href="{{ route('property-details') }}">Holisticly Cultivate</a></h2>
                                <span>China</span>
                            </div><!-- /.project-info -->
                        </div><!-- /.project -->

                        <div class="project">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/project/3.jpg') }}" alt="Image"
                                    class="img-fluid">
                                <div class="overlay">
                                    <div class="icons">
                                        <ul class="global-list">
                                            <li><a href="{{ route('property-details') }}"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="{{ asset('assets/images/property/1.jpg') }}"
                                                    class="lt-popup"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="project-info">
                                <div class="meta">
                                    <ul class="global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                </div>
                                <h2><a href="{{ route('property-details') }}">Holisticly Cultivate</a></h2>
                                <span>China</span>
                            </div><!-- /.project-info -->
                        </div><!-- /.project -->
                    </div>
                </div><!-- /.project-content -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content city-content section-padding">
            <div class="container">
                <div class="title-center">
                    <div class="section-title">
                        <h1>Top Cities</h1>
                        <div class="paragraph">
                            <p>our choice is all available at Rock Dalocome Properties (RDP).
                                Location of your choice, Features and qualities  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="city style-one">
                            <div class="city-thumb">
                                <img src="{{ asset('assets/images/city/5.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="text">
                                <h2>Lagos</h2>
                                <span>15 Properties</span>
                            </div>
                            <div class="city-overlay">
                                <div class="city-overlay-inner">
                                    <ul class="meta global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                    <h3><a href="{{ route('property-details') }}">Synergistically parallel task
                                            user-centric
                                            experiences.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="city style-one">
                            <div class="city-thumb">
                                <img src="{{ asset('assets/images/city/6.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="text">
                                <h2>Ibadan</h2>
                                <span>15 Properties</span>
                            </div>
                            <div class="city-overlay">
                                <div class="city-overlay-inner">
                                    <ul class="meta global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                    <h3><a href="{{ route('property-details') }}">Synergistically parallel task
                                            user-centric
                                            experiences.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="city style-one">
                            <div class="city-thumb">
                                <img src="{{ asset('assets/images/city/7.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="text">
                                <h2>Osun</h2>
                                <span>15 Properties</span>
                            </div>
                            <div class="city-overlay">
                                <div class="city-overlay-inner">
                                    <ul class="meta global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                    <h3><a href="{{ route('property-details') }}">Synergistically parallel task
                                            user-centric
                                            experiences.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="city style-one">
                            <div class="city-thumb">
                                <img src="{{ asset('assets/images/city/8.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="text">
                                <h2>New York</h2>
                                <span>15 Properties</span>
                            </div>
                            <div class="city-overlay">
                                <div class="city-overlay-inner">
                                    <ul class="meta global-list">
                                        <li><a href="#">Market</a></li>
                                    </ul>
                                    <h3><a href="{{ route('property-details') }}">Synergistically parallel task
                                            user-centric
                                            experiences.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
                <div class="button text-center">
                    <a href="{{ route('property') }}" class="btn btn-primary">View More</a>
                </div>
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content section-padding lt-testimonial bg-image"
            style="background-image: url({{ asset('assets/images/bg/testimonial-1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="faq-accordion" id="faq-accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">Why you choose us?</button>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#faq-accordion">
                                    <div class="card-body">
                                        <b>Trusted By Thousands</b>
                                        <p>We take pride in our topnotch services, and trusted by tousand of clients.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">Wide Range of properties</button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#faq-accordion">
                                    <div class="card-body">
                                        <p>Browse our wide range of properties from difffernt locations and various
                                            prices.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">Finacing Made Easy</button>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#faq-accordion">
                                    <div class="card-body">
                                        <p>With our range of properties, we have affordable housing for everyone.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapsefour" aria-expanded="false"
                                        aria-controls="collapsefour">
                                        Have interest in any of our Service</button>
                                </div>
                                <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                    data-parent="#faq-accordion">
                                    <div class="card-body">
                                        <p>We major in providing smart and affordable housing and profitable investment
                                            opportunities to our teaming clients.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.faq-accordion -->
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="testimonial-content testimonial-style-1 text-center">
                            <div class="testimonial-nav-slider">
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="{{ asset('assets/images/testimonial/ceo.jpeg') }}"
                                            alt="Image" class="img-fluid">
                                    </div>
                                </div><!-- /testimonial-author -->
                            </div><!-- testimonial-nav-slider -->

                            <div class="testimonial-slider">
                                <div class="testimonial">
                                    <h2>Adegbite Damilola Daniel</h2>
                                    <span class="client-role">CEO</span>
                                    <p>Satisfaction, honesty, and transparency is our model.</p>
                                    <div class="quote-icon"><img
                                            src="{{ asset('assets/images/testimonial/quote1.png') }}" alt="Image"
                                            class="img-fluid"></div>
                                </div>
                            </div><!-- testimonial-slider -->
                        </div><!-- testimonial-content -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    <div class="lt-section">
        <div class="section-content section-padding text-center bg-image section-before"
            style="background-image: url({{ asset('assets/images/bg/featured-bg-1.jpg') }});">
            <div class="container">
                <div class="feature-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature style-one">
                                <div class="feature-icon">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                                <h2>Find Homes First (Location)</h2>
                                <p>Our properties are located at prime areas which guarantees return on investment. .
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature style-one">
                                <div class="feature-icon">
                                    <i class="fa fa-bolt" aria-hidden="true"></i>
                                </div>
                                <h2>Trusted</h2>
                                <p>We have been in business for over 10 years, for clients in diaspora you can trust us
                                    to deliver well finished homes.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature style-one">
                                <div class="feature-icon">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                </div>
                                <h2>Affordability</h2>
                                <p>Our homes are very affordable, we have something for both the high & middle class
                                    earners with flexible payment plans.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- feature-content -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->

    {{--  <div class="lt-section">
        <div class="section-content lt-blog section-padding bg-color">
            <div class="container">
                <div class="title-center">
                    <div class="section-title">
                        <h1>Latest Blog</h1>
                        <div class="paragraph">
                            <p>Dramatically harness real-time portals whereas distinctive services. Conveniently seize
                                standardized best practices.</p>
                        </div>
                    </div>
                </div><!-- /.title-center -->
                <div class="blog-slider arrow-style-1">
                    <div class="tl-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="#"><img src="{{ asset('assets/images/blog/4.jpg') }}"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="entry-content">
                            <div class="entry-meta">
                                <ul class="global-list">
                                    <li><a href="#"><span class="mr-1 fa fa-clock-o"></span> 22 May 2020</a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="entry-title"><a href="#">Dramatically leverage</a></h2>
                            <p>Credibly incentivize diverse manufactured products through transparent.</p>
                            <a class="read-more" href="#">View More <span
                                    class="fa fa-arrow-right"></span></a>
                        </div>
                    </div><!-- /.tl-post  -->
                    <div class="tl-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="#"><img src="{{ asset('assets/images/blog/5.jpg') }}"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="entry-content">
                            <div class="entry-meta">
                                <ul class="global-list">
                                    <li><a href="#"><span class="mr-1 fa fa-clock-o"></span> 22 May 2020</a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="entry-title"><a href="#">Distinctively embrace</a></h2>
                            <p>Credibly incentivize diverse manufactured products through transparent.</p>
                            <a class="read-more" href="#">View More <span
                                    class="fa fa-arrow-right"></span></a>
                        </div>
                    </div><!-- /.tl-post  -->
                    <div class="tl-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="#"><img src="{{ asset('assets/images/blog/6.jpg') }}"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="entry-content">
                            <div class="entry-meta">
                                <ul class="global-list">
                                    <li><a href="#"><span class="mr-1 fa fa-clock-o"></span> 22 May 2020</a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="entry-title"><a href="#">Proactively orchestrate</a></h2>
                            <p>Credibly incentivize diverse manufactured products through transparent.</p>
                            <a class="read-more" href="#">View More <span
                                    class="fa fa-arrow-right"></span></a>
                        </div>
                    </div><!-- /.tl-post  -->
                    <div class="tl-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail">
                                <a href="#"><img src="{{ asset('assets/images/blog/1.jpg') }}"
                                        alt="Image" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="entry-content">
                            <div class="entry-meta">
                                <ul class="global-list">
                                    <li><a href="#"><span class="mr-1 fa fa-clock-o"></span> 22 May 2020</a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="entry-title"><a href="#">Collaboratively iterate</a></h2>
                            <p>Credibly incentivize diverse manufactured products through transparent.</p>
                            <a class="read-more" href="#">View More <span
                                    class="fa fa-arrow-right"></span></a>
                        </div>
                    </div><!-- /.tl-post  -->
                </div><!-- /.blog-slider -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->  --}}

    {{--  <div class="lt-section">
        <div class="section-content section-padding text-center">
            <div class="container">
                <div class="tl-brand">
                    <div class="brand-slider arrow-style-1">
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/1.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/2.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/3.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/4.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/1.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/2.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/3.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                        <div class="brand">
                            <img src="{{ asset('assets/images/brand/4.png') }}" alt="Brand Image"
                                class="img-fluid">
                        </div>
                    </div><!-- /.brand-slider -->
                </div><!-- /.tl-brand -->
            </div><!-- /.container -->
        </div><!-- /.section-content -->
    </div><!-- /.lt-section -->  --}}
    @include('layouts.components.footer')

    <!-- JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
            "November", "December"
        ];

        const d = new Date();
        let name = month[d.getMonth()];
        document.getElementById("demo").innerHTML = name;
    </script>
</body>

</html>
