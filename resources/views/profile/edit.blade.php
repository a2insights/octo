@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('profile') }}
    <div class="container p-4">
        <h1>Profile</h1>
        <hr>
        <div class="row">
            <div class="col">
                {!! form($formProfile) !!}
            </div>
        </div>
    </div>
    <div class="container p-4">
        <h1 class="text-danger">Danger Zone</h1>
        <hr>
        <h4>Update Password</h4>
        <div class="row">
            <div class="col">
                {!! form($formPassword) !!}
            </div>
        </div>
        <hr>
        <h4>Delete Account</h4>
        <p>Please be aware that deleting your account will also remove all of your data, including your blogs and posts. This cannot be undone.</p>
        <button type="button" data-toggle="modal" data-target="#deleteAccount" class="btn btn-danger">Delete</button>
    </div>
    <div class="modal fade" id="deleteAccount" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deleting your account will remove any related content like blogs & posts. This cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" href="#"
                    onclick="event.preventDefault();
                    document.getElementById('delete-account').submit();">
                    {{ __('Delete') }}
                </button>
                <form id="delete-account" action="{{ route('account.delete', tenant('id') ) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
