
@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">RoomDetails
                <a href="{{url('admin/roomtype')}}" class="float-end btn btn-info btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            @if(Session::has('error'))
            <p class="text-danger">{{session('error')}}</p>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/roomtype/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title" value="{{$data->title}}"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><textarea name="description" class="form-control" cols="30" rows="5" >{{$data->description}}</textarea></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input type="text" class="form-control" name="price" value="{{$data->price}}"></td>
                        </tr>
                        <tr>
                            <th>Photo1</th>
                            <td><label for="imageInput" class="btn btn-info w-full cursor-pointer">Edit Photo</label>
                            <input id="imageInput" type="file" name="photo1"  class="w-full h-full top-0 left-0 absolute opacity-0">
                            <input type="hidden" name="prevImg" value="{{$data->photo1}}">
                            <img width="100" src="{{asset('storage/'.$data->photo1)}}" />
                            </div>
                            <div class="mt-3">
                                <img id="selectedImage" src="#" alt="Selected Photo" class="hidden max-w-full h-auto mx-auto" style="max-width: 150px; max-height: 150px;">
                            </div></td>
                        </tr>
                        <tr>
                            <th>Photo2</th>
                            <td><label for="imageInput2" class="btn btn-info w-full cursor-pointer">Edit Photo</label>
                            <input id="imageInput2" type="file" name="photo2"  class="w-full h-full top-0 left-0 absolute opacity-0">
                            <input type="hidden" name="prevImg2" value="{{$data->photo2}}">
                            <img width="100" src="{{asset('storage/'.$data->photo2)}}" />
                            </div>
                            <div class="mt-3">
                                <img id="selectedImage2" src="#" alt="Selected Photo" class="hidden max-w-full h-auto mx-auto" style="max-width: 150px; max-height: 150px;">
                            </div></td>
                        </tr>
                        <tr>
                            <th>Photo3</th>
                            <td><label for="imageInput3" class="btn btn-info w-full cursor-pointer">Edit Photo</label>
                            <input id="imageInput3" type="file" name="photo3"  class="w-full h-full top-0 left-0 absolute opacity-0">
                            <input type="hidden" name="prevImg3" value="{{$data->photo3}}">
                            <img width="100" src="{{asset('storage/'.$data->photo3)}}" />
                            </div>
                            <div class="mt-3">
                                <img id="selectedImage3" src="#" alt="Selected Photo" class="hidden max-w-full h-auto mx-auto" style="max-width: 150px; max-height: 150px;">
                            </div></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-info" value="Update"></td>
                        </tr>
                    </table>
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
    var imageInput2 = document.getElementById("imageInput2");
    var imageInput3 = document.getElementById("imageInput3");
    var selectedImage = document.getElementById("selectedImage");
    var selectedImage2 = document.getElementById("selectedImage2");

    var selectedImage3 = document.getElementById("selectedImage3");

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
    imageInput2.addEventListener("change", function() {
        var file2 = imageInput2.files[0];
        if (file2) {
            var reader = new FileReader();
            reader.onload = function(e) {
                selectedImage2.src = e.target.result;
                selectedImage2.classList.remove("hidden");
            };
            reader.readAsDataURL(file2);
        } else {
            selectedImage2.src = "#";
            selectedImage2.classList.add("hidden");
        }
    });

    imageInput3.addEventListener("change", function() {
        var file3 = imageInput3.files[0];
        if (file3) {
            var reader = new FileReader();
            reader.onload = function(e) {
                selectedImage3.src = e.target.result;
                selectedImage3.classList.remove("hidden");
            };
            reader.readAsDataURL(file3);
        } else {
            selectedImage3.src = "#";
            selectedImage3.classList.add("hidden");
        }
    });
});
</script>
@endsection


