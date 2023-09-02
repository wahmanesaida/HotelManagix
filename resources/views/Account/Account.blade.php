@extends('layouts.admin')

@section('content')
<form method="post">
                <div class="row">
                    <div class="col-md-4">
                    @if(Session::has('error'))
                    <p class="text-danger">{{session('error')}}</p>
                    @endif
                    @if(Session::has('success'))
                    <p class="text-success">{{session('success')}}</p>
                    @endif

                            <div class="profile-img">
                                @if($user->image)
                                    <img  src="{{ asset('storage/'.$user->image) }}" alt="profile" class="profile-img" />
                                @else
                                    <img  src="{{ asset('storage/user/inconnu.jpg') }}" alt="profile" class="profile-img" style="width: 70%; max-height: 100pxpx;" />
                                @endif
                            </div>
                        </div>

                    <div class="col-md-7 offset-md-1">
                        <div class="row">
                            <div class="col-8">
                                <div class="profile-head">
                                            <h5 style="color:black">
                                                {{$user->name}}
                                            </h5>
                                           <br>
                                           

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>

                                    </ul>
                                    </div>
                            </div>
                            <div class="col-2">
                                <a href="{{url('admin/Account/'.$user->id.'/edit')}}" type="submit" class="btn btn-info" name="btnAddMore">Update</a>
                            </div>
                        </div>
                    <div class="row mt-5">
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label style="color:black">Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label style="color:black">Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->email}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label style="color:black">Role</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if($user->role_as == 1)
                                                <p>Admin</p>
                                                @endif
                                            </div>
                                        </div>



                            </div>

                        </div>


                    </div>
                </div>
                </div>
            </form>
@endsection
