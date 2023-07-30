@extends('layout')
@section('content')
    <a href="{{route('categories.create')}}"><button class="btn btn-primary">Thêm danh mục mới</button></a>
    <table id="list" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Desciption</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <a href="{{route('categories.edit', $item)}}" class="btn btn-success">Sửa</a>
                    <button class="btn btn-danger"
                            onclick="document.getElementById('item-{{ $item->id }}').submit();">Xóa
                    </button>
                    <form action="{{route('categories.destroy', $item->id)}}" id="item-{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        new DataTable('#list');
    </script>
@endsection
