@extends('backend.layouts.app')

@section('title', __('Role Management'))

@section('content')
    <div class="card">

        <div class="card-header">
            <h4>@lang('Role Management')</h4>
            <div class="card-header-action dropdown">
                @if ($logged_in_user->hasAllAccess())
                    <a href="{{ route('admin.auth.role.create') }}" class="btn btn-primary btn-round">Create Role</a>
                @endif
            </div>
        </div>


        <div class="card-body">
            <livewire:roles-table />
        </div>
    </div>
@endsection
