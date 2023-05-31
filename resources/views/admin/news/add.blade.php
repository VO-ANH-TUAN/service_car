@extends('admin.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên tin tức</label>
                        <input type="text" name="name" value="{!! old('name') !!}" class="form-control"  placeholder="Nhập tên dịch vụ">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường dẫn</label>
                        <input type="text" name="url" value="{!! old('url') !!}" class="form-control"  placeholder="Nhập đường dẫn">
                    </div>
                </div>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="menu">Ảnh Dịch vụ</label>--}}
{{--                <input type="file"  class="form-control" id="upload">--}}
{{--                <div id="image_show">--}}
{{--                    <a href="{{ old('thumb') }}" target="_blank">--}}
{{--                        <img src="{{ old('thumb') }}" width="100px">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <input type="hidden" name="thumb" id="thumb"value="{{ old('thumb') }}" >--}}
{{--            </div>--}}
                        <div class="form-group">
                            <label for="menu">Video Tin Tức</label>
                            <input type="file" name="video" class="form-control" >
                            <div id="image_show">
                                <a href="{{ old('path') }}" target="_blank">
                                    <img src="{{ old('path') }}" width="100px">
                                </a>
                            </div>
{{--                            <input type="hidden" name="thumb" id="thumb"value="{{ old('thumb') }}" >--}}
                        </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="contents" id="contents" class="form-control">{{ old('content') }}</textarea>

            </div>
            <div class="form-group">
                <label for="menu">Sap xep</label>
                <input type="number" name="sort_by" value="{!! old('sort_by') !!}" class="form-control" min="0">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Dịch Vụ</button>
        </div>
        @csrf
    </form>
@endsection
@section('footer')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('contents',{
            filebrowserUploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            filebrowserUploadMethod:'form'
        });
    </script>
@endsection


