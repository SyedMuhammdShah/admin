@extends('layouts.user_type.auth')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
<meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Vehicles</h1>

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-6">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Vehicles</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="/add_vehicles">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="vehicle_name" name="vehicle_name" aria-describedby="emailHelp"
                                                placeholder="Enter Vehicle Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="vehicle_mileage" name="vehicle_mileage" aria-describedby="emailHelp"
                                                placeholder="Enter Vehicle Mileage">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" id="submitBtn">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card shadow mb-6">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Vehicles List</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="fuelDataTable">
                                        <thead>
                                            <tr>
                                                <th>Vehicle Name</th>
                                                <th>Vehicle Mileage</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table rows will be dynamically generated here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
        </div>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


$(document).ready(function () {
    $.ajax({
        url: "/getVehicleData",
        type: 'GET',
        success: function (response) {
            var VehicleData = response.VehicleData;
            displayFuelData(VehicleData);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

function displayFuelData(VehicleData) {

    $('#fuelDataTable tbody').empty();


    $.each(VehicleData, function (index, fuel) {
        var deleteButton = '<button class="btn btn-danger btn-sm delete-fuel" data-id="' + fuel.id + '">Delete</button>';
        // var editButton = '<button class="btn btn-primary btn-sm edit-fuel" data-id="' + fuel.id + '" data-name="' + fuel.fuel_name + '" data-price="' + fuel.fuel_price + '" data-unit="' + fuel.fuel_unit + '" data-toggle="modal" data-target="#editFuelModal">Edit</button>';
        $('#fuelDataTable tbody').append(
            '<tr>' +
            '<td>' + fuel.vehicle_name + '</td>' +
            '<td>' + fuel.vehicle_mileage + '</td>' +
           // '<td>' + editButton + ' ' + deleteButton + '</td>' +
            '<td>' + deleteButton + '</td>' +
            '</tr>'
        );
    });
      // Bind click event to the delete button
      $('.delete-fuel').click(function () {
        var fuelId = $(this).data('id');
        deletevehicle(fuelId);
    });
}

function deletevehicle(fuelId) {
    $.ajax({
        url: '/delete_vehicle/' + fuelId,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            fetchVehicleData();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);

        }
    });
}
</script>
    @endsection
