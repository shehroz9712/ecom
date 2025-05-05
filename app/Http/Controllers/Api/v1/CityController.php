<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Http\Requests\CityFilterRequest;
use App\Models\City;

class CityController extends BaseController
{
    use AuthorizesRequests;

    protected $cityRepository;

    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index(CityFilterRequest $request)
    {
        $this->authorize('viewAny', City::class);
        $data = $this->cityRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "City Active records retrieved successfully.");
    }

    public function getAll(CityFilterRequest $request)
    {
        $data = $this->cityRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "City All records retrieved successfully.");
    }

    public function store(CityRequest $request)
    {
        $this->authorize('create', City::class);
        $data = $this->cityRepository->create($request->all());
        return $this->respondSuccess($data, "City created successfully.");
    }


    public function update(CityRequest $request, $id)
    {
        $city = $this->cityRepository->findById($id);
        $this->authorize('update', $city);
        $data = $this->cityRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "City updated successfully.");
    }
    public function show($id)
    {
        $city = $this->cityRepository->findById($id);
        $this->authorize('view', $city);
        return $this->respondSuccess($city, "City details retrieved.");
    }

    public function destroy($id)
    {
        $city = $this->cityRepository->findById($id);
        $this->authorize('delete', $city);
        $this->cityRepository->delete($id);
        return $this->respondSuccess($city, "City deleted successfully.");
    }
}
