@extends('frontend.layouts.app')

@section('content')
    <div class="container-fluid mt--7">
        @include('inc.message')
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow container px-6 mx-auto">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">User Info</h3>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                {{-- <div class="row"> --}}
                                    <input type="text" class=" col-md-12 form-control" value="{{$user->name}}" placeholder="name" name="name">
                                    @error('name')
                                        <div class="alert alert-warning  col-md-12" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                {{-- </div> --}}
                              <br>
                                {{-- <div class="row"> --}}
                                    <input type="email" class="col-md-12 form-control" value="{{$user->email}} " placeholder="email@example.com" name="email">
                                    @error('email')
                                        <div class="alert alert-warning  col-md-12" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                {{-- </div> --}}
                              <br>
                              {{-- <div class="row"> --}}
                                <input type="password" class="col-md-12 form-control"  value="{{$user->password}}" name="password">
                                @error('password')
                                  <div class="alert alert-warning  col-md-12" role="alert">
                                      {{ $message }}
                                  </div>
                                @enderror
                              {{-- </div> --}}
                              <br>
                              {{-- <div class="row"> --}}
                                <input type="text" class=" col-md-12 form-control" value="{{$user->info->phone}}" name="phone">
                                @error('phone')
                                    <div class="alert alert-warning  col-md-12" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            {{-- </div> --}}
                          <br>
                                    {{-- <div class="row"> --}}
                                <input type="text" class=" col-md-12 form-control" value="{{$user->info->country}}" name="country">
                                @error('country')
                                    <div class="alert alert-warning  col-md-12" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            {{-- </div> --}}
                          <br>
                          {{-- <div class="row"> --}}
                                <input type="text" class=" col-md-12 form-control" value="{{$user->info->city}}" name="city">
                                @error('city')
                                    <div class="alert alert-warning  col-md-12" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            {{-- </div> --}}
                          <br>
                                    {{-- <div class="row"> --}}
                                <input type="text" class=" col-md-12 form-control" value="{{$user->info->address}}" name="address">
                                @error('address')
                                    <div class="alert alert-warning  col-md-12" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            {{-- </div> --}}
                          <br>
                          
                              </div>
                          </div>
                        </div>
                        <input class="btn btn-primary col-md-12" type="submit" value="Edit Your Info">
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
