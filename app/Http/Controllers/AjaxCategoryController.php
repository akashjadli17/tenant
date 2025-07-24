<?php

namespace App\Http\Controllers;

use App\Models\TopCategory;
use App\Models\MidCategory;
use App\Models\LowCategory;
use Illuminate\Http\Request;

class AjaxCategoryController extends Controller
{
    public function getTopCategories($gender_id)
    {
        return response()->json(
            TopCategory::where('gender_id', $gender_id)->get()
        );
    }

    public function getMidCategories($top_category_id)
    {
        return response()->json(
            MidCategory::where('top_category_id', $top_category_id)->get()
        );
    }

    public function getLowCategories($mid_category_id)
    {
        return response()->json(
            LowCategory::where('mid_category_id', $mid_category_id)->get()
        );
    }
}
