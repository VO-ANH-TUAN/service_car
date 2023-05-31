@extends('main')

@section('content')
<table class="table" style="margin-top: 80px;">
        <thead>
        <tr style="color: white;border: solid 3px white;background:gray">
          
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Ngày Đặt hàng</th>
            <th style="width: 200px">Xem Chi Tiết</th>
        </tr>
        </thead>
        <tbody>
            @foreach($customers as $key => $customer)
            <tr>
        
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/carts/customers/view/{{ $customer->id }}">
                      <i class="fa fa-money" aria-hidden="true"></i>
                    </a>
                    <!-- <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow( '{{$customer-> id}}' , '/admin/customers/destroy')">
                        <i class="fas fa-trash"></i>
                    </a> -->

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- <div class="card-footer clearfix">
        {!! $customers->links()!!}
    </div>  -->
@endsection
