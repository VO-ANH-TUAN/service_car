@extends('admin.main')
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên dịch vụ</label>
                        <input type="text" name="name" value="{{ $service->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Dường dẫn</label>
                        <input type="text" name="url" value="{{ $service->url }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh dịch vụ</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $service->thumb }}" target="_blank">
                        <img src="{{ $service->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $service->thumb }}" id="thumb">
            </div>
            <div class="form-group">
                <label>Nội dung </label>
                <textarea name="content" id="editor2" class="form-control">{{ $service->content }}</textarea>
                <script>

                    CKEDITOR.replace( 'editor2' );
                </script>
            </div>
            <div class="form-group">
                <label for="menu">Sắp xếp</label>
                <input type="number" name="sort_by" value="{{ $service->sort_by }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $service->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $service->active == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Dịch Vụ</button>
        </div>
        @csrf
    </form>
@endsection

