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
                                    <th scope="col">Total</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Source</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Address</th>
                                    <th scope="col" class="cen">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                
                                    <tr>
                                        <th scope="row">
                                            {{$item ->id}}
                                        </th>
                                        <td>
                                            {{$item ->total}}
                                        </td>
                                        <td>
                                            {{$item ->currency}}
                                        </td>
                                        <td>
                                            {{$item ->source}}
                                        </td>
                                        <td>
                                            {{$item ->status}}
                                        </td>
                                        <td>
                                            {{$item ->phone}}
                                        </td>
                                        <td>
                                            {{$item ->country}}
                                        </td>
                                        <td>
                                            {{$item ->city}}
                                        </td>
                                        <td>
                                            {{$item ->address}}
                                        </td>
                                        <td>
                                            <div class="form-group row hit">
                                                <a class="btn btn-primary col" href="{{route('orderProdcuts.show',$item->id)}}">View Order</a>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <a class="btn btn-primary col" href="{{route('users.edit',$item->id)}}">Edit</a>
                                                <form class="col" action="{{ route('users.destroy', $item->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <br>
                                                    <button class="btn btn-danger col">Delete User</button>
                                                </form>
                                            </div> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                        <div class="" id="page">
                            {{$orders->links()}}
                        </div>
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

        @include('backend.layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush