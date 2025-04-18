<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Models\Cart;

class CartController extends BaseController
{
    use AuthorizesRequests;

    protected $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Cart::class);
        $data = $this->cartRepository->getAll($request->page);
        return $this->respondSuccess($data, "Cart records retrieved successfully.");
    }

    public function store(CartRequest $request)
    {
        $this->authorize('create', Cart::class);
        $data = $this->cartRepository->create($request->all());
        return $this->respondSuccess($data, "Cart created successfully.");
    }

    public function show($id)
    {
        $cart = $this->cartRepository->findById($id);
        if (!$cart) {
            return $this->respondNotFound([], false, "Cart item record not found.");
        }
        $this->authorize('view', $cart);
        return $this->respondSuccess($cart, "Cart details retrieved.");
    }

    public function destroy($id)
    {
        $cart = $this->cartRepository->findById($id);
        if (!$cart) {
            return $this->respondNotFound([], false, "Cart item record not found.");
        }
        $this->authorize('delete', $cart);
        $this->cartRepository->delete($id);
        return $this->respondSuccess([], "Cart item removed successfully.");
    }
}
