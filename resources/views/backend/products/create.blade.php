@extends('backend.layouts.app')

@section('content')
    {{-- @include('backend.layouts.headers.cards') --}}
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7 ">
        <div class="row mt-5 ">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Add New Product</h3>
                                <form method="POST" action="{{route('products.store')}} " enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            {{-- <div class="row"> --}}
                                                <input type="text" class=" col-md-12 form-control" placeholder="name" name="name">
                                                @error('name')
                                                    <div class="alert alert-warning  col-md-12" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            {{-- </div> --}}
                                          <br>
                                            {{-- <div class="row"> --}}
                                                <input type="text" class="col-md-12 form-control" placeholder="details" name="detail">
                                                @error('detail')
                                                    <div class="alert alert-warning  col-md-12" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            {{-- </div> --}}
                                          <br>
                                          {{-- <div class="row"> --}}
                                            <input type="text" class="col-md-12 form-control" placeholder="price" name="price">
                                            @error('price')
                                              <div class="alert alert-warning  col-md-12" role="alert">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                          {{-- </div> --}}
                                          <br>
                                          {{-- <div class="row"> --}}
                                            <input type="file" class="col-md-12 form-control btn btn-primary" name="image">
                                            @error('image')
                                              <div class="alert alert-warning col-md-12" role="alert">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <input class="btn btn-primary col-md-12" type="submit" value="Create Product">
                                  </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         --}}
        @include('backend.layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
