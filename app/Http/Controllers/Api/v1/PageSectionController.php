<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Http\Requests\PageSectionFilterRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\PageSectionRepositoryInterface;
use App\Http\Requests\PageSectionRequest;
use App\Models\PageSection;

class PageSectionController extends BaseController
{
    use AuthorizesRequests;

    protected $pageSectionRepository;

    public function __construct(PageSectionRepositoryInterface $pageSectionRepository)
    {
        $this->pageSectionRepository = $pageSectionRepository;
    }


    public function index(PageSectionFilterRequest $request)
    {
        $this->authorize('viewAny', PageSection::class);

        $data = $this->pageSectionRepository->getAll(
            $request->page,
            $request->limit,
            $request->search ?? [],
            $request->where ?? [],
            $request->order ?? 'created_at',
            $request->direction ?? 'DESC'
        );
        return $this->respondSuccess($data, "Page sections records retrieved successfully.");
    }

    public function store(PageSectionRequest $request)
    {
        $this->authorize('create', PageSection::class);
        $data = $this->pageSectionRepository->create($request->all());
        return $this->respondSuccess($data, "Page section created successfully.");
    }

    public function show($id)
    {
        $pageSection = $this->pageSectionRepository->findById($id);
        if (!$pageSection) {
            return $this->respondNotFound([], false, "Page section record not found.");
        }
        $this->authorize('view', $pageSection);
        return $this->respondSuccess($pageSection, "Page section details retrieved.");
    }

    public function update(PageSectionRequest $request, $id)
    {
        $pageSection = $this->pageSectionRepository->findById($id);
        if (!$pageSection) {
            return $this->respondNotFound([], false, "Page section record not found.");
        }
        $this->authorize('update', $pageSection);
        $data = $this->pageSectionRepository->update($id, $request->validated());

        return $this->respondSuccess($data, "Page section record updated successfully.");
    }

    public function destroy($id)
    {
        $pageSection = $this->pageSectionRepository->findById($id);
        if (!$pageSection) {
            return $this->respondNotFound([], false, "Page section record not found.");
        }
        $this->authorize('delete', $pageSection);
        $this->pageSectionRepository->delete($id);
        return $this->respondSuccess([], "Page section deleted successfully.");
    }
}
