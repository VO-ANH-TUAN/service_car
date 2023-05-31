<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\News\NewsService;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    protected $news;
    public function __construct(NewsService $news){
        $this-> news =$news;
    }
    public function create()
    {
        return view('admin.news.add',[
            'title'=> 'Thêm tin tức mới'

        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',


        ]);

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;

        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath);

        if ($isFileUploaded) {
            $video = new News();
            $video->name = $request->name;
            $video->url = $request->url;
            $video->content = $request->contents;
            $video->sort_by = $request->sort_by;
            $video->active = $request->active;
            $video->path = $filePath;
            $video->save();

            return back()
                ->with('success','Đã thêm thành công tin tức');
        }

        return back()
            ->with('error','Thêm tin tức thất bại ');
    }

    public function index()
    {
        return view('admin.news.list',[
            'title'=>'Danh sách tin tức mới nhất',
            'news'=> $this->news->get()
        ]);
    }
    public function show(News $news)
    {
        return view('admin.news.edit', [
            'title' => 'Chỉnh Sửa tin tức',
            'new' => $news
        ]);
    }
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',
            'content'=>'required'
        ]);

        $result = $this->news->update($request, $news);
        if ($result) {
            return redirect('/admin/news/list');
        }

        return redirect()->back();
    }
    public function destroy(Request $request){
        $result = $this->news->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công tin tức!'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
