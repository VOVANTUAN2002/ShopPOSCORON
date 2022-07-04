@extends('backend.layouts.master')

@section('content')

<div class='card'>
    <div class='card-header'>
        <h1 class="text-center">Thể Loại</h1>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="get">
            <div class="row">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Sorry!</strong> invalid input.<br><br>
                    <ul style="list-style-type:none;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    <a class="btn btn-success" href="{{ route('categories.create') }}">Thêm mới</a>
                </div>
                @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
                @endif
                <div class="col-lg-6">
                    <input class="form-control" type="text" placeholder="Search for..." name="search" />
                </div>

                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col" style="width: 100px; ">Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <a style="color: black;" href="{{route('products.index',[$category->id])}}">{{$category->name}}</a>
                    <td>{!!$category->des !!}</td>
 

                    <td>
                        <a href="{{route('categories.edit',[$category->id])}}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                        <form method="POST" action="{{route('categories.destroy',[$category->id])}}" accept-charset="UTF-8" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm {{ $category->name }} không?');"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
    </div>
    </table>
</div>

</div>
</main>
@endsection