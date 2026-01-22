<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $jsonPath = 'cms/products.json';

    protected function getProducts()
    {
        $content = Storage::get($this->jsonPath);
        return json_decode($content, true) ?? [];
    }

    protected function saveProducts($products)
    {
        Storage::put($this->jsonPath, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function index()
    {
        $products = $this->getProducts();
        return view('admin.pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.pages.products.form', ['product' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $products = $this->getProducts();
        
        // Generate new ID
        $maxId = 0;
        foreach ($products as $product) {
            if ($product['id'] > $maxId) {
                $maxId = $product['id'];
            }
        }
        
        $tags = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];
        
        $newProduct = [
            'id' => $maxId + 1,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'link' => $request->link,
            'tags' => $tags,
            'image' => 'images/placeholder.jpg',
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $newProduct['image'] = 'uploads/products/' . $filename;
        }

        $products[] = $newProduct;
        $this->saveProducts($products);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $products = $this->getProducts();
        $product = collect($products)->firstWhere('id', (int)$id);
        
        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Produk tidak ditemukan!');
        }

        return view('admin.pages.products.form', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $products = $this->getProducts();
        $tags = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];
        
        foreach ($products as $key => $product) {
            if ($product['id'] == (int)$id) {
                $products[$key]['title'] = $request->title;
                $products[$key]['subtitle'] = $request->subtitle;
                $products[$key]['description'] = $request->description;
                $products[$key]['link'] = $request->link;
                $products[$key]['tags'] = $tags;

                // Handle image upload
                if ($request->hasFile('image')) {
                    if (isset($product['image']) && str_starts_with($product['image'], 'uploads/')) {
                        $oldPath = public_path($product['image']);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    
                    $file = $request->file('image');
                    $filename = 'product_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/products'), $filename);
                    $products[$key]['image'] = 'uploads/products/' . $filename;
                }
                break;
            }
        }

        $this->saveProducts($products);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $products = $this->getProducts();
        
        foreach ($products as $key => $product) {
            if ($product['id'] == (int)$id) {
                if (isset($product['image']) && str_starts_with($product['image'], 'uploads/')) {
                    $path = public_path($product['image']);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                unset($products[$key]);
                break;
            }
        }

        $products = array_values($products);
        $this->saveProducts($products);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
