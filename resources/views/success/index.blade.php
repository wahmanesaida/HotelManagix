@extends('layouts.admin')
@section('content')


    <br>
    <div class="alert alert-light" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    @if(Session::has('success'))
    <p class="text-info">{{session('success')}}</p>
    @endif
    <hr>
    <p class="mb-0">Welcome to our hotel, where comfort meets hospitality. We're delighted to have you as our guest, and we're committed to making your stay a truly exceptional experience.</p>
<br>

@endsection
