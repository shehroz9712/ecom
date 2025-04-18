<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Repositories\Interfaces\CertificationRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\CertificationRequest;
use App\Http\Requests\CertificationFilterRequest;
use App\Models\Certification;

class CertificationController extends BaseController
{
    use AuthorizesRequests;
    protected $certificationRepository;

    public function __construct(CertificationRepositoryInterface $certificationRepository)
    {
        $this->certificationRepository = $certificationRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Certification::class);

        $data = $this->certificationRepository->getAll($request->all());
        return $this->respondSuccess($data, "Certification records retrieved successfully.");
    }

    public function getAll(CertificationFilterRequest $request)
    {
        $data = $this->certificationRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Certification All records retrieved successfully.");
    }

    public function store(CertificationRequest $request)
    {
        $this->authorize('create', Certification::class);
        $data = $this->certificationRepository->create($request->all());
        return $this->respondSuccess($data, "Certification created successfully.");
    }

    public function update(CertificationRequest $request, $id)
    {
        $certification = $this->certificationRepository->findById($id);
        if (!$certification) {
            return $this->respondNotFound([], false, "Certification record not found.");
        }
        $this->authorize('update', $certification); // Policy Check
        $data = $this->certificationRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Certification updated successfully.");
    }

    public function show($id)
    {
        $certification = $this->certificationRepository->findById($id);
        if (!$certification) {
            return $this->respondNotFound([], false, "Certification record not found.");
        }
        $this->authorize('view', $certification);
        return $this->respondSuccess($certification, "Certification details retrieved.");
    }

    public function destroy($id)
    {
        $certification = $this->certificationRepository->findById($id);
        if (!$certification) {
            return $this->respondNotFound([], false, "Certification record not found.");
        }
        $this->authorize('delete', $certification);
        $this->certificationRepository->delete($id);
        return $this->respondSuccess([], "Certification deleted successfully.");
    }
}
