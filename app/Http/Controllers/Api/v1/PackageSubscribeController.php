<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Http\Requests\PackageSubscribeRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\PackageSubscribeRepositoryInterface;
use App\Http\Requests\PackageUsagedRequest;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PackageSubscribeController extends BaseController
{
    use AuthorizesRequests;

    protected $packageSubscribeRepository;

    public function __construct(PackageSubscribeRepositoryInterface $packageSubscribeRepository)
    {
        $this->packageSubscribeRepository = $packageSubscribeRepository;
    }

    public function subscribe(PackageSubscribeRequest $request)
    {
        ;
        $data = $this->packageSubscribeRepository->findById($request->package_id);
        if ($data !== null) {
            $this->authorize('packageSubcribe', Auth::user()); // Policy Check
        }
        if (!$data) {
            return $this->respondNotFound([], false, "Package record not found.");
        }
      
        $userDetail = $this->packageSubscribeRepository->subscribeToPackage($data->id,$request->payment_method_id);

        return $this->respondSuccess($userDetail, "Package subscribed successfully.");
    }

    public function updateUsage(PackageUsagedRequest $request)
    {

        $userDetail = $this->packageSubscribeRepository->updateUsage($request->type,$request->value);

        if ($userDetail !== null) {
            $this->authorize('update-packageUsage', Auth::user()); // Policy Check
        }

        if (!$userDetail) {
            return response()->json(['error' => 'User details not found.'], 404);
        }

        if (is_array($userDetail) && isset($userDetail['status']) && $userDetail['message'] === 'limit_reached') {
    
            if ($userDetail['status'] === false) {
                return $this->respondWithError([], false, 'You do not have tries for ' . Str::of($request->type)
                    ->replaceFirst('used_', '')
                    ->replace('_', ' ')
                    ->title());
            }
        
            if ($userDetail['status'] === true) {
                return $this->respondWithError([], false, 'Tries have been reached to the limit');
            }
        }


        return response()->json(['message' => 'Tries has been added', 'data' => $userDetail], 200);
    }

    public function userDetails()
    {
        $userDetail = $this->packageSubscribeRepository->userDetails(Auth::user()->id);

        if (!$userDetail) {
            return response()->json(['error' => 'User details not found.'], 404);
        }

        $userDetail->save();
        return response()->json(['message' => 'User details fetched successfully', 'data' => $userDetail], 200);
    }

    
}
