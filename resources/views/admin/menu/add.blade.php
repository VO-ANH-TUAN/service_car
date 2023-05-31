@extends('admin.main')
@section('content')
<form action="" method="post" >
               @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="menu">Ten danh muc</label>
                    <input type="text"name="name" class="form-control" id="menu" placeholder="nhap ten danh muc">
                  </div>

                  <div class="form-group">
                    <label for="menu">Chon danh muc</label>
                    <select class="form-control"name="parent_id" >
                        <option>Chọn danh mục</option>
                        @foreach($menus as $menu)
                        <option value="{{$menu->id}}" p>{{$menu->name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="menu">Mô tả ngắn</label></br>
                    <textarea name="description"class="form-group"rows="4" cols="150">

                    </textarea>

                  </div>
                  <div class="form-group">
                    <label for="menu">Mô tả chi tiết</label></br>
                    <textarea name="content"id="editor" class="form-group"rows="4" cols="50" style="width: 700px;"></textarea>
                    <script>
                    CKEDITOR.replace( 'editor' );
                       </script>
                  </div>
                    <div class="form-group">
                        <label for="menu">Ảnh Sản Phẩm</label>
                        <input type="file"  class="form-control" id="upload">
                        <div id="image_show">
                            <a href="{{ old('thumb') }}" target="_blank">
                                <img src="{{ old('thumb') }}" width="100px">
                            </a>
                        </div>
                        <input type="hidden" name="thumb" id="thumb"value="{{ old('thumb') }}" >
                    </div>

                      <div class="form-check">
                      <label for="menu">Trạng thái</label></br>
                      <input class="form-check-input" type="radio" value="1" name="active" id="flexRadioDefault1"checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                       Có
                      </label>
                      </div>
                      <div class="form-check">
                     <input class="form-check-input" type="radio"value="0" name="active" id="flexRadioDefault2" >
                      <label class="form-check-label" for="flexRadioDefault2">
                      Không
                      </label>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
@endsection
