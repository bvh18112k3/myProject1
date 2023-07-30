@extends('layout')
@section('content')
    <a href="{{route('tags.create')}}"><button class="btn btn-primary">Thêm tag mới</button></a>
{{--    @if(session()->has('msg'))--}}
{{--        <div class="alert--}}
{{--        @if(session()->has('msg'))--}}
{{--        <div class="alert--}}
{{--             @if(session()->get('status') == \Illuminate\Http\Response::HTTP_OK)--}}
{{--                 alert-success--}}
{{--             @else--}}
{{--                 alert-danger--}}
{{--    @endif--}}
{{--    ">--}}
{{--    <p>{{ session()->get('msg') }}</p>--}}
{{--    </div>--}}
{{--    @endif">--}}
{{--            <p>{{ session()->get('msg') }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}


    @if(session()->has('msg'))
        <div class="alert
            @if(session()->get('status') == \Illuminate\Http\Response::HTTP_OK)
                alert-success
            @else
                alert-danger
            @endif
         ">
            <p>{{ session()->get('msg') }}</p>
        </div>
    @endif
    <table class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Danh mục</th>
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
                <td>{{$item->category->name}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <a href="{{route('tags.edit', $item)}}" class="btn btn-success">Sửa</a>
                    <button class="btn btn-danger"
                            onclick="
                            if(confirm('Are you sure')){
                                document.getElementById('item-{{ $item->id }}').submit();
                            }
                            ">Xóa
                    </button>
                    <form action="{{route('tags.destroy', $item->id)}}" id="item-{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{$data->links()}}
    </div>
    <script>
        new DataTable('#list');
    </script>
@endsection
