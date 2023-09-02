
@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"> Update {{$editdata->name}}
                <a href="{{url('admin/client')}}" class="float-end btn btn-info btn-sm">View All Clients</a>
            </h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/client/'.$editdata->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <tr>
                            <th>Full name </th>
                            <td><input type="text" class="form-control" name="name" value="{{$editdata->name}}"></td>
                        </tr>
                        <tr>
                            <th>Email </th>
                            <td><input type="email" name="email" class="form-control" value="{{$editdata->email}}"></td>
                        </tr>
                        <tr>
                            <th>Phone </th>
                            <td><input type="text" name="phone" class="form-control" value="{{$editdata->phone}}"></td>
                        </tr>
                        <tr>
                            <th>CIN </th>
                            <td><input type="text" name="CIN" class="form-control" value="{{$editdata->CIN}}"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" name="Address" class="form-control" value="{{$editdata->Address}}"></td>
                        </tr>
                        <tr>
                            <th>photo </th>
                            <td>

                            <label for="imageInput" class="btn btn-info w-full cursor-pointer">Edit Photo</label>
                            <input id="imageInput" type="file" name="photo"  class="w-full h-full top-0 left-0 absolute opacity-0">
                            <input type="hidden" name="prevImg" value="{{$editdata->photo}}">
                            <img width="100" src="{{asset('storage/'.$editdata->photo)}}"  />
                            </div>
                            <div class="mt-3">
                                <img id="selectedImage" src="#" alt="Selected Photo" class="hidden max-w-full h-auto mx-auto" style="max-width: 150px; max-height: 150px;">
                            </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-info"></td>
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

