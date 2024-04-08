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
                <h1 class="h3 mb-4 text-gray-800">Delivery Requests</h1>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="card shadow mb-6" >
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Requests List</h6>
                            </div>
                            <div class="card-body" style="overflow-x: scroll">
                                <table class="table table-striped table-bordered table-responsive" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Collection Address</th>
                                        <th>Delivery Address</th>
                                        <th>One off fee</th>
                                        <th>Total miles</th>
                                        <th>Delivery Region</th>
                                        <th>Vehicle</th>
                                        <th>Fuel Type</th>
                                        <th>Delivery Weight</th>
                                        <th>No of Items</th>
                                        <th>Region Tax</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($delivery_requests as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td> {{$data->collection_address}} </td>
                                            <td> {{$data->delivery_address}} </td>
                                            <td> {{$data->one_off_fee}} </td>
                                            <td> {{$data->total_miles}} </td>
                                            <td> {{$data->delivery_region}} </td>
                                            <td> {{$data->vehicle}} </td>
                                            <td> {{$data->fuel}} </td>
                                            <td> {{$data->delivery_weight}} </td>
                                            <td> {{$data->no_of_items}} </td>
                                            <td>  {{ empty($data->region_tax) ? "-" : $data->region_tax."%"  }} </td>
                                            <td> {{$data->no_of_items}} </td>
                                            <td>{{$data->customer_name}}</td>
                                            <td>{{$data->customer_email}}</td>
                                            <td>{{$data->customer_phone}}</td>
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

@section('script')
    <script>
        $(function(){


            @if(session()->has('success'))
            toastr.success( "{{session('success') }}");
            @elseif(session()->has('error'))
            toastr.error( "{{ session('error') }}");
            @endif

        });
    </script>
@endsection
