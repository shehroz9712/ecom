<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\PortfolioRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\PortfolioFilterRequest;
use App\Models\Portfolio;

class PortfolioController extends BaseController
{
    use AuthorizesRequests;

    protected $portfolioRepository;

    public function __construct(PortfolioRepositoryInterface $portfolioRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Portfolio::class);
        $data = $this->portfolioRepository->getAll($request->all());
        return $this->respondSuccess($data, "Portfolio records retrieved successfully.");
    }

    public function getAll(PortfolioFilterRequest $request)
    {
        $data = $this->portfolioRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Portfolio All records retrieved successfully.");
    }

    public function store(PortfolioRequest $request)
    {
        $this->authorize('create', Portfolio::class);
        $data = $this->portfolioRepository->create($request->all());
        return $this->respondSuccess($data, "Portfolio created successfully.");
    }

    public function update(PortfolioRequest $request, $id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        $this->authorize('update', $portfolio);
        $data = $this->portfolioRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Portfolio updated successfully.");
    }

    public function show($id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        $this->authorize('view', $portfolio);
        return $this->respondSuccess($portfolio, "Portfolio details retrieved.");
    }

    public function destroy($id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        $this->authorize('delete', $portfolio);
        $this->portfolioRepository->delete($id);
        return $this->respondSuccess([], "Portfolio deleted successfully.");
    }
}
