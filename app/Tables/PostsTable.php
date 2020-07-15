<?php

namespace App\Tables;

use Octo\Resources\Objects\Column;
use Octo\Resources\Objects\Table;

class PostsTable extends Table
{
    public function builder()
    {
        $this
            ->add('Title', 'title', Column::TITLE)
            ->add('Created at', 'created_at')
            ->add('Updated at', 'updated_at')
            ->add('', 'edit|destroy', Column::ACTIONS, [
                'actions' => [
                    'edit' => [
                        'route' => 'post.edit'
                    ],
                    'destroy' => [
                        'route' => 'post.destroy'
                    ]
                ]
            ]);
    }
}
