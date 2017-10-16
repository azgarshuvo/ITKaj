<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\adminController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;
use App\Categories;
use Session;
class CategoryCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function addCategory()
     {
       $items = Categories::where('is_parent', 0)->orderBy('category_name')->get();
       return view('admin.category.addCategory', compact('items'));
     }

     public function insertCategory(Request $request)
     {
       $this->validate($request, [
           'category_name' => 'required',
           'is_parent' => 'required'
       ]);
       $category_items = $request->all();
       Categories::create($category_items);
       $items = Categories::where('is_parent', 0)->orderBy('category_name')->get();
       Session::flash('success', 'Category added successfully!');
       return back()->withInput();
     }

     public function listOfCategory()
     {
       //$parent_category = Categories::where('is_parent', 0)->orderBy('id','dsc')->get();
       //$sub_category = Categories::where('is_parent', 1)->orderBy('category_name')->get();
       return view('admin.category.categoryList');
     }

     public function deleteCategory($id)
     {
       Categories::findOrFail($id)->delete();
       Session::flash('success', 'Category deleted successfully!');
       return redirect()->route('categoryList');
     }
     public function editCategory($id){
         $category = Categories::findOrFail($id);
         return view('admin.category.editCategory', ['category' => $category]);
     }
    public function destroy($id)
    {
        //
    }
}
