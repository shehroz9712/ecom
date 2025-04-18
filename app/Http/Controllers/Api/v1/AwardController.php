<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Repositories\Interfaces\AwardRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\AwardRequest;
use App\Http\Requests\AwardFilterRequest;
use App\Models\Award;

class AwardController extends BaseController
{
    use AuthorizesRequests;
    protected $awardRepository;

    public function __construct(AwardRepositoryInterface $awardRepository)
    {
        $this->awardRepository = $awardRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Award::class);
        $data = $this->awardRepository->getAll($request->all());
        return $this->respondSuccess($data, "Award records retrieved successfully.");
    }

    public function getAll(AwardFilterRequest $request)
    {
        $data = $this->awardRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Award All records retrieved successfully.");
    }

    public function store(AwardRequest $request)
    {
        $this->authorize('create', Award::class);
        $data = $this->awardRepository->create($request->all());
        return $this->respondSuccess($data, "Award created successfully.");
    }

    public function update(AwardRequest $request, $id)
    {
        $award = $this->awardRepository->findById($id);
        if (!$award) {
            return $this->respondNotFound([], false, "Award record not found.");
        }
        $this->authorize('update', $award); // Policy Check
        $data = $this->awardRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Award updated successfully.");
    }

    public function show($id)
    {
        $award = $this->awardRepository->findById($id);
        if (!$award) {
            return $this->respondNotFound([], false, "Award record not found.");
        }
        $this->authorize('view', $award);
        return $this->respondSuccess($award, "Award details retrieved.");
    }

    public function destroy($id)
    {
        $award = $this->awardRepository->findById($id);
        if (!$award) {
            return $this->respondNotFound([], false, "Award record not found.");
        }
        $this->authorize('delete', $award);
        $this->awardRepository->delete($id);
        return $this->respondSuccess([], "Award deleted successfully.");
    }
}
