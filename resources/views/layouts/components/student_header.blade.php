<header class="header navbar navbar-expand-sm">
    <ul class="navbar-item flex-row">
        <li class="nav-item theme-logo">
            <a href="#">
                <img src="{{ asset('profile_picture/logo.jpeg') }}" class="navbar-logo" alt="logo" style="width: 50px">
            </a>
        </li>
    </ul>

    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-list" style="color:green">
            <line x1="8" y1="6" x2="21" y2="6"></line>
            <line x1="8" y1="12" x2="21" y2="12"></line>
            <line x1="8" y1="18" x2="21" y2="18"></line>
            <line x1="3" y1="6" x2="3" y2="6"></line>
            <line x1="3" y1="12" x2="3" y2="12"></line>
            <line x1="3" y1="18" x2="3" y2="18"></line>
        </svg></a>

    <ul class="navbar-item flex-row search-ul">
        <li class="nav-item align-self-center search-animated">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search toggle-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <form class="form-inline search-full form-inline search" role="search">
                <div class="search-bar">
                    <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                </div>
            </form>
        </li>
    </ul>
    <ul class="navbar-item flex-row navbar-dropdown">
        <li class="nav-item dropdown language-dropdown more-dropdown">
            <div class="dropdown  custom-dropdown-icon">
                <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                <h5>{{ $applicant->applicantRefNo ?? '' }}</h5>
            </div>
        </li>

        <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('profile_picture/avartar.jpg') }}" alt="admin-profile" class="img-fluid">
            </a>
            <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                <div class="user-profile-section">
                    <div class="media mx-auto">
                        <a href="{{ asset('student_uploaded_document') }}/{{ $applicant->profile_picture ?? '' }}"><img src="{{ asset('student_uploaded_document') }}/{{ $applicant->profile_picture ?? '' }}" alt=""
                            style="width: 400px; height:100px; border: 1px solid grey; border-radius: 50%; margin: 10px;"></a>
                        {{-- <h3 class="my-3" style="color:green;">{{ Auth::user()->name }}</h3> --}}
                        <div class="media-body">
                            {{-- <p >{{ Auth::user()->name }}</p> --}}
                        </div>
                    </div>
                    {{-- <small><h5>{{$applicant->applicantRefNo}}</h5><small> --}}

                </div>
                <div class="dropdown-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg> <span><button type="button" data-toggle="modal" data-target="#zoomupModal"
                                style="border: none">
                                My Profile
                            </button>
                        </span>
                    </a>
                </div>
                <div class="dropdown-item">
                    <a href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg> <span>Log Out</span>
                    </a>
                </div>
            </div>
        </li>
    </ul>
</header>
