<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use App\Http\Requests\LanguageFilterRequest;
use App\Models\Language;

class LanguageController extends BaseController
{
    use AuthorizesRequests;

    protected $languageRepository;

    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Language::class);
        $data = $this->languageRepository->getAll($request->all());
        return $this->respondSuccess($data, "Language records retrieved successfully.");
    }

    public function getAll(LanguageFilterRequest $request)
    {
        $data = $this->languageRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Language All records retrieved successfully.");
    }

    public function store(LanguageRequest $request)
    {
        $this->authorize('create', Language::class);
        $data = $this->languageRepository->create($request->all());
        return $this->respondSuccess($data, "Language created successfully.");
    }

    public function update(LanguageRequest $request, $id)
    {
        $language = $this->languageRepository->findById($id);
        if (!$language) {
            return $this->respondNotFound([], false, "Language record not found.");
        }
        $this->authorize('update', $language); // Policy Check
        $data = $this->languageRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Language updated successfully.");
    }

    public function show($id)
    {
        $language = $this->languageRepository->findById($id);
        if (!$language) {
            return $this->respondNotFound([], false, "Language record not found.");
        }
        $this->authorize('view', $language);
        return $this->respondSuccess($language, "Language details retrieved.");
    }

    public function destroy($id)
    {
        $language = $this->languageRepository->findById($id);
        if (!$language) {
            return $this->respondNotFound([], false, "Language record not found.");
        }
        $this->authorize('delete', $language);
        $this->languageRepository->delete($id);
        return $this->respondSuccess([], "Language deleted successfully.");
    }
}
