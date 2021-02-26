<?php
namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Http\Requests\CategoryAddRequest;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function store(CategoryAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->category->create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name, '-')
            ]);
            DB::commit();
            return redirect()->route('categories.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Messsage: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }

    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category['parent_id']);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, CategoryAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->category->find($id)->update([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name, '-')
            ]);
            DB::commit();
            return redirect()->route('categories.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'---Line'.$exception->getLine());
        }

    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->category);
    }
}

?>
