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
                                        <select class="form-control" id="fuel_code" name="fuel_code">
                                            <option selected value="">Select fuel code</option>
                                            <option
                                                value="E5"
                                            >
                                                E5
                                            </option>
                                            <option
                                                value="E10"
                                            >
                                                E10
                                            </option>
                                            <option
                                                value="B7"
                                            >
                                                B7
                                            </option>
                                            <option
                                                value="SDV"
                                            >
                                                SDV
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" id="fuel_name" name="fuel_name"
                                            aria-describedby="emailHelp" placeholder="Enter Fuel Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" id="fuel_price" name="fuel_price"
                                            aria-describedby="emailHelp" placeholder="Enter Fuel Price">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="fuel_unit" name="fuel_unit">
                                            <option
                                                selected
                                                value=""
                                            >
                                                Select Unit
                                            </option>
                                            <option
                                                value="Gallon"
                                            >
                                                Gallon
                                            </option>
                                            <option
                                                value="Liter"
                                            >
                                                Liter
                                            </option>
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

    <!-- Edit Fuel Modal -->
    <div class="modal fade" id="editFuelModal" tabindex="-1" role="dialog" aria-labelledby="editFuelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFuelModalLabel">Edit Fuel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form id="editFuelForm" method="POST" action="{{ route('update_fuel', ['id' => $fuelId->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_fuel_name">Fuel Name</label>
                            <input type="text" class="form-control" id="edit_fuel_name" name="edit_fuel_name">
                        </div>
                        <div class="form-group">
                            <label for="edit_fuel_price">Fuel Price</label>
                            <input type="text" class="form-control" id="edit_fuel_price" name="edit_fuel_price">
                        </div>
                        <div class="form-group">
                            <label for="edit_fuel_unit">Fuel Unit</label>
                            <select class="form-control" id="edit_fuel_unit" name="edit_fuel_unit">
                                <option value="Gallon">Gallon</option>
                                <option value="Liter">Liter</option>
                            </select>
                        </div>
                        <input type="hidden" id="edit_fuel_id" name="edit_fuel_id">
                    </form> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateFuel()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('script')
<script>
    function updateFuel() {
        var fuelId = $('#edit_fuel_id').val();
        var fuelName = $('#edit_fuel_name').val();
        var fuelPrice = $('#edit_fuel_price').val();
        var fuelUnit = $('#edit_fuel_unit').val();

        $.ajax({
            url: '/update_fuel/' + fuelId,
            type: 'PUT',
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            data: {
                fuel_name: fuelName,
                fuel_price: fuelPrice,
                fuel_unit: fuelUnit,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Update the data in the table row
                var row = $('#fuelDataTable tbody').find('tr[data-id="' + fuelId + '"]');
                row.find('td:eq(0)').text(fuelName);
                row.find('td:eq(1)').text(fuelPrice);
                row.find('td:eq(2)').text(fuelUnit);

                // Close the modal
                $('#editFuelModal').modal('hide');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        }
    $(document).ready(function() {
        $.ajax({
            url: "/get_fuel",
            type: 'GET',
            success: function(response) {
                var fuelData = response.fuelData;
                displayFuelData(fuelData);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    function displayFuelData(fuelData) {

        $('#fuelDataTable tbody').empty();


        $.each(fuelData, function(index, fuel) {
            var deleteButton = `<button id="${fuel.id}" class="btn btn-danger btn-sm delete-fuel" data-id="${fuel.id}">Delete</button>`;
            // var editButton = '<button class="btn btn-primary btn-sm edit-fuel" data-id="' + fuel.id + '" data-name="' + fuel.fuel_name + '" data-price="' + fuel.fuel_price + '" data-unit="' + fuel.fuel_unit + '" data-toggle="modal" data-target="#editFuelModal">Edit</button>';
            var editButton =
                '<button type="button" class="btn btn-primary edit-fuel" data-toggle="modal" data-id="' + fuel
                .id + '" data-name="' + fuel.fuel_name + '" data-price="' + fuel.fuel_price + '" data-unit="' +
                fuel.fuel_unit + '" data-target="#exampleModal">Edit</button>';
            $('#fuelDataTable tbody').append(
                '<tr>' +
                '<td>' + fuel.fuel_name + '</td>' +
                '<td>' + fuel.fuel_price + '</td>' +
                '<td>' + fuel.fuel_unit + '</td>' +
                //'<td>' + editButton + ' ' + deleteButton + '</td>' +
                '<td>' + deleteButton + '</td>' +
                '</tr>'
            );
        });
        // Bind click event to the edit button
        $('.edit-fuel').click(function() {
            var fuelId = $(this).data('id');
            var fuelName = $(this).data('name');
            var fuelPrice = $(this).data('price');
            var fuelUnit = $(this).data('unit');

            $('#edit_fuel_id').val(fuelId);
            $('#edit_fuel_name').val(fuelName);
            $('#edit_fuel_price').val(fuelPrice);
            $('#edit_fuel_unit').val(fuelUnit);
            $('#editFuelModal').modal('show');
        });

        // Bind click event to the delete button
        $('.delete-fuel').click(function() {
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
            success: function(response) {
                $(`#${fuelId}`).parent().parent().remove();
                toastr.success('Fuel deleted successfully.');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                toastr.error('Something went wrong');

            }
        });
    }
</script>
@endsection
