<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingAdmincontroller extends Controller
{
    use DeleteModelTrait;
    private $setting;

    public function __construct(Setting $setting)
    {

        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->setting->create([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
                'type' => $request->type
            ]);
            DB::commit();
            return redirect()->route('setting.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(SettingAddRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->setting->find($id)->update([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
            ]);
            DB::commit();
            return redirect()->route('setting.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}
