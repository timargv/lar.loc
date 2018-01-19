<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    //
		public function index()
		{
			# code...
			$categories	= Category::all();
			return view('admin.categories.index', ['categories' => $categories]);
		}

		public function create()
		{
			# code...
			return view('admin.categories.create');
		}

		public function store(Request $request)
		{
			# code...
			$this->validate($request, [
				'title' => 'required' // Обязатально к заполнению
			]);

			Category::create($request->all());
			return redirect()->route('categories.index');
		}

		public function edit($id)
		{
			# code...
			$category = Category::find($id);
			return view('admin.categories.edit', ['category' => $category]);
		}

		public function update(Request $request, $id)
		{
			# code...
			$this->validate($request, [
				'title' => 'required' // Обязатально к заполнению
			]);
			$category = Category::find($id);
			$category->update($request->all());
			return redirect()->route('categories.index');
		}

		public function destroy($id)
		{
			# code...
			Category::find($id)->delete();
			return redirect()->route('categories.index');
		}
}
