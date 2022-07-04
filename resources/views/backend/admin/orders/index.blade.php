@extends('layouts.admin')
@section('title','Đơn Hàng')

@section('content')
<?php
$statuses = [
    0 => "Chưa hoàn thành",
    1 => "Hoàn thành"
];
?>
<h1 class="mt-4">Đơn Hàng</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Code</th>
            <th scope="col">Customer_id</th>
            <th scope="col">Thanh Toán</th>
            <th scope="col">Tổng Giá</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $key => $order)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $order->code }}</td>
            <td>{{ $order->customer->email}}</td>
            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->total_price }}</td>
            <td>
                {{ $statuses[$order->status]}}
            </td>
            <td>
                <a href="{{route('orders.show',[$order->id])}}" class="btn btn-primary ">Xem</a>
            </td>
            <td>
                <form action="{{route('orders.destroy',[$order->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn muốn xóa sản phẩm này không?');" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <span aria-hidden="true"> {{ $orders->links() }}</span>
    </ul>
</nav>
</div>
</main>
@endsection