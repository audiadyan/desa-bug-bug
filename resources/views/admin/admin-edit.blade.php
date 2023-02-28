@extends('layouts.layout-admin')

@section('admin_content')
    @include('components.form-admin', [
        'action' => '/auth/admin/' . $admin->username,
        'admin' => $admin,
        'edit' => true,
    ])
@endsection
