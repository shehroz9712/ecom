<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\CustomSectionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CustomSectionRequest;
use App\Http\Requests\CustomSectionFilterRequest;
use App\Models\CustomSection;

class CustomSectionController extends BaseController
{
    use AuthorizesRequests;

    protected $customSectionRepository;

    public function __construct(CustomSectionRepositoryInterface $customSectionRepository)
    {
        $this->customSectionRepository = $customSectionRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', CustomSection::class);
        $data = $this->customSectionRepository->getAll($request->all());
        return $this->respondSuccess($data, "Custom Section records retrieved successfully.");
    }

    public function getAll(CustomSectionFilterRequest $request)
    {
        $data = $this->customSectionRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Custom Section All records retrieved successfully.");
    }

    public function store(CustomSectionRequest $request)
    {
        $this->authorize('create', CustomSection::class);
        $data = $this->customSectionRepository->create($request->all());
        return $this->respondSuccess($data, "Custom Section created successfully.");
    }

    public function update(CustomSectionRequest $request, $id)
    {
        $customSection = $this->customSectionRepository->findById($id);
        if (!$customSection) {
            return $this->respondNotFound([], false, "Custom section record not found.");
        }
        $this->authorize('update', $customSection); // Policy Check
        $data = $this->customSectionRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Custom Section updated successfully.");
    }

    public function show($id)
    {
        $customSection = $this->customSectionRepository->findById($id);
        if (!$customSection) {
            return $this->respondNotFound([], false, "Custom section record not found.");
        }
        $this->authorize('view', $customSection);
        return $this->respondSuccess($customSection, "Custom Section details retrieved.");
    }

    public function destroy($id)
    {
        $customSection = $this->customSectionRepository->findById($id);
        if (!$customSection) {
            return $this->respondNotFound([], false, "Custom section record not found.");
        }
        $this->authorize('delete', $customSection);
        $this->customSectionRepository->delete($id);
        return $this->respondSuccess([], "Custom Section deleted successfully.");
    }
}
