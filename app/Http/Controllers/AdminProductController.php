<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class AdminProductController extends Controller
{
    use StorageImageFile, DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag,
                                ProductTag $productTag)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->tag = $tag;

    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];
            $dataUpFeatureImage = $this->storageTraitUpload($request, 'feature_image', 'product');
            if (!empty($dataUpFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUpFeatureImage['file_name'];
                $dataProductCreate['feature_image'] = $dataUpFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);

            //insert data to product image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                    // dd($dataProductImageDetail);
                }
            }
            //insert comment tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line ' . $exception->getFile());
        }

    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(ProductAddRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];
            $dataUpFeatureImage = $this->storageTraitUpload($request, 'feature_image', 'product');
            if (!empty($dataUpFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUpFeatureImage['file_name'];
                $dataProductUpdate['feature_image'] = $dataUpFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //insert data to product image
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                    // dd($dataProductImageDetail);
                }
            }
            //insert comment tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line ' . $exception->getFile());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }
}
