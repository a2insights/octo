<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class PasswordForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('password_current', Field::PASSWORD, [
                'rules' => 'required|string|max:255',
                'attr' => ['class' => 'form-control  col-4']
            ])
            ->add('password', Field::PASSWORD, [
                'rules' => 'required|string|min:6|max:255|confirmed',
                'attr' => ['class' => 'form-control  col-4']

            ])
            ->add('password_confirmation', Field::PASSWORD, [
                'rules' => 'required|string|min:6|max:255,confirmation',
                'attr' => ['class' => 'form-control  col-4']
            ])
            ->add('update', Field::BUTTON_SUBMIT, [
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

}
