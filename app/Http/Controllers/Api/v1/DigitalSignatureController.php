<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\DigitalSignatureRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\DigitalSignatureRequest;
use App\Models\DigitalSignature;

class DigitalSignatureController extends BaseController
{
    use AuthorizesRequests;

    protected $digitalSignatureRepository;

    public function __construct(DigitalSignatureRepositoryInterface $digitalSignatureRepository)
    {
        $this->digitalSignatureRepository = $digitalSignatureRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', DigitalSignature::class);
        $data = $this->digitalSignatureRepository->getAll($request->page);
        return $this->respondSuccess($data, "DigitalSignature records retrieved successfully.");
    }

    public function store(DigitalSignatureRequest $request)
    {
        $this->authorize('create', DigitalSignature::class);
        $data = $this->digitalSignatureRepository->create($request->all());
        return $this->respondSuccess($data, "DigitalSignature created successfully.");
    }

    public function show($id)
    {
        $digitalSignature = $this->digitalSignatureRepository->findById($id);
        $this->authorize('view', $digitalSignature);
        return $this->respondSuccess($digitalSignature, "DigitalSignature details retrieved.");
    }

    public function destroy($id)
    {
        $digitalSignature = $this->digitalSignatureRepository->findById($id);
        $this->authorize('delete', $digitalSignature);
        $this->digitalSignatureRepository->delete($id);
        return $this->respondSuccess([], "DigitalSignature deleted successfully.");
    }
}
