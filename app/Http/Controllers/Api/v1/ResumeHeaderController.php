<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\ResumeHeaderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ResumeHeaderRequest;
use App\Http\Requests\ResumeHeaderFilterRequest;
use App\Models\ResumeHeader;

class ResumeHeaderController extends BaseController
{
    use AuthorizesRequests;

    protected $resumeHeaderRepository;

    public function __construct(ResumeHeaderRepositoryInterface $resumeHeaderRepository)
    {
        $this->resumeHeaderRepository = $resumeHeaderRepository;
    }

    public function index(ResumeHeaderFilterRequest $request)
    {
        $this->authorize('viewAny', ResumeHeader::class);
        $data = $this->resumeHeaderRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "Resume Header Active records retrieved successfully.");
    }

    public function getAll(ResumeHeaderFilterRequest $request)
    {
        $data = $this->resumeHeaderRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Resume Header All records retrieved successfully.");
    }

    public function store(ResumeHeaderRequest $request)
    {
        $this->authorize('create', ResumeHeader::class);
        $data = $this->resumeHeaderRepository->create($request->all());
        return $this->respondSuccess($data, "Resume Header created successfully.");
    }

    public function update(ResumeHeaderRequest $request, $id)
    {
        $resumeHeader = $this->resumeHeaderRepository->findById($id);
        if (!$resumeHeader) {
            return $this->respondNotFound([], false, "Resume header record not found.");
        }
        $this->authorize('update', $resumeHeader);
        $data = $this->resumeHeaderRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Resume Header updated successfully.");
    }

    public function show($id)
    {
        $resumeHeader = $this->resumeHeaderRepository->findById($id);
        if (!$resumeHeader) {
            return $this->respondNotFound([], false, "Resume header record not found.");
        }
        $this->authorize('view', $resumeHeader);
        return $this->respondSuccess($resumeHeader, "Resume Header details retrieved.");
    }

    public function destroy($id)
    {
        $resumeHeader = $this->resumeHeaderRepository->findById($id);
        $this->authorize('delete', $resumeHeader);
        $this->resumeHeaderRepository->delete($id);
        return $this->respondSuccess($resumeHeader, "Resume Header deleted successfully.");
    }
}
