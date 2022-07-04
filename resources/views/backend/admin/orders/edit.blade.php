@extends('layouts.admin')
@section('title','Sửa Đơn Hàng')
@section('content')
                <h1>Sửa đơn hàng</h1>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích Hoạt Thể Loại</label>
                                <select name="status" class="form-select" id="inputGroupSelect02">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <div> <button type="submit" class="btn btn-primary">Xác Nhận</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-danger">Hủy</a> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
