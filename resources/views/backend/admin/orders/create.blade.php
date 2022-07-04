@extends('layouts.admin')

@section('title')
Thể Loại
@endsection

@section('content')
                        <h1>Thêm mới Thể loại</h1>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="{{ route('orders.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                            placeholder="Tối đa 255 ký tự">
                                        <span style="color:red;">@error("name"){{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ old('description') }}" placeholder="Tối đa 255 ký tự">
                                        <span style="color:red;">@error("description"){{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kích Hoạt Thể Loại</label>
                                        <select name="status" class="form-select" id="inputGroupSelect02">
                                            <option value="0">Kích hoạt</option>
                                            <option value="1">Không kích hoạt</option>
                                        </select>
                                    </div>
                                    <div> <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('orders.index') }}" class="btn btn-danger">Hủy</a>
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
   