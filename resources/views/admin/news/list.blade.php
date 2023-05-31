@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tiêu đề</th>
            <th>Đường dẫn</th>
            <th>Video</th>
            <th>Nội dung</th>
            <th>Trạng thái </th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $key => $new)
            <tr>
                <td>{{ $new->id }}</td>
                <td>{{ $new->name }}</td>
                <td>{{ $new->url }}</td>
                <td> <iframe width="320" height="250"
                             src="http://xedichvu.com/public/storage/{{ $new->path }}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen">
                    </iframe></td>
                <td>{{ $new->content }}</td>
                <td>{!! \App\Helpers\Helper::active($new->active) !!}</td>
                <td>{{ $new->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/news/edit/{{ $new->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$new->id}} ', '/admin/news/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $news->links() !!}
    </div>
@endsection

