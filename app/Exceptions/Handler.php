<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // return parent::render($request, $exception);
        // echo $exception;
        if($request->wantsJson() || $request->expectsJson() || $request->isJson()) {
            // add Accept: application/json in request 
            return $this->handleApiException($request, $exception);
        }
        else {
            return parent::render($request, $exception);
        }

        // Original statement 
        // return parent::render($request, $exception);
    }


    public function handleApiException($request, Exception $exception) {
        $exception = $this->prepareException($exception);
        // echo $exception;
        if($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
            // echo "yes";
            $exception = $exception->getResponse();
        }

        if($exception instanceof \Illuminate\Auth\AuthenticationException) {
            $exception = $this->unauthenticated($request, $exception);
        }
        if($exception instanceof \Illuminate\Validation\ValidationException) {
            $exception = $this->convertValidationExceptionToResponse($exception, $response);
        }
        // echo $exception;
        return $this->customApiResponse($exception);
    }


    private function customApiResponse($exception) {
        // echo $exception->getMessage();
        if(method_exists($exception, 'getStatusCode')) {
            
            $statusCode = $exception->getStatusCode();
            // echo $statusCode;
        }
        else {
            $statusCode = 500;
        }
        $response = [];
        switch($statusCode) {
            case 401:
                $response['message'] = 'Unauthorized';
                break; 

            case 403: 
                $response['message'] = 'Forbidden';
            break; 

            case 404: 
                $response['message'] = 'Not Found';
            break;

            case 405: 
                $response['message'] = 'Method not Allowed.';
            break; 

            case 422: 
                $response['message'] = $exception->original['message'];
                $response['errors'] = $exception->original['errors'];
            break;

            case 500:
                $response['message'] = $exception->getMessage();
                // $response['errors'] = $exception;
            break;


            default: 
                
                $response['message'] = ($statusCode === 500) ? 'Something went wrong.': $exception->getMessage();
            break;

        }
        

        if(config('app.debug')) {
            $response['trace'] = $exception->getTrace();
            $response['code'] = $exception->getCode();
        }
        // return $response;

        $response['status'] = $statusCode;
        
        return response()->json($response, $statusCode);
    }
}


