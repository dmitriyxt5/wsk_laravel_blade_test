<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admin() {
        $categories = Category::get();
        return view('admin', ['categories' => $categories]);
    }

    public function category(Request $request) {
        $category = Category::find($request['id']);

        return view('admin.category', ['category' => $category]);
    }
    public function editCategory(Request $request) {
        $category = Category::find($request->input('id'));
        if ($category) {
            $category->update([
                'name' => $request->input('name'),
            ]);
        }
        return redirect('/admin');
    }
}
