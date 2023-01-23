<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">
    {{--
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        --}}
    </script>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="modal fade" id="tabsModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tabsModalLabel">Add Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body wizard-content">
                        <form action="#" class="tab-wizard wizard-circle">
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="SurnameName5" class="form-label">Employer :</label>
                                            <input type="text" class="form-control" id="middleName5">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5" class="form-label">Post :</label>
                                            <input type="text" class="form-control" id="middleName5">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="middleName5" class="form-label">Duration :</label>
                                            <input type="text" class="form-control" id="middleName5">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-right">
                        <button class="btn btn-danger " data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Close</button>
                        <button type="button" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#rowAdder").click(function () {
                newRowAdd =
                '<div id="row"> 
                    <div class="col-md-6">' +
                        '<div class="input-group-prepend">' +
                            '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                                '<i class="bi bi-trash"></i> Delete
                            </button> 
                        </div>' +
                        '<label for="name" class="form-label">Name:</label>
                        '<input type="name" class="form-control">
                        '<label for="pst" class="form-label">Post:</label>
                        '<input type="pst" class="form-control">
                        '<label for="address" class="form-label">Address:</label>
                        '<input type="address" class="form-control">
                        '<label for="email" class="form-label">Email:</label>
                        '<input type="email" class="form-control">
                        '<label for="phone" class="form-label">Phone:</label>
                        '<input type="phone" class="form-control">
                    </div> 
                </div>';
    
                $('#newinput').append(newRowAdd);
            });
    
            $("body").on("click", "#DeleteRow", function () {
                $(this).parents("#row").remove();
            })
    </script>
</body>

</html>