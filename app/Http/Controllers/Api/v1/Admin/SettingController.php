<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends BaseController
{
    use AuthorizesRequests;

    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Setting::class);
        $data = $this->settingRepository->getAll($request->page);
        return $this->respondSuccess($data, "Setting records retrieved successfully.");
    }

    public function update(SettingRequest $request)
    {
        $this->authorize('viewAny', Setting::class);
        $this->settingRepository->storeOrUpdate($request->all());
        $data = $this->settingRepository->getAll($request->page);
        return $this->respondSuccess($data, "Settings updated successfully.");
    }

    public function destroy($id)
    {
        $setting = $this->settingRepository->findById($id);
        if(!$setting){
            return $this->respondForbidden([], false, 'Settings key not found.');
        }
        $this->authorize('delete', $setting);
        if ($setting->deletable != 1) {
            return $this->respondForbidden([], false, 'Settings key is not deletable.');
        }
        if ($setting) {
            $this->settingRepository->delete($id);
            return $this->respondSuccess([], "Settings key deleted successfully.");
        } 
    }
}
