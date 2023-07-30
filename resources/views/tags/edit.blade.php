@extends('layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('tags.update',$data)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control"placeholder="Enter name" name="name" value="{{$data->name}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Image:</label>
            <input type="file" class="form-control" name="image" value="{{$data->image}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
