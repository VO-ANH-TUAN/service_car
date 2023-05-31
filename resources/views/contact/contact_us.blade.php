@extends('main')

@section('content')
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <h2 style="margin-bottom: 20px; margin-top: 20px;color: lawngreen;font-weight: bold"><p>Liên hệ</p> </h2>
            @if(Session::has('message_sent'))
              <div class="alert alert-success" role="alert">
                      {{Session::get('message_sent')}}
              </div>

           @endif
        <form method="post" action="{{route('contact.send')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label" style="color: black; font-size: 20px; font-weight:bold">Họ và Tên:</label>
                <div class="col-sm-10">
                    <input type="text" name="name"  class="form-control" id="staticEmail" placeholder="Tên" >
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label "style="color: black; font-size: 20px; font-weight:bold">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputPassword" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label" style="color: black; font-size: 20px; font-weight:bold">Số điện thoại:</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="inputPassword" placeholder="Số điện thoại" required pattern="[0-9]+" maxlength="10" minlength="10" >
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label" style="color: black; font-size: 20px; font-weight:bold">Lời nhắn:</label>
                <div class="col-sm-10">
                    <input type="text" name="message"  class="form-control"  id="inputPassword" placeholder="Chi tiết thoại" style="height: 70px">
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary ml-5 mtext-101">Gửi </button>
        </form>
        </div>
    </section>

@endsection
