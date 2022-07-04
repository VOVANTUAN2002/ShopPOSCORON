@extends('layouts.admin')
@section('title','123')
@section('content')
<?php
$statuses = [
    0 => "Chưa hoàn thành",
    1 => "Hoàn thành"
];
?>
<h1>Xem Chi Tiết Đơn Hàng</h1>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="row">

                <div class="col-lg-6">
                    <table class="table">
                        <tr>
                            <td class="">Ngày đặt hàng</td>
                            <td class="">{{ date('d/m/Y',strtotime($order->created_at))   }}</td>
                        </tr>
                        <tr>
                            <td class="">Người đặt hàng</td>
                            <td class="">{{$order->customer->email}} </td>

                        </tr>
                        <tr>
                            <td class="">Số điện thoại người đặt hàng</td>
                            <td class="">{{$order->customer->phone}}</td>

                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table">
                        <tr>
                            <td class="">Tổng giá trị đơn hàng</td>
                            <td class="">{{ number_format ($order->total_price) }}</td>
                        </tr>
                        <tr>
                            <td class="">Phương thức thanh toán</td>
                            <td class="">{{$order->payment_method}} </td>

                        </tr>
                        <tr>
                            <td class="">Trạng thái đơn hàng</td>
                            <td class="">{{ $statuses[$order->status]}}</td>

                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr class="">
                            <td class="">Hình ảnh sản phẩm</td>
                            <td class="">Tên sản phẩm</td>
                            <td class="">Số Lượng</td>
                            <td class="">Giá tiền</td>
                        </tr>
                        @foreach ($order->order_details as $order_detail)
                        <tr class="">
                            <td class=""><img
                                    src="{{ asset('storage/app/public/images/'.$order_detail->product->image) }}" alt=""
                                    style="width: 150px"></td>
                            <td class="">{{$order_detail->product->name}}</td>
                            <td class="">{{$order_detail->qty}}</td>
                            <td class="">{{ number_format ($order_detail->price) }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('orders.update',$order->id)}}" class="" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for=""> Trạng thái đơn hàng</label>
                            <select name="status" id="" class="form-control">
                                <option <?= ($order->status === 0) ? "selected" : ""; ?> value="0" class="">Chưa hoàn
                                    thành</option>
                                <option <?= ($order->status === 1) ? "selected" : ""; ?> value="1" class="">Hoàn thành
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

@endsection