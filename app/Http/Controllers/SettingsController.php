<?php

namespace App\Http\Controllers;

use App\Forms\SettingsForm;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;

class SettingsController extends Controller
{
    public function edit(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\SettingsForm::class, [
            'method' => 'PUT',
            'url' => route('settings.update', [tenant('id')]),
            'model' => [
                'name' => Auth::user()->blog()->name,
                'description' => Auth::user()->blog()->description,
            ]
        ]);

        return view('settings.edit')->with(['form' => $form]);
    }

    public function update(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(SettingsForm::class);

        $data = $form->getFieldValues();

        if (!$form->isValid())   {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $blog = Auth::user()->blog();

        $blog->name = $data['name'];
        $blog->description = $data['description'];
        $blog->theme = $data['theme'];

        $blog->save();

        toastr()->success('Settings updated successfully !', 'Success!');

        return back();
    }
}
