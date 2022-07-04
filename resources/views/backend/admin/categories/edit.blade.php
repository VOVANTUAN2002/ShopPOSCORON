@extends('backend.layouts.master')

@section('content')

<div class="col-12">
    <div class="card">
    <h1>Sửa thể loại {{$category->name}} </h1>
        <div class="card-body">

            <form method="post" action="{{route('categories.update',[$category->id])}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    <span style="color:red;">@error("name"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kích Hoạt Thể Loại</label>
                    <select name="status" class="custom-select">
                        @if($category->status==0)
                        <option selected value="0">Không Kích hoạt</option>
                        <option value="1">Kích hoạt</option>
                        @else
                        <option value="0">Không Kích hoạt</option>
                        <option selected value="1">Kích hoạt</option>
                        @endif
                    </select>
                </div>
                <div> <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div>
@endsection