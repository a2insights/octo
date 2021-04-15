<?php

namespace App\Tables\App\Dev;

use App\Models\User;
use Octo\Resources\Components\quasar\OAppTableQuasar;

class OTableAppDevExampleTable implements OAppTableQuasar
{
    public $name = 'OTableAppDevExampleTable';

    public function repository()
    {
        return User::query();
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
            'name'=> $model->name,
            'email'=> $model->email,
            'created_at' => $model->created_at
        ];
    }

    public function actions($model)
    {
        return [
            //octo_action('app-dev.table.destroy', $model->id),
            //octo_action('app-dev.table.show', $model->id),
            //octo_action('app-dev.table.edit', $model->id),
        ];
    }
}
