@extends('admin.main')
@section('content')
<form action="" method="post" >
               @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="menu">Tên danh mục</label>
                    <input type="text"name="name" value="{{$menu->name}}" class="form-control" id="menu" placeholder="nhap ten danh muc">
                  </div>

                  <div class="form-group">
                    <label for="menu">Chọn danh mục</label>
                    <select class="form-control"name="parent_id" >
                        <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>danh muc cha </option>
                        @foreach($menus as $menuParent)
                        <option value="{{$menuParent->id}}" {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                            {{$menuParent->name}}
                        </option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="menu">Mô tả ngắn</label></br>
                    <textarea name="description"id="editor1"class="form-group"rows="4" cols="50">
                    {{$menu->description}}
                    </textarea>
                    <script>

                    CKEDITOR.replace( 'editor1' );
                       </script>
                  </div>
                  <div class="form-group">
                    <label for="menu">Mô tả chi tiết</label></br>
                    <textarea name="content"id="editor2" class="form-group"rows="4" cols="50" style="width: 700px;">{{$menu->content}}</textarea>
                    <script>

                    CKEDITOR.replace( 'editor2' );
                       </script>
                  </div>

                    <div class="form-group">
                        <label for="menu">Ảnh Sản Phẩm</label>
                        <input type="file"  class="form-control" id="upload">
                        <div id="image_show">
                            <a href="'{{$menu->thumb}}" target="_blank">
                                <img src="{{$menu->thumb}}" width="100px" height="100px" >
                            </a>
                        </div>
                        <input type="hidden" name="thumb" value="'{{$menu->thumb}}" id="thumb">
                    </div>
                      <div class="form-check">
                      <label for="menu">Trạng thái</label></br>
                      <input class="form-check-input" type="radio" value="1" name="active" id="flexRadioDefault1"{{$menu->active == 1 ? 'checked' : ''}}>
                      <label class="form-check-label" for="flexRadioDefault1">
                       Có
                      </label>
                      </div>
                      <div class="form-check">
                     <input class="form-check-input" type="radio"value="0" name="active" id="flexRadioDefault2"{{$menu->active== 0 ? 'checked' : ''}} >
                      <label class="form-check-label" for="flexRadioDefault2">
                      Không
                      </label>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                </div>
              </form>
@endsection
