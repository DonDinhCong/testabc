<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->perPage !== null ? $request->perPage : env('NUM_PER_PAGE') ;
        $result = Category::where('cate_title', 'like', "%{$search}%")
            ->paginate($perPage);

        return view('admin.cate.index', [
            'cates' => $result,
            'search' => $search,
            'perPage' => $perPage,
        ]);
    }

    public function create()
    {
        return view('admin.cate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cate_title' => 'required|max:255|string',
            'cate_image' => 'required',
        ]);
        $target = new Category;
        $target->cate_title = $request->cate_title;
        $newImageName = time() . '-' . $request->cate_title . '.' . $request->cate_image->extension();
        $request->cate_image->move(public_path('images'), $newImageName);
        $target->cate_image = $newImageName;
        
        $target->save();

        return redirect()->route('cates.index')->with('success', 'Created Category Successfully');

    }

    public function edit($id)
    {
        $result = Category::find($id);
        return view('admin.cate.edit', [
            'cate' => $result,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cate_title' => 'required|max:255|string',
        ]);
        $target = Category::find($id);
        $target->cate_title = $request->cate_title;
        if ($request->cate_image) {
            $newImageName = time() . '-' . $request->cate_title . '.' . $request->cate_image->extension();
            $request->cate_image->move(public_path('images'), $newImageName);
            $target->cate_image = $newImageName;
        }

        $target->save();

        return redirect()->route('cates.index')->with('success', 'Updated Category Successfully');
    }

    public function updateStatus(Request $request, $id){
        $target = Category::find($id);
        $cate_status = $request->cate_status == 0 ? 0 : 1;
        $target->cate_status = $cate_status;
        $target->save();
        return redirect()->back()->with('success', 'Update successfully!');
    }

    public function destroy($id)
    {
        $target = Category::find($id);
        if (!$target) {
            return redirect()->route('cates.index')->with('error', 'Cannot Found Category!');
        }
        $target->delete();
        return redirect()->route('cates.index')->with('success', 'Delete Category Success!');
    }
}
