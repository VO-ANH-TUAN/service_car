@extends('admin.main')
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu đề tin tức</label>
                        <input type="text" name="name" value="{{ $new->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường dẫn</label>
                        <input type="text" name="url" value="{{ $new->url }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Video Tin Tức</label>
                <input type="file" name="video" class="form-control" >
                <div id="image_show">
                    <a href="{{$new->path  }}" target="_blank">
                        <img src="{{$new->path  }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="video" value="{{ $new->path }}">
            </div>
            <div class="form-group">
                <label>Nội dung </label>
                <textarea name="content" id="editor2" class="form-control">{{ $new->content }}</textarea>
                <script>

                    CKEDITOR.replace( 'editor2' );
                </script>
            </div>
            <div class="form-group">
                <label for="menu">Sap xep</label>
                <input type="number" name="sort_by" value="{{ $new->sort_by }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $new->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $new->active == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Tin Tức</button>
        </div>
        @csrf
    </form>
@endsection

