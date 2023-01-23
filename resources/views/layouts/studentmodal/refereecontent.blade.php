@include('layouts.studentmodal.refereemodal')

<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target="#standardModal">
        Add Refree
    </button>
</div>
</p>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title" style="color: green">Referee</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi
                                        mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Referee Informations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            {{-- <h3 style="color: green">Course/Degree Details</h3> --}}
                            <div class="col-md-6 border-end"> <strong>Name</strong>
                                <br>
                                <p class="text-muted">Adebayo Nathaniel</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Post</strong>
                                <br>
                                <p class="text-muted">Nil</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 border-end">
                                <strong>Address</strong>
                                <br>
                                <p class="text-muted">N0 2, Oke-ilewo street</p>
                            </div>
                            <div class="col-md-6"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">nath@gmail.com</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 border-end">
                                <strong>Phone Number</strong>
                                <br>
                                <p class="text-muted">08148009197</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>