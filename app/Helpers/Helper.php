<?php

namespace App\Helpers;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Illuminate\View\View;
use PharIo\Version\SpecificMajorAndMinorVersionConstraint;

class Helper{
 public static function menu($menus, $parent_id=0,$char=''){
     $html='';
     foreach($menus as $key => $menu){
        if($menu->parent_id == $parent_id){
            $html .= '
            <tr>
            <td>'.$menu->id.'</td>
            <td>'.$char . $menu->name. '</td>
            <td><img src="'.$menu->thumb.'" width="120" height="120"></td>
            <td>'.self::active($menu->active).'</td>
            <td>'.$menu->updated_at.'</td>
            <td>
           <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'.$menu->id.'"> <i class="fa-regular fa-pen-to-square"></i></a>
           <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')"> <i class="fa-regular fa-trash"></i></a>
            </td>
            </tr>
            ';

         unset($menus[$key]);
        $html .=self::menu($menus,$menu->id,$char.'--');
        }
     }
     return $html;
 }
 public static function active( $active = 0): string
 {
   return $active == 0 ? '<span class="btn btn-danger btn-sm">No</span>':'<span class="btn btn-success btn-sm">Yes</span>';

 }


 public static function menus($menus, $parent_id = 0) :string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li >
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html"id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ' . $menu->name . '
                        </a>';



                unset($menus[$key]);

                if (self::isChild($menus, $menu->id)) {

                    $html .= '<ul class="sub-menu">';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }
    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
        return '<a href="/contact">Liên Hệ</a>';
    }

}
