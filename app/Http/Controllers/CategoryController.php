<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
          
      $categoris = Category::get();
      
      return view('category')->with(compact('categoris'));
    }    
    public function subCat(Request $request)
    {
         
        $parent_id = $request->cat_id;
        
        $subcategories = subcategory::where('parent_id',$parent_id)
                              ->get();
                           
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
}