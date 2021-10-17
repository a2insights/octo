<?php

namespace App\Http\Controllers\App\Dev;


use App\Tables\App\Dev\OTableAppDevExampleTable;
use Illuminate\Http\Request;
use Octo\Resources\OAppTableResource;
use Octo\Response\OAppResponse;

class AppDevTableExampleController
{
    public function index(Request $request)
    {
        return (new OAppResponse('table'))
            ->addComponent(
                (new OAppTableResource(OTableAppDevExampleTable::class))
            )->toResponse($request);
    }
}
