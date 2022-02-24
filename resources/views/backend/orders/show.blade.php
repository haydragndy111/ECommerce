@extends('backend.layouts.app')

@section('content')
    {{-- @include('backend.layouts.headers.cards') --}}
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        @include('inc.message')
        {{-- Order Info --}}
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Order Info</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Ordered at</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th scope="row">
                                            {{$order->id}}
                                        </th>
                                        <td>
                                            {{$order->total}}
                                        </td>
                                        <td>
                                            {{$order->tax}}
                                        </td>
                                        <td>
                                            {{$order->currency}}
                                        </td>
                                        <td>
                                            {{$order->status}}
                                        </td>
                                        <td>
                                            {{$order->description}}
                                        </td>
                                        <td>
                                            {{$order->created_at}}
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card shadow">
                    <div class="row ">
                        <div class="col-8">
                        <strong> <label>Status</label> </strong>
                        
                            <select id="status" class="form-control">
                                <option value="Paid">Paid</option>
                                <option value="packaged">packaged</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                        </div>
                        <input type="text" id="order_id" value="{{ $order->id }}" hidden>
                        <div class="col-4">
                            <button class="btn btn-default ml15" id="change" style="margin-top:39px; ">Change</button>
                        </div>
                        <div class="col-12" id="res"></div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        {{-- User Info --}}
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">User Info</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <th scope="row">
                                            {{$order->id}}
                                        </th>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$order->phone}}
                                        </td>
                                        <td>
                                            {{$order->country}}
                                        </td>
                                        <td>
                                            {{$order->city}}
                                        </td>
                                        <td>
                                            {{$order->address}}
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Products List --}}
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Products List</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderProducts as $item)
                                    <tr>
                                        <th scope="row">
                                            {{$item->id}}
                                        </th>
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td>
                                            {{$item->detail}}
                                        </td>
                                        <td>
                                            {{$item->price}}
                                        </td>
                                        <td>
                                            {{$item->quantity}}
                                        </td>
                                        <td>
                                            <img style="width: 100px" src="{{ $item->image }}">
                                        </td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                    <style>
                        #page{
                            width: 100%;
                            display: flex;
                            justify-content: center;
                        }
                    </style>
                </div>
            </div>
        </div>

        @include('backend.layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        $('#change').on('click', function() {
            var status = $('#status').val();
            var order_id = $('#order_id').val();

            // we are not using api, we are using the session 
            // but we are nt using form to take the token of the session
            // so we are adding data to the request in the header
            // ajax is the middleman between the frontend and the backend, it is like the form but in jquery
            // so laravel is getting using jquery we got the meta in app and take the content of the csrf token

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('api_fun') }}",
                data: {
                    status: status,
                    order_id: order_id
                },
                success: function(response) {
                    $('#res').html(response.res)
                }
            });
        })
    </script>
@endpush
