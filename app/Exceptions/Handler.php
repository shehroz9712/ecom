<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\v1\BaseController;
use App\Models\Page;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            $page = Page::where('slug', '404')->first();

            return response()->view('errors.404', compact('page'), 404);
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, $request) {
            iaf ($e->getStatusCode() === 500) {
                $page = Page::where('slug', '500')->first();

                return response()->view('errors.500', compact('page'), 500);
            }
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return view('error.404');
        }

        if ($this->isHttpException($exception) && $exception->getStatusCode() == 500) {
            return view('error.500');
        }

        return parent::render($request, $exception);
    }



    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ($request->expectsJson()) {
            return response()->json([
                'statusCode' => 401,
                'message' => 'Unauthenticated!',
                'status' => false,
                'errors' => ['error' => ['Unauthorized']]
            ], 401);
        }
        return redirect()->route('login')->with('message', 'You must be logged in to access this page.');
    }
}
