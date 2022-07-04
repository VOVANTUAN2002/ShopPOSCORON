@extends('backend.layouts.master')

@section('content')


<div class="col-12">
    <div class="card">

        <div class="card-body">
            <h1>Thêm mới Thể loại</h1>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="post" action="{{route('categories.store')}}">
                @csrf
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Tối đa 255 ký tự">
                    <span style="color:red;">@error("name"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kích Hoạt Thể Loại</label>
                    <select name="status" class="form-select" id="inputGroupSelect02">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Không kích hoạt</option>
                    </select>
                </div>
                <div> <button type="submit" class="btn btn-primary">Submit</button>
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