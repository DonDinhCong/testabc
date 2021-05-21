<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\MapCate;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->perPage !== null ? $request->perPage : env('NUM_PER_PAGE');
        $result = Product::where('product_title', 'like', "%{$search}%")
            ->paginate($perPage);

        return view('admin.product.index', [
            'products' => $result,
            'search' => $search,
            'perPage' => $perPage,
        ]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'brands' => Brand::all(),
            'cates' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required|max:255|string',
            'product_code' => 'required|max:255|string|unique:products',
            'product_size' => 'required|max:50|numeric',
            'product_price' => 'required|max:999999999|numeric',
            'product_avatar' => 'required',
            'product_guarantee' => 'max:99|numeric|nullable',
            'product_quantity' => 'max:999|numeric|nullable',
            'product_gender' => 'required|max:2|numeric',
            'product_color' => 'required|max:255|string',
            'product_band' => 'required|max:255|string',
            'product_glass' => 'required|max:255|string',
            'product_case' => 'required|max:255|string',
            'product_origin' => 'required|max:255|string',
            'brand_id' => 'required|max:50|numeric',
        ]);

        $target = new Product;
        $target->product_title = $request->product_title;
        $target->product_code = $request->product_code;
        $target->product_size = $request->product_size;
        $target->product_guarantee = $request->product_guarantee !== null ? $request->product_guarantee : 12;
        $target->product_price = $request->product_price;
        $target->product_gender = $request->product_gender;
        $target->product_color = $request->product_color;
        $target->product_band = $request->product_band;
        $target->product_glass = $request->product_glass;
        $target->product_case = $request->product_case;
        $target->product_origin = $request->product_origin;
        $target->product_des = $request->product_des;
        $target->brand_id = $request->brand_id;

        $newImageName = time() . '-' . $request->product_title . '.' . $request->product_avatar->extension();
        $request->product_avatar->move(public_path('images'), $newImageName);
        $target->product_avatar = $newImageName;

        $target->save();


        Gallery::create([
            'product_id' => $target->id,
            'gallery_image' => $newImageName,
        ]);

        return redirect()->route('products.cateAndGallery', $target->id);
    }

    public function cateAndGallery($product_id)
    {
        return view('admin.product.cateAndGallery', [
            'cates' => Category::all(),
            'product' => Product::find($product_id),
            'gallery' => Gallery::where('product_id', $product_id)->get(),
        ]);
    }

    public function addImage(Request $request)
    {
        $images = $request->file('gallery_image');
        $i = 1;
        if($request->hasFile('gallery_image'))
        {
            foreach ($images as $row) {
                $newImageName = $i . time() . '-' . $request->product_title . '.' . $row->extension();
                $row->move(public_path('images'), $newImageName);
                Gallery::create([
                    'product_id' => $request->product_id,
                    'gallery_image' => $newImageName,
                ]);
                $i ++;
            }
        }
        return redirect()->back()->with('success', 'Add Image Successfully!');
    }

    public function chooseCate(Request $request)
    {
        $mapCate = MapCate::where('product_id', $request->product_id)->get();
        foreach ($mapCate as $row){
            $row->delete();
        }
        foreach ($request->cate_id as $row) {
            MapCate::create([
                'product_id' => $request->product_id,
                'cate_id' => $row,
            ]);
        }
        return redirect()->back()->with('success', 'Choosed Category Successfully!');
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'product' => Product::find($id),
            'brands' => Brand::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_title' => 'required|max:255|string',
            'product_size' => 'required|max:50|numeric',
            'product_price' => 'required|max:999999999|numeric',
            'product_guarantee' => 'max:99|numeric|nullable',
            'product_quantity' => 'max:999|numeric|nullable',
            'product_gender' => 'required|max:2|numeric',
            'product_color' => 'required|max:255|string',
            'product_band' => 'required|max:255|string',
            'product_glass' => 'required|max:255|string',
            'product_case' => 'required|max:255|string',
            'product_origin' => 'required|max:255|string',
            'brand_id' => 'required|max:50|numeric',
        ]);
        $target = Product::find($id);
        if($request->product_code != $target->product_code){
            $request->validate([
                'product_code' => 'required|max:255|string|unique:products', 
            ]);
        }
        $target->product_title = $request->product_title;
        $target->product_code = $request->product_code;
        $target->product_size = $request->product_size;
        $target->product_price = $request->product_price;
        $target->product_guarantee = $request->product_guarantee !== null ? $request->product_guarantee : 0;
        $target->product_quantity = $request->product_quantity !== null ? $request->product_quantity : 0;
        $target->product_gender = $request->product_gender;
        $target->product_color = $request->product_color;
        $target->product_band = $request->product_band;
        $target->product_glass = $request->product_glass;
        $target->product_case = $request->product_case;
        $target->product_origin = $request->product_origin;
        $target->product_des = $request->product_des;
        $target->brand_id = $request->brand_id;

        if($request->product_avatar){
            $newImageName = time() . '-' . $request->product_title . '.' . $request->product_avatar->extension();
            $request->product_avatar->move(public_path('images'), $newImageName);
            $target->product_avatar = $newImageName;
        }

        $target->save();

        return redirect()->back()->with('success', 'Updated Product Successfully!');
    }

    public function destroy($id)
    {
        $target = Product::find($id);
        if (!$target) {
            return redirect()->route('cates.index')->with('error', 'Cannot Found Product!');
        }
        $target->delete();
        return redirect()->route('cates.index')->with('success', 'Delete Product Successfully!');
    }

    public function destroyImage($id)
    {
        $target = Gallery::find($id);
        if (!$target) {
            return redirect()->back()->with('error', 'Cannot Found Image!');
        }
        $target->delete();
        return redirect()->back();
    }
}
