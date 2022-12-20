<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // make marco success response
        Response::macro('success', function ($data = null, $message = null, $code = 200) {
            return response()->json([
                'status' => 'success',
                'status_code' => 1,
                'message' => $message,
                'data' => $data,
            ], $code);
        });
        // make marco error response
        Response::macro('error', function ($message = null, $code = 400) {
            return response()->json([
                'status' => 'error',
                'status_code' => 0,
                'message' => $message,
            ], $code);
        });

    }
}
