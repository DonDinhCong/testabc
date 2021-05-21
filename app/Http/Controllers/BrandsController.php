<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->perPage !== null ? $request->perPage : env('NUM_PER_PAGE') ;
        $result = Brand::where('brand_title', 'like', "%{$search}%")
            ->paginate($perPage);

        return view('admin.brand.index', [
            'brands' => $result,
            'search' => $search,
            'perPage' => $perPage,
        ]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_title' => 'required|max:255|string',
            'brand_des' => 'required|max:255|string',
            'brand_image' => 'required',
        ]);
        $target = new Brand;
        $target->brand_title = $request->brand_title;
        $target->brand_des = $request->brand_des;
        $newImageName = time() . '-' . $request->brand_title . '.' . $request->brand_image->extension();
        $request->brand_image->move(public_path('images'), $newImageName);
        $target->brand_image = $newImageName;
        
        $target->save();

        return redirect()->route('brands.index')->with('success', 'Created Brand Successfully');

    }

    public function edit($id)
    {
        $result = Brand::find($id);
        return view('admin.brand.edit', [
            'brand' => $result,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_title' => 'required|max:255|string',
            'brand_des' => 'required|max:255|string',
        ]);
        $target = Brand::find($id);
        $target->brand_title = $request->brand_title;
        $target->brand_des = $request->brand_des;
        if($request->brand_image){
            $newImageName = time() . '-' . $request->brand_title . '.' . $request->brand_image->extension();
            $request->brand_image->move(public_path('images'), $newImageName);
            $target->brand_image = $newImageName;
        }

        $target->save();

        return redirect()->route('brands.index')->with('success', 'Updated Brand Successfully');
    }

    public function destroy($id)
    {
        $target = Brand::find($id);
        if (!$target) {
            return redirect()->route('brands.index')->with('error', 'Cannot Found Brand!');
        }
        $target->delete();
        return redirect()->route('brands.index')->with('success', 'Delete Brand Success!');
    }
}
