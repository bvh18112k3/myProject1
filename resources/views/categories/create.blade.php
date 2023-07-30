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
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control"placeholder="Enter name" name="name">
        </div>
        <label for="comment">Descript:</label>
        <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
