<?php

use App\Middleware\AuthenticateDatahubCallback;
use App\Middleware\AuthenticateLessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('public')->group(function () {
    Route::prefix('lessee')->group(function () {
        Route::post('unique-mobile', [App\Http\Controllers\LesseeController::class, 'uniqueMobile']);
        Route::post('verification-code', [App\Http\Controllers\LesseeController::class, 'verificationCode']);
        Route::post('register', [App\Http\Controllers\LesseeController::class, 'register']);
        Route::post('forgot-password', [App\Http\Controllers\LesseeController::class, 'forgotPassword']);
    });
    Route::prefix('platform')->group(function () {
        Route::get('index', [App\Http\Controllers\PlatformController::class, 'index']);
        Route::get('group/{platformId}', [App\Http\Controllers\APIGroupController::class, 'index']);
        Route::get('api/{id}', [App\Http\Controllers\APIController::class, 'show']);
        Route::get('api/{platformId}/{groupId}', [App\Http\Controllers\APIController::class, 'index']);
    });
});

Route::middleware('auth:api')->prefix('lessee')->group(function () {
    Route::get('datahub/copy/{datahubId}', [App\Http\Lessee\DatahubController::class, 'copy']);
    Route::get('datahub/start/{datahubId}', [App\Http\Lessee\DatahubController::class, 'start']);
    Route::get('datahub/stop/{datahubId}', [App\Http\Lessee\DatahubController::class, 'stop']);
    Route::apiResources([
        'connector' => App\Http\Lessee\ConnectorController::class,
        'storage' => App\Http\Lessee\StorageController::class,
        'mapping-category' => App\Http\Lessee\MappingCategoryController::class,
        'mapping/{categoryId}' => App\Http\Lessee\MappingController::class,
        'datahub' => App\Http\Lessee\DatahubController::class,
        'datahub-log/{datahubId}' => App\Http\Lessee\DatahubLogController::class,
        'datahub-data/{datahubId}' => App\Http\Lessee\DatahubDataController::class,
        'datahub-queue/{datahubId}' => App\Http\Lessee\DatahubQueueController::class,
        'datahub-source/{datahubId}' => App\Http\Lessee\DatahubSourceController::class,
        'datahub-target/{datahubId}' => App\Http\Lessee\DatahubTargetController::class,
    ]);
    Route::prefix('debugger')->group(function () {
        Route::get('help', [App\Http\Controllers\DatahubController::class, 'help']);
        Route::get('command/{datahubId}/{command}', [App\Http\Controllers\DatahubController::class, 'command']);
    });
});

Route::middleware(['auth:api', AuthenticateLessor::class])->prefix('lessor')->group(function () {
    Route::apiResources([
        'platform' => App\Http\Lessor\PlatformController::class,
        'lessee' => App\Http\Lessor\LesseeController::class,
        'api-group' => App\Http\Lessor\APIGroupController::class,
        'api' => App\Http\Lessor\APIController::class,
        'api-request' => App\Http\Lessor\APIRequestController::class,
        'api-response' => App\Http\Lessor\APIResponseController::class,
    ]);
});

Route::middleware([AuthenticateDatahubCallback::class])->prefix('callback')->group(function () {
    Route::apiResources([
        'operation/{datahubId}' => App\Callback\Controllers\OperationController::class,
    ]);
    Route::post('wxwork/oa/{datahubId}', [App\Callback\Controllers\WxworkController::class, 'oa']);
    Route::get('wxwork/oa/{datahubId}', [App\Callback\Controllers\WxworkController::class, 'verifyURLvalidity']);
});
