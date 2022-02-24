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
                                <h3 class="mb-0">Add New Settings</h3>
                                <form method="POST" action="{{route('settings.store')}}">
                                    @csrf
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            {{-- <div class="row"> --}}
                                                <input type="number" class=" col-md-12 form-control" value="{{$setting ? $setting->tax : 'no'}}" placeholder="tax" name="tax">
                                                @error('tax')
                                                    <div class="alert alert-warning  col-md-12" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            {{-- </div> --}}
                                          <br>
                                            {{-- <div class="row"> --}}
                                                <input type="text" class="col-md-12 form-control" value="{{$setting ? $setting->facebook : 'no'}}" placeholder="Facebook URL" name="facebook">
                                                @error('facebook')
                                                    <div class="alert alert-warning  col-md-12" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            {{-- </div> --}}
                                          <br>
                                          {{-- <div class="row"> --}}
                                            <input type="text" class="col-md-12 form-control" value="{{$setting ? $setting->youtube : 'no'}}" placeholder="youtube URL" name="youtube">
                                            @error('youtube')
                                              <div class="alert alert-warning  col-md-12" role="alert">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                          {{-- </div> --}}
                                          <br>
                                          {{-- <div class="row"> --}}
                                            <input type="text" class="col-md-12 form-control" value="{{$setting ? $setting->twitter : 'no'}}" placeholder="Twitter URL" name="twitter">
                                            @error('tweitter')
                                              <div class="alert alert-warning col-md-12" role="alert">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                          {{-- </div> --}}
                                          <br>
                                          {{-- <div class="row"> --}}
                                            <input type="text" class="col-md-12 form-control" value="{{$setting ? $setting->phone : 'no'}}" placeholder="phone" name="phone">
                                            @error('phone')
                                              <div class="alert alert-warning col-md-12" role="alert">
                                                  {{ $message }}
                                              </div>
                                            @enderror
                                            <br>
                                            {{-- <div class="row"> --}}
                                            <input type="text" class="col-md-12 form-control" value="{{$setting ? $setting->description : 'no'}}" placeholder="description" name="description">
                                            @error('description')
                                                <div class="alert alert-warning col-md-12" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                          </div>
                                      </div>
                                    </div>
                                    <input class="btn btn-default col-md-12" type="submit" value="Add Settings">
                                  </form>
                            </div>
                        </div>
                    </div>
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