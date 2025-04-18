<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\SummaryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SummaryRequest;
use App\Http\Requests\SummaryFilterRequest;
use App\Models\Summary;

class SummaryController extends BaseController
{
    use AuthorizesRequests;

    protected $summaryRepository;

    public function __construct(SummaryRepositoryInterface $summaryRepository)
    {
        $this->summaryRepository = $summaryRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Summary::class);
        $data = $this->summaryRepository->getAll($request->all());
        return $this->respondSuccess($data, "Summary records retrieved successfully.");
    }

    public function getAll(SummaryFilterRequest $request)
    {
        $data = $this->summaryRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Summary All records retrieved successfully.");
    }

    public function store(SummaryRequest $request)
    {
        $this->authorize('create', Summary::class);
        $data = $this->summaryRepository->create($request->all());
        return $this->respondSuccess($data, "Summary created successfully.");
    }

    public function update(SummaryRequest $request, $id)
    {
        $summary = $this->summaryRepository->findById($id);
        if (!$summary) {
            return $this->respondNotFound([], false, "Summary record not found.");
        }
        $this->authorize('update', $summary);
        $data = $this->summaryRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Summary updated successfully.");
    }

    public function show($id)
    {
        $summary = $this->summaryRepository->findById($id);
        if (!$summary) {
            return $this->respondNotFound([], false, "Summary record not found.");
        }
        $this->authorize('view', $summary);
        return $this->respondSuccess($summary, "Summary details retrieved.");
    }

    public function destroy($id)
    {
        $summary = $this->summaryRepository->findById($id);
        if (!$summary) {
            return $this->respondNotFound([], false, "Summary record not found.");
        }
        $this->authorize('delete', $summary);
        $this->summaryRepository->delete($id);
        return $this->respondSuccess([], "Summary deleted successfully.");
    }
}
