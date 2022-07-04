@extends('backend.layouts.master')

@section('content')
<div class='card'>
    <div class='card-header'>
        <h1 class="mt-12">Sản Phẩm</h1>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="get">
            <div class="row">
                <div class="col-lg-6">
                    <input class="form-control" type="text" placeholder="Search for..." name="search" />
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="col-lg-4">
            <a class="btn btn-success" href="{{ route('products.create') }}">Thêm mới</a>
        </div>
    </div>
    <div class='card-body'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" style=" width: 250px;">Tên</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Mô Tả</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col" style=" width: 100px;">Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->des }}</td>
                                <td><img style="height:80px;" src="{{$product->image}}" alt=""></td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{route('products.edit',[$product->id])}}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                                    <form method="POST" action="{{route('products.destroy',[$product->id])}}" accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <div class='float:right'>
                <ul class="pagination">
                    <span aria-hidden="true"> {{ $products->links() }}</span>
                </ul>
            </div>
        </nav>
    </div>
</div>
@endsection