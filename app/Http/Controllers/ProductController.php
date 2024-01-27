<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        try{
            $products = Product::with('categories:name')->paginate(10);

            return view('products.index', compact('products'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to get products, try again later...!');
        }
    }

    public function show(string $id)
    {
        try{
            $product = Product::findOrFail($id);

            return view('products.show', compact('product'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to show product details, try again later...!');
        }
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> ['required', 'unique:products,name'],
            'price'=> ['required','numeric', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'quantity'=> ['required','integer'],
            'description'=> ['nullable','string'],
            'categories' => ['sometimes', 'nullable', 'array'],
            'categories.*' => ['exists:categories,id']
        ]);

        try{
            DB::beginTransaction();
            $product = Product::create($request->only(['name','price','quantity','description']));

            if ($request->categories && count($request->categories) > 0) {
                $categories = Category::whereIn('id', $request->input('categories'))->get();
                $product->categories()->sync($categories);
            }

            DB::commit();

            return redirect()->route('product.index')->with('success','Product created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error happened while trying to create new product...!');
        }
    }
}
