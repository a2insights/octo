<?php

namespace App\Forms;

use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class SettingsForm extends Form
{

    public function buildForm()
    {
        $blog = Auth::user()->blog();

        $this
            ->add('name', Field::TEXT, [
                'rules' => "unique:blogs,name,$blog->id|required|min:2|max:40"
            ])
            ->add('description', Field::TEXT, [
                'rules' => 'required|min:2|max:255'
            ])
            ->add('theme', Field::SELECT, [
                'choices' => ['clean' => 'Clean', 'material' => 'Material'],
                'selected' => $blog->theme,
                'rules' => 'required'
            ])
            ->add('update', Field::BUTTON_SUBMIT, [
                'class' => 'btn btn-primary'
            ]);
    }

}
