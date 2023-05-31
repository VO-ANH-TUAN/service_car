@extends('admin.main')
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Thứ tự</th>
            <th scope="col">ID xe</th>
            <th scope="col">Số lương </th>
            <th scope="col">Giá</th>
            <th scope="col">Tiền(VND)</th>
        </tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach($statists as $statist)
            @php
                 $tong =   $statist->price * $statist->qty ;
                $total+=   $tong;
            @endphp
        <tr>
            <td>{{$statist->created_at}}</td>
            <td>{{$statist->id}}</td>
            <td>{{$statist->qty}}</td>
            <td>{{number_format($statist->price, '0', '', '.')}}</td> 
            <td>
            {{number_format( $tong , '0', '', '.')}}

            </td>
        </tr>


        @endforeach

            <th scope="row">Theo năm 2023</th>
            <td colspan="2">Tồng doanh thu: </td>
            <td>{{number_format($total, '0', '', '.')}} VND</td> 
        </tr>
        </tbody>
    </table>
@endsection
