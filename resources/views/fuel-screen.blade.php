@extends('layouts.user_type.auth')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">FUEL</h1>

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-6">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Fuel</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="/add_fuel">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="fuel_name" name="fuel_name" aria-describedby="emailHelp"
                                                placeholder="Enter Fuel Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="fuel_price" name="fuel_price" aria-describedby="emailHelp"
                                                placeholder="Enter Fuel Price">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="fuel_unit" name="fuel_unit">
                                                <option class="form-control" id="fuel_unit" name="fuel_unit" value="Gallon">Gallon</option>
                                                <option class="form-control" id="fuel_unit" name="fuel_unit" value="Liter">Liter</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card shadow mb-6">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Fuel List</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="fuelDataTable">
                                        <thead>
                                            <tr>
                                                <th>Fuel Name</th>
                                                <th>Fuel Price</th>
                                                <th>Fuel Unit</th>
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


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
$(document).ready(function () {
    $.ajax({
        url: "/get_fuel",
        type: 'GET',
        success: function (response) {
            var fuelData = response.fuelData;
            displayFuelData(fuelData);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

function displayFuelData(fuelData) {

    $('#fuelDataTable tbody').empty();

   
    $.each(fuelData, function (index, fuel) {
        var deleteButton = '<button class="btn btn-danger btn-sm delete-fuel" data-id="' + fuel.id + '">Delete</button>';
        $('#fuelDataTable tbody').append(
            '<tr>' +
            '<td>' + fuel.fuel_name + '</td>' +
            '<td>' + fuel.fuel_price + '</td>' +
            '<td>' + fuel.fuel_unit + '</td>' +
            '<td>' + deleteButton + '</td>' +
            '</tr>'
        );
    });
      // Bind click event to the delete button
      $('.delete-fuel').click(function () {
        var fuelId = $(this).data('id');
        deleteFuel(fuelId);
    });
}
function deleteFuel(fuelId) {
    $.ajax({
        url: '/delete_fuel/' + fuelId,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },
        success: function (response) {
            $('#fuelDataTable tbody').find('tr[data-id="' + fuelId + '"]').remove();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            
        }
    });
}
</script>
    @endsection