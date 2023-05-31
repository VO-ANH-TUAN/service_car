@extends('main')

@section('content')

    <div class="carts" style="margin-top: 100px;">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head" style="color: white;border: solid 3px white;background:gray">
             
                <th class="column-1">Hình ảnh:</th>
                <th class="column-2">Sản phẩm</th>
                <th class="column-3">Giá</th>
                <th class="column-4">Số lượng</th>
                <th class="column-5">Tổng</th>
{{--                <th class="column-5">Tình trạng đơn hàng</th>--}}
            </tr>

            @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->qty;
                    $total += $price;
                @endphp
                <tr>
                 
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $cart->qty }}</td>
                    <td class="column-5">{{ number_format($price, 0, '', '.') }} VND</td>
                    <!-- <td class="column-5"> <?php if(($cart->active)==0)echo'Chưa duyệt';
                                             elseif (($cart->active)!=0) echo'Đã duyệt';
                                            ?> </td> -->


                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right" style="font-weight: bold; color: green">Tổng Tiền: </td>
                <td>{{ number_format($total, 0, '', '.') }} VND</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
