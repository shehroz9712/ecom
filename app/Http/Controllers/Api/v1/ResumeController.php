<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Repositories\Interfaces\ResumeRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\ResumeRequest;
use App\Models\Resume;

class ResumeController extends BaseController
{
    use AuthorizesRequests;
    protected $resumeRepository;

    public function __construct(ResumeRepositoryInterface $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Resume::class);
        $data = $this->resumeRepository->getAll($request->all());
        return $this->respondSuccess($data, "Resume records retrieved successfully.");
    }

    public function store(ResumeRequest $request)
    {
        $this->authorize('create', Resume::class);
        $data = $this->resumeRepository->create($request->all());
        return $this->respondSuccess($data, "Resume created successfully.");
    }

    public function show($id)
    {
        $resume = $this->resumeRepository->findById($id);
        if (!$resume) {
            return $this->respondNotFound([], false, "Resume record not found.");
        }
        $this->authorize('view', $resume);
        return $this->respondSuccess($resume, "Resume details retrieved.");
    }

    public function destroy($id)
    {
        $resume = $this->resumeRepository->findById($id);
        if (!$resume) {
            return $this->respondNotFound([], false, "Resume record not found.");
        }
        $this->authorize('delete', $resume);
        $this->resumeRepository->delete($id);
        return $this->respondSuccess([], "Resume deleted successfully.");
    }
}
