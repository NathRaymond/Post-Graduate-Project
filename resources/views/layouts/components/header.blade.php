<nav class="navbar navbar-expand-lg p-0">
    <div class="container">
        <a class="navbar-brand" href="index1.html">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('property') }}">Properties</a></li>
                {{--  <li class="tl-dropdown">
                    <a href="#">Pages</a>
                    <ul class="tl-dropdown-menu">
                        <li><a href="{{ route('team') }}">Agents</a></li>
                        <li><a href="{{ route('agent-details') }}">Agent Details</a></li>
                        <li><a href="{{ route('property-submit') }}">Property Submit</a></li>
                        <li><a href="{{ route('property-details') }}">Property Details</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                    </ul>
                </li>  --}}
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="right-content">
            <div class="lt-button">
                <a href="{{ route('property-submit') }}" class="btn btn-transparent">Submit Property</a>
            </div>
        </div>
    </div><!-- /.container -->
</nav><!-- /.navbar -->