<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class PostForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('title', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('content', Field::TEXTAREA, [
                'rules' => 'max:30000'
            ])
            ->add('publish', Field::BUTTON_SUBMIT, [
                'class' => 'btn btn-primaryphp artisan vendor:publish'
            ]);
    }

}
