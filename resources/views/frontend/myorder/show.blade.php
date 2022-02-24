@extends('frontend.layouts.app')

@section('content')
    {{-- @include('backend.layouts.headers.cards') --}}
    <div class="container-fluid mt--7">
        @include('inc.message')
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow container px-6 mx-auto">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Orders List</h3>
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
                                    <th scope="col">Source</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Ordered at</th>
                                    <th scope="col" class="cen">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <th scope="row">
                                            {{$item->id}}
                                        </th>
                                        <td>
                                            {{$item->total}}
                                        </td>
                                        <td>
                                            {{$item->currency}}
                                        </td>
                                        <td>
                                            {{$item->source}}
                                        </td>
                                        <td>
                                            {{$item->status}}
                                        </td>
                                        <td>
                                            {{$item->description}}
                                        </td>
                                        <td>
                                            {{$item->created_at}}
                                        </td>
                                        <td>
                                            <div class="form-group row hit">
                                                <a class="btn btn-primary col" href="{{route('myorder.showDetail',$item->id)}}">View Order</a>
                                            </div>
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
                        .cen{
                            text-align: center;
                        }
                        .hit{
                            justify-content: center;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush