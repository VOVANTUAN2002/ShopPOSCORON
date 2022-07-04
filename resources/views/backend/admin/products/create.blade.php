@extends('backend.layouts.master')

@section('content')

<h1>Thêm mới Sản phẩm </h1>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Tối đa 255 ký tự">
                    <span style="color:red;">@error("name"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Giá Tiền</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Tối đa 255 ký tự">
                    <span style="color:red;">@error("price"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="text" class="form-control" name="image" value="{{ old('image') }}" placeholder="Tối đa 255 ký tự">
                    <span style="color:red;">@error("image"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <input type="text" class="form-control" name="des" value="{{ old('des') }}" placeholder="Tối đa 255 ký tự">
                    <span style="color:red;">@error("des"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số Lượng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="quantity" placeholder="Số Lượng">
                    <span style="color:red;">@error("quantity"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thể Loại Sản Phẩm</label>
                    <select name="categories_id " class="form-select" >
                    <option value="1">Áo</option>
                        <option value="2">Quần</option>
                    </select>
                </div>
                <div> <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('products.index') }}" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection