@extends('material-admin::index')
@section('title', 'Settings')
@section('content')
    {{ Breadcrumbs::render('profile') }}
    <div class="row">
        <div class="col-7">
            <x-octo-card-material
                title="Profile"
                description="Edit your informations"
            >
                {!! form($formProfile) !!}
            </x-octo-card-material>
        </div>
        <div class="col-5">
            <x-octo-card-material
                title="Password"
                variant="warning"
                description="Change your current password"
            >
                {!! form($formPassword) !!}
            </x-octo-card-material>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <x-octo-card-material
                title="Danger Zone!"
                variant="danger"
                description="Delete your account"
            >
                <p>Please be aware that deleting your account will also remove all of your data, including your blogs and posts. This cannot be undone.</p>
                <button type="button" data-toggle="modal" data-target="#deleteAccount" class="btn btn-danger">Delete</button>
            </x-octo-card-material>
        </div>
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
                    {{ __('Confirm') }}
                </button>
                <form id="delete-account" action="{{ route('account.delete', ('id') ) }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
