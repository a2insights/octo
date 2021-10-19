<?php

namespace App\Tables\App\Dev;

use App\Models\User;
use Illuminate\Support\Str;
use Octo\Resources\Quasar\Action;
use Octo\Resources\Quasar\Table\TableContract;

class OTableAppDevExampleTable implements TableContract
{
    public $name = 'OTableAppDevExampleTable';

    public function model()
    {
        return User::query()
            ->orderBy('updated_at', 'desc');
    }

    public function route()
    {
        return octo_route('app-dev.table.index');
    }

    public function headers(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Created at'
        ];
    }

    public function row($model)
    {
        return [
            'id' => $model->id,
            'name'=> $model->initials,
            'email'=> Str::lower($model->initials) . '*****@' . Str::of($model->email)->afterLast('@'),
            'created_at' => $model->created_at->diffForhumans()
        ];
    }

    public function actions($model)
    {
        return [
            (new Action(octo_route('app-dev.table.show', ['id' => $model->id])))->setDisabled()->get(),
            (new Action(octo_route('app-dev.table.edit', ['id' => $model->id])))->setDisabled()->get(),
            (new Action(octo_route('app-dev.table.destroy', ['id' => $model->id])))->setDisabled()->get(),
        ];
    }
}
