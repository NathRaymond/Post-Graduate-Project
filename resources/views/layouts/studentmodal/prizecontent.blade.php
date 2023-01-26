@include('layouts.studentmodal.prizemodal')
<div class="text-right">
    <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target="#fadeinModal">Add
        Prize</button>
</div>
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title" style="color: green">Prize</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi
                                        mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Prizes</li>
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
                            <div class="col-md-6">
                               <p><strong>Description</strong></p>
                                <p class="text-muted">Best in Compoter Science</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>