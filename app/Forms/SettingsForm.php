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
            ->add('theme', Field::SELECT, [
                'choices' => ['clean' => 'Clean', 'material' => 'Material'],
                'selected' => $blog->theme,
                'rules' => 'required',
                'attr' => ['class' => 'form-control  col-3']
            ])
            ->add('name', Field::TEXT, [
                'rules' => "unique:blogs,name,$blog->id|required|min:2|max:40",
                'attr' => ['class' => 'form-control  col-4']
            ])
            ->add('description', Field::TEXT, [
                'rules' => 'required|min:2|max:255',
                'attr' => ['class' => 'form-control  col-8']
            ])
            ->add('Save', Field::BUTTON_SUBMIT, [
                'attr' => ['class' => 'btn-primary btn']
            ]);
    }

}
