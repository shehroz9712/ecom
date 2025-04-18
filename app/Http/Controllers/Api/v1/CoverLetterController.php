<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\CoverLetterRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CoverLetterRequest;
use App\Models\CoverLetter;

class CoverLetterController extends BaseController
{
    use AuthorizesRequests;

    protected $coverLetterRepository;

    public function __construct(CoverLetterRepositoryInterface $coverLetterRepository)
    {
        $this->coverLetterRepository = $coverLetterRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', CoverLetter::class);
        $data = $this->coverLetterRepository->getAll($request->all());
        return $this->respondSuccess($data, "Cover Letter records retrieved successfully.");
    }

    public function store(CoverLetterRequest $request)
    {
        $this->authorize('create', CoverLetter::class);
        $data = $this->coverLetterRepository->create($request->all());
        return $this->respondSuccess($data, "Cover Letter created successfully.");
    }

    public function update(CoverLetterRequest $request, $id)
    {
        $coverLetter = $this->coverLetterRepository->findById($id);
        if (!$coverLetter) {
            return $this->respondNotFound([], false, "Cover Letter record not found.");
        }
        $this->authorize('update', $coverLetter);
        $data = $this->coverLetterRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Cover Letter updated successfully.");
    }

    public function show($id)
    {
        $coverLetter = $this->coverLetterRepository->findById($id);
        if (!$coverLetter) {
            return $this->respondNotFound([], false, "Cover Letter record not found.");
        }
        $this->authorize('view', $coverLetter);
        return $this->respondSuccess($coverLetter, "Cover Letter details retrieved.");
    }

    public function destroy($id)
    {
        $coverLetter = $this->coverLetterRepository->findById($id);
        if (!$coverLetter) {
            return $this->respondNotFound([], false, "Cover Letter record not found.");
        }
        $this->authorize('delete', $coverLetter);
        $this->coverLetterRepository->delete($id);
        return $this->respondSuccess([], "Cover Letter deleted successfully.");
    }
}
