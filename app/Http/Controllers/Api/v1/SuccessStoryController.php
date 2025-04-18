<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Http\Requests\SuccessStoryFilterRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\SuccessStoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SuccessStoryRequest;
use App\Models\SuccessStory;

class SuccessStoryController extends BaseController
{
    use AuthorizesRequests;

    protected $successStoryRepository;

    public function __construct(SuccessStoryRepositoryInterface $successStoryRepository)
    {
        $this->successStoryRepository = $successStoryRepository;
    }

    public function index(SuccessStoryFilterRequest $request)
    {
        $this->authorize('viewAny', SuccessStory::class);
        $data = $this->successStoryRepository->getAll(
            $request->page,
            $request->limit,
            $request->search ?? [],
            $request->where ?? [],
            $request->order ?? 'created_at',
            $request->direction ?? 'DESC'
        );
        return $this->respondSuccess($data, "Success story records retrieved successfully.");
    }

    public function store(SuccessStoryRequest $request)
    {
        $this->authorize('create', SuccessStory::class);
        $data = $this->successStoryRepository->create($request->all());
        return $this->respondSuccess($data, "Success story created successfully.");
    }

    public function show($id)
    {
        $successStory = $this->successStoryRepository->findById($id);
        if (!$successStory) {
            return $this->respondNotFound([], false, "Success story record not found.");
        }
        $this->authorize('view', $successStory);
        return $this->respondSuccess($successStory, "Success story details retrieved.");
    }

    public function update(SuccessStoryRequest $request, $id)
    {
        $successStory = $this->successStoryRepository->findById($id);
        if (!$successStory) {
            return $this->respondNotFound([], false, "Success story record not found.");
        }
        $this->authorize('update', $successStory); // Policy Check
        $successStory = $this->successStoryRepository->update($id, $request->all());
        return $this->respondSuccess($successStory, "Success story updated successfully.");
    }

    public function destroy($id)
    {
        $successStory = $this->successStoryRepository->findById($id);
        if (!$successStory) {
            return $this->respondNotFound([], false, "Success story record not found.");
        }
        $this->authorize('delete', $successStory);
        $this->successStoryRepository->delete($id);
        return $this->respondSuccess([], "Success story deleted successfully.");
    }
}
