<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {

        });
    }

    public function render($request, Throwable $e)
    {
        if ($request->acceptsJson()) {   //add Accept: application/json in request
            return $this->handleApiException($request, $e);
        } else {
            $retVal = parent::render($request, $e);
        }

        return $retVal;
    }

    private function handleApiException($request, Throwable $e)
    {
        $e = $this->prepareException($e);

        if ($e instanceof \Illuminate\Auth\AuthenticationException) {
            return $this->unauthenticated($request, $e);
        } elseif ($e instanceof UnauthorizedException) {
            return $this->unauthorized($request, $e);
        } elseif ($e instanceof \Illuminate\Validation\ValidationException) {
            return $this->convertValidationExceptionToResponse($e, $request);
        }

        return $this->customApiResponse($e);
    }

    private function customApiResponse(Throwable $e)
    {
        if (method_exists($e, 'getStatusCode')) {
            $statusCode = $e->getStatusCode();
        } else {
            $statusCode = 500;
        }

        $response = [];

//        switch ($statusCode) {
//            case 401:
//                $response['message'] = 'Unauthorized';
//                break;
//            case 403:
//                $response['message'] = 'Forbidden';
//                break;
//            case 404:
//                $response['message'] = 'Not Found';
//                break;
//            case 405:
//                $response['message'] = 'Method Not Allowed';
//                break;
//            default:
//                $response['message'] = $e->getMessage();
//                break;
//        }

        $response['message'] = $e->getMessage();
        if (config('app.debug')) {
            $response['trace'] = $e->getTraceAsString();
        }

        return response()->json($response, $statusCode);
    }

    private function unauthorized($request, UnauthorizedException $e)
    {
        return response()->json([
            'message' => $e->getMessage()
        ], 401);
    }
}
