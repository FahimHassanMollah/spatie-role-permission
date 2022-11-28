@extends('backend.layouts.master')

@section('title')
    Role Edit - Admin Panel
@endsection

@section('styles')
@endsection


@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Role Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>All Roles</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create New Role</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.roles.update',['role' => $role->id]) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control" value="{{ $role->name }}" id="name" name="name"
                                    placeholder="Enter a Role Name">
                            </div>

                            <div class="form-group">
                                <label for="name">Permissions</label>

                                {{-- @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @endforeach --}}

                                @forelse($modules->chunk(2) as $key => $chunks)
                                    <div class="form-row">
                                        @foreach ($chunks as $key => $module)
                                            <div class="col">
                                                <h5>Module: {{ $module->name }}</h5>
                                                @foreach ($module->permissions as $key => $permission)
                                                    <div class="mb-3 ml-4">
                                                        <div class="custom-control custom-checkbox mb-2">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="permission-{{ $permission->id }}"
                                                                value="{{ $permission->id }}" name="permissions[]"
                                                                @if (isset($role)) @foreach ($role->permissions as $rPermission)
                                                        {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                        @endforeach @endif>
                                                            <label class="custom-control-label"
                                                                for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @empty
                                    <div class="row">
                                        <div class="col text-center">
                                            <strong>No Module Found.</strong>
                                        </div>
                                    </div>
                                @endforelse
                            </div>


                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Role</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection


@section('scripts')
    <script></script>
@endsection
