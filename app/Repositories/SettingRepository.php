<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class SettingRepository implements SettingRepositoryInterface
{
    public function getAll($page = null)
    {
        return $page ? Setting::paginate($page) : Setting::all();
    }

    public function getActiveAll($page = null)
    {
        return $page ? Setting::active()->paginate($page) : Setting::active()->latest()->get();
    }

    public function findById($id)
    {
        return Setting::find($id);
    }

    public function storeOrUpdate(array $data)
    {
        foreach ($data as $key => $value) {
            $existingSetting = Setting::where('key', $key)->first();

            if ($existingSetting) {
                $existingSetting->update([
                    'value' => $value,
                    'updated_by' => Auth::user()->id,
                ]);
            } else {
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                    'deletable' => 1,
                    'status' => 1,
                ]);
            }
        }
    }

    public function delete($id)
    {
        $record = Setting::find($id);
        if (!$record) {
            return false;
        }
        if ($record->deletable != 1) {
            return false;
        }
        return $record->delete();
    }
}
