@extends('frontend.layouts.app')

@section('content')
    {{-- @include('backend.layouts.headers.cards') --}}
    <div class="container-fluid mt--7">
        @include('inc.message')
        {{-- Order Info --}}
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow container px-6 mx-auto">
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
    </div>
@endsection
