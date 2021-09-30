@extends('admin/layout')
@section('content_ad')
    <div class="container-fluid">
        <section id="content-types">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Your Profile</h4>
                </div>
            </div>
            <div class="row match-height">

                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Profile information</h4>
                                <h6 class="card-subtitle text-muted">Your infomation below here !</h6>
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                        {{ Session::forget('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form class="form" method="POST" action="{{ url('/admin/profile/update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <input type="hidden" name="userID" value="{{ $data->id }}">
                                        <div class="form-group">
                                            <label for="donationinput1"  class="col-form-label">Your Name</label>
                                            <input type="text" value="{{ $data->name }}" id="donationinput1"
                                                class="form-control" placeholder="Name" name="name">
                                        </div>

                                        <div class="form-group">
                                           
                                            <label for="donationinput3" class="col-form-label">E-mail</label>
                                            <input type="email" value="{{ $data->email }}" disabled id="donationinput3"
                                                class="form-control" placeholder="E-mail" name="email">
                                        </div>

                                        <div class="form-group">
                                            <label for="donationinput4"  class="col-form-label">Contact Number</label>
                                            <input type="text" value="{{ $data->phone }}" id="donationinput4"
                                                class="form-control" placeholder="Phone" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="donationinput7"  class="col-form-label">Photo</label>
                                            <input type="file" name="image" class="form-control" placeholder="image" onchange="loadFile(event)">
                                            <img class="mt-2" id="img" src="{{asset("resources/images/$data->image ")}}" width="200px">
                                        </div>

                                    </div>
                                    <div class="form-actions center">
                                        <button  type="submit" class="btn btn-outline-primary mr-3">Update</button>
                                        <a href="{{url('/admin/profile/password')}}" type="button" class="btn btn-outline-primary">Change Password</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        var loadFile = function(event) {
          var output = document.getElementById('img');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
      </script>
@endsection
