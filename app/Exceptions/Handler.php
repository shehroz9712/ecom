<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
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

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {

        // $apiResponseObject = new BaseController();

        // if ($request->expectsJson()) {
        //     if ($exception instanceof MethodNotAllowedHttpException) {
        //         return $apiResponseObject->respondMethodNotAllowed(
        //             [$exception->getMessage()],
        //             false,
        //             'Method Not Allowed!'
        //         );
        //     }

        //     if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
        //         return $apiResponseObject->respondNotFound(
        //             [$exception->getMessage()],
        //             false,
        //             'Not Found!'
        //         );
        //     }
        //     if ($exception instanceof AuthorizationException || $exception instanceof AccessDeniedHttpException) {
        //         return $apiResponseObject->respondForbidden(
        //             [$exception->getMessage()],
        //             false,
        //             'Forbidden!'
        //         );
        //     }

        //     if ($exception instanceof ValidationException) {
        //         return $apiResponseObject->respondUnprocessableEntity(
        //             $exception->errors(),
        //             false,
        //             'Validation Failed!'
        //         );
        //     }

        //     if ($exception instanceof ThrottleRequestsException) {
        //         return $apiResponseObject->respondToManyAttempt(
        //             [$exception->getMessage()],
        //             false,
        //             'Too Many Requests!'
        //         );
        //     }

        //     if ($exception instanceof AuthorizationException) {
        //         return $apiResponseObject->respondForbidden(
        //             ['error' => 'You do not have permission to perform this action.'],
        //             false,
        //             'Forbidden'
        //         );
        //     }

        //     if ($exception instanceof AuthenticationException) {
        //         return $apiResponseObject->respondUnauthorized(
        //             [],
        //             false,
        //             'Unauthorized!'
        //         );
        //     }
        // }

        //dd($request->all());
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
