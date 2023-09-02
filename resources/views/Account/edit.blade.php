@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">{{$user->name}}
            <a href="{{url('admin/Account')}}" class="float-end btn btn-info btn-sm">View</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('error'))
        <p class="text-danger">{{session('error')}}</p>
        @endif
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
        <form method="POST" action="{{url('admin/users/'.$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="intro-y box p-5 ">
                    <div class="flex justify-center items-center">
                        <div
                            class="border-2 w-44 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="mx-auto cursor-pointer relative mt-5">
                            <label for="imageInput" class="btn btn-info w-full cursor-pointer">Edit Photo</label>
                            <input id="imageInput" type="file" name="image"  class="w-full h-full top-0 left-0 absolute opacity-0">
                            <input type="hidden" name="prevImg" value="{{$user->image}}">
                            @if($user->image)
                                <img width="100" src="{{asset('storage/'.$user->image)}}" />
                            @else
                            <img width="100" src="{{asset('storage/user/inconnu.jpg')}}" />
                            @endif
                            </div>
                            <div class="mt-3">
                                <img id="selectedImage" src="#" alt="Selected Photo" class="hidden max-w-full h-auto mx-auto" style="max-width: 150px; max-height: 150px;">
                            </div>


                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-x-5 mt-5">
                    <div class="col-span-12 2xl:col-span-6 mt-5">
                        <div>
                            <label for="name" class="form-label" style="color:black;"> <b>Name</b> </label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Entrer un nom" value="{{$user->name}}" required>
                        </div>
                        <div class="mt-3.5">
                            <label for="email" class="form-label" style="color:black;"> <b>Email</b> </label>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Entrer un email" value="{{$user->email}}" required>
                        </div>
                    </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ url('admin/users') }}">
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-primary w-24">Update</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var imageInput = document.getElementById("imageInput");
    var selectedImage = document.getElementById("selectedImage");

    imageInput.addEventListener("change", function() {
        var file = imageInput.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                selectedImage.src = e.target.result;
                selectedImage.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        } else {
            selectedImage.src = "#";
            selectedImage.classList.add("hidden");
        }
    });
});
</script>
@endsection


