<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\CountryFilterRequest;
use App\Models\Country;

class CountryController extends BaseController
{
    use AuthorizesRequests;

    protected $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index(CountryFilterRequest $request)
    {
        $this->authorize('viewAny', Country::class);
        $data = $this->countryRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "Country Active records retrieved successfully.");
    }

    public function getAll(CountryFilterRequest $request)
    {
        $data = $this->countryRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Country All records retrieved successfully.");
    }

    public function store(CountryRequest $request)
    {
        $this->authorize('create', Country::class);
        $data = $this->countryRepository->create($request->all());
        return $this->respondSuccess($data, "Country created successfully.");
    }


    public function update(CountryRequest $request, $id)
    {
        $country = $this->countryRepository->findById($id);
        $this->authorize('update', $country);
        $data = $this->countryRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "Country updated successfully.");
    }
    public function show($id)
    {
        $country = $this->countryRepository->findById($id);
        $this->authorize('view', $country);
        return $this->respondSuccess($country, "Country details retrieved.");
    }

    public function destroy($id)
    {
        $country = $this->countryRepository->findById($id);
        $this->authorize('delete', $country);
        $this->countryRepository->delete($id);
        return $this->respondSuccess($country, "Country deleted successfully.");
    }
}
