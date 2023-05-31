@extends('admin.main')
@section('content')
<table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Slider</th>
            <th>Dường dẫn</th>
            <th>Hình ảnh</th>
            <th>Hoạt động</th>
            <th>Cập nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($sliders as $key => $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->name }}</td>  
                <td>{{ $slider->url }}</td>       
                <td><img src="{{ $slider->thumb }}" alt="{{ $slider->name }}" width="120" height="120"></td>            
                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{ $slider->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$slider->id}} ', '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $sliders->links() !!}
    </div> 
@endsection