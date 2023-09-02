@extends('layouts.admin')
@section('content')

<div>
    <label for="">choice client</label>
    <select name="client_id" id="client_id" class="form-control">
        @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
    @if($data)
    <div class="col-xl-2">
        <button type="button" class="btn btn-primary text-capitalize"
            style="background-color:#60bdf3 ;">Pay Now</button>
    </div>
@endif
</div>
@endsection
