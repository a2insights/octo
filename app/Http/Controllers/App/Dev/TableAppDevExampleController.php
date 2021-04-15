<?php

namespace App\Http\Controllers\App\Dev;


use App\Tables\App\Dev\OTableAppDevExampleTable;
use Illuminate\Support\Facades\Request;
use Octo\Resources\OAppTableResource;
use Octo\Response\OAppResponse;

class TableAppDevExampleController
{
    public function index(Request $request)
    {
        return (new OAppResponse('table'))
            ->addComponent(
                (new OAppTableResource(OTableAppDevExampleTable::class))
            )->toResponse($request);
    }
}
