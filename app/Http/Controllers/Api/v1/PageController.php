<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Http\Requests\PageFilterRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\PageRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;

class PageController extends BaseController
{
    use AuthorizesRequests;

    protected $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index(PageFilterRequest $request)
    {
        $this->authorize('viewAny', Page::class);

        $data = $this->pageRepository->getAll(
            $request->page,
            $request->limit,
            $request->search ?? [],
            $request->where ?? [],
            $request->order ?? 'created_at',
            $request->direction ?? 'DESC'
        );
        return $this->respondSuccess($data, "Page records retrieved successfully.");
    }

    public function store(PageRequest $request)
    {
        $this->authorize('create', Page::class);
        $data = $this->pageRepository->create($request->validated());
        return $this->respondSuccess($data, "Page created successfully.");
    }

    public function show($id)
    {
        $page = $this->pageRepository->findById($id);
        if (!$page) {
            return $this->respondNotFound([], false, "Page record not found.");
        }
        $this->authorize('view', $page);
        return $this->respondSuccess($page, "Page details retrieved.");
    }

    public function update(PageUpdateRequest $request, $id)
    {
        $page = $this->pageRepository->findById($id);

        
        if (!$page) {
            return $this->respondNotFound([], false, "Page record not found.");
        }
        $this->authorize('update', $page);
        $data = $this->pageRepository->update($id, $request->validated());
        
        return $this->respondSuccess($data, "Page record updated successfully.");
    }

    public function destroy($id)
    {
        $page = $this->pageRepository->findById($id);
        if (!$page) {
            return $this->respondNotFound([], false, "Page record not found.");
        }
        $this->authorize('delete', $page);
        $this->pageRepository->delete($id);
        return $this->respondSuccess([], "Page deleted successfully.");
    }
}
