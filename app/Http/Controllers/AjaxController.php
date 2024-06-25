<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\District;
use App\Models\Commune;
use App\Models\Category;

class AjaxController extends Controller
{
    public function getDistrict(Request $request) 
    {
        $districts = District::where('matp', $request->provinceId)
        ->select('maqh', 'name')
        ->orderBy('name', 'asc')
        ->get();

        $res = '';
        if(count($districts) > 0) {
            foreach($districts as $district) {
                $res .= '<option value="'.$district->maqh.'">'. $district->name .'</option>';
            }
        } else {
            $res .= '<option value="">-- Chọn huyện --</option>';
        }

        return response()->json([
            'status' => 200,
            'data' => $res,
        ]);
    }

    public function getCommune(Request $request) 
    {
        $communes = Commune::where('maqh', $request->districtId)
        ->select('xaid', 'name')
        ->orderBy('name', 'asc')
        ->get();

        $res = '';
        if(count($communes) > 0) {
            foreach($communes as $commune) {
                $res .= '<option value="'.$commune->xaid.'">'.$commune->name.'</option>';
            }
        } else {
            $res .= '<option value="">-- Chọn xã --</option>';
        }

        return response()->json([
            'status' => 200,
            'data' => $res,
        ]);
    }

    public function get_danh_muc_bds(Request $request) 
    {
        $output = '';

        if(!empty($request->category)) {
            $categories = Category::where('cat_type', $request->category)
            ->orderBy('created_at', 'asc')
            ->get();

            $output .= '<option value="">Tất cả bài đăng</option>';
            foreach($categories as $category) {
                $output .= '<option value="'.$category->id.'">'. $category->name .'</option>';
            }
        } else {
            $output .= '<option value="">-- Chọn danh mục nhà đất --</option>';
        }
        
        return response()->json([
            'status' => 200,
            'data'   => $output,
        ]);
    }
}
