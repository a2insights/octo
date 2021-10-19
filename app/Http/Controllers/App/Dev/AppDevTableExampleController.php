<?php

namespace App\Http\Controllers\App\Dev;

use App\Tables\App\Dev\OTableAppDevExampleTable;
use Illuminate\Http\Request;
use Octo\Resources\Quasar\Table\Table;
use Octo\QuasarResponse;

class AppDevTableExampleController
{
    public function index(Request $request)
    {
        return (new QuasarResponse('table'))
            ->addComponent(
                (new Table(OTableAppDevExampleTable::class))
            )->toResponse($request);
    }
}
