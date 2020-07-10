<?php

namespace App\Http\Controllers;

use App\Forms\PasswordForm;
use App\Forms\ProfileForm;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(FormBuilder $formBuilder)
    {
        $formProfile = $formBuilder->create(\App\Forms\ProfileForm::class, [
            'method' => 'PUT',
            'url' => route('profile.update', [tenant('id')]),
            'model' => [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ]
        ]);

        $formPassword = $formBuilder->create(\App\Forms\PasswordForm::class, [
            'method' => 'PUT',
            'url' => route('profile.password', [tenant('id')]),
        ]);

        return view('profile.edit')->with(
            [
                'formProfile' => $formProfile,
                'formPassword' => $formPassword
            ]
        );
    }

    public function update(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ProfileForm::class);

        $data = $form->getFieldValues();

        if (!$form->isValid())   {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Auth::user()->name = $data['name'];
        Auth::user()->email = $data['email'];

        Auth::user()->save();

        notify()->success('Profile updated successfully!', 'Success!');

        return back();
    }

    public function updatePassword(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PasswordForm::class);

        $data = $form->getFieldValues();

        if (Hash::check($data['password_current'], Auth::user()->password) !== true) {
            notify()->error('The current password givin is incorrect!', 'Password error', ['closeDuration' => 600]);
            return redirect()->back();
        }

        if (!$form->isValid())   {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Auth::user()->password = Hash::make($data['password']);

        Auth::user()->save();

        notify()->success('Password updated successfully!', 'Success!');

        return back();
    }

    public function deleteAccount()
    {
        $user = Auth::user();

        $user->blogs->each(function($blog){
            $blog->posts()->delete();
            $blog->delete();
        });

        $user->delete();

        tenant()->delete();

        notify()->success('Account deleted successfully!', 'Success!');

        Auth::logout();

        return redirect()->route('home');
    }
}
