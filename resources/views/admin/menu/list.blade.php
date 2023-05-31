@extends('admin.main')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Hoạt động</th>
            <th>Cập nhật</th>
            <th style="width: 100px;"></th>
        </tr>
    </thead>

    <tbody>
     {!!\App\Helpers\Helper::menu($menus)!!}
    </tbody>
</table>
@endsection
