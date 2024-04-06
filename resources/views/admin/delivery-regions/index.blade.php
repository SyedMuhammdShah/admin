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
                <h1 class="h3 mb-4 text-gray-800">Delivery Regions</h1>

                <div class="row">

                    <div class="col-lg-4">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-6">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Add Region</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.delivery-regions.store')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input
                                            class="form-control form-control-user"
                                            name="region"
                                            aria-describedby="emailHelp"
                                            placeholder="Enter Region Name"
                                            required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input
                                            class="form-control form-control-user"
                                            name="one_off_fee"
                                            aria-describedby="emailHelp"
                                            placeholder="8.99"
                                            type="text"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            class="form-control form-control-user"
                                            name="region_tax"
                                            aria-describedby="emailHelp"
                                            placeholder="Enter Tax"
                                            type="number"
                                            required>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8">

                        <div class="card shadow mb-6">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Region Lists</h6>
                            </div>
                            <div class="card-body">
                                <table class="table" id="fuelDataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Region Name</th>
                                        <th>Region One of Fee</th>
                                        <th>Region Tax</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($delivery_regions as $region)
                                        <tr>
                                            <td>{{$region->id}}</td>
                                            <td>{{$region->region}}</td>
                                            <td>{{$region->one_off_fee}}</td>
                                            <td>{{$region->region_tax}}</td>
                                            <td>
                                                <form method="post" action="{{route('admin.delivery-regions.destroy',['delivery_region' => $region->id])}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input onclick="return confirm('Are you sure you want to delete this region?')" type="submit" class="btn btn-sm btn-danger" value="Delete" />
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
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

@endsection
