<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderAdminController extends Controller
{
    use StorageImageFile,DeleteModelTrait;
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders=$this->slider->latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $data_insert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $data_image_slider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($data_image_slider)) {
                $data_insert['image_name'] = $data_image_slider['file_name'];
                $data_insert['image_path'] = $data_image_slider['file_path'];
            }
            $this->slider->create($data_insert);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }

    }

    public function update(SliderAddRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data_update = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $data_image_slider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($data_image_slider)) {
                $data_update['image_name'] = $data_image_slider['file_name'];
                $data_update['image_path'] = $data_image_slider['file_path'];
            }
            $this->slider->find($id)->update($data_update);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $slider=$this->slider->find($id);

        return view('admin.slider.edit',compact('slider'));
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->slider);
    }

}
