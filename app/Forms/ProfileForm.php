<?php

namespace App\Forms;

use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class ProfileForm extends Form
{
    public function buildForm()
    {
        $user = Auth::user();

        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required|min:2|max:255',
                'attr' => ['class' => 'form-control']

            ])
            ->add('email', Field::TEXT, [
                'rules' => "email|required|unique:users,name,$user->id|min:2|max:40",
                'attr' => ['class' => 'form-control']
            ])
            ->add('Save', Field::BUTTON_SUBMIT, [
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

}
