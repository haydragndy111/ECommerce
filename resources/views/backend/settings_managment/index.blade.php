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
                                <h3 class="mb-0">Settings List</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">tax</th>
                                    <th scope="col">Facebook URL</th>
                                    <th scope="col">Youtube URL</th>
                                    <th scope="col">Twitter URL</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $item)
                                
                                    <tr>
                                        <th scope="row">
                                            {{$item ->id}}
                                        </th>
                                        <td>
                                            {{$item ->tax}}
                                        </td>
                                        <td>
                                            {{$item ->facebook}}
                                        </td>
                                        <td>
                                            {{$item ->youtube}}
                                        </td>
                                        <td>
                                            {{$item ->twitter}}
                                        </td>
                                        <td>
                                            {{$item ->phone}}
                                        </td>
                                        <td>
                                            {{$item ->description}}
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

        @include('backend.layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush