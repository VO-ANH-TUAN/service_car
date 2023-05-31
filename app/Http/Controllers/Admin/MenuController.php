<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use \App\Http\Services\Menu\MenuService;
use App\Models\Menu;


class MenuController extends Controller
{
   protected $menuService;
   public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public  function create()
    {
       return view('admin.menu.add',['title'=>'Thêm danh mục',
       'menus'=>$this->menuService->getParent()

     ]);
    }
    public  function store(CreateFormRequest $request)
    {
      $this->validate($request, ['name' => 'unique:menus',]);
      $this->menuService->create($request);

      return redirect()->back();
    }
//    public function ckUpload(Request $request ){
//       $file = $request->upload;
//       $fileName=$file->getClientOrginalName();
//       $new_name =time().$fileName;
//       $dir = "storage/files/";
//       $file->move($dir,$new_name);
//       $url = asset('storage/files/'.$new_name);
//       $CkeditorFuncNum = $request->input('CKEditorFuncNum');
//       $status = "<script>window.parent.CKEDITOR.tools.callFunction('$CkeditorFuncNum','$url','File Uploaded Successfully',)</script>";
//       echo '$status';
//    }
    public function index(){
      return view('admin.menu.list',[
      'title'=>'Danh sách danh mục ',
      'menus'=>$this->menuService->getAll()
    ]);
    }
    public  function show (Menu $menu)
    {

      return view('admin.menu.edit',[
        'title'=>'Chỉnh sửa danh mục '.$menu->name,
        'menu'=>$menu,
        'menus'=>$this->menuService->getParent()
      ]);
    }
    public  function update (Menu $menu ,CreateFormRequest $request)
    {
      $this-> menuService->update($request,$menu);
      return redirect('/admin/menus/list');

    }

    public function destroy(Request $request){
       $resulf=$this->menuService->destroy($request);
       if($resulf){
        return response()->json([
          'error'=> false,
          'message'=>'Xoá thành công danh mục!'
        ]);

       }
       return response()->json([
         'error'=> true
       ]);
    }
}
