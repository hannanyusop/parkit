@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">

        <div class="card-header">
            <h4> @lang('User Management')</h4>
            <div class="card-header-action dropdown">
                @if ($logged_in_user->hasAllAccess())
                    <a href="{{ route('admin.auth.user.create') }}" class="btn btn-primary btn-round">Create User</a>
                @endif
            </div>
        </div>


        <div class="card-body">
            @livewire('search-users')
        </div>
    </div>
@endsection
