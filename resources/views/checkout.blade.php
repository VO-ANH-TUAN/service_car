@extends('main')
@section('content')
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <h2 style="margin-bottom: 20px; margin-top: 20px"><p>{{$title}}</p> </h2>
            <form action="{{url('/vn-pay')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary" name ="redirect">VNPAY</button>

            </form>
        </div>
    </section>

@endsection
