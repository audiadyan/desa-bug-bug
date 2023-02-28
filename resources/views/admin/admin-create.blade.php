@extends('layouts.layout-admin')

@section('admin_content')
    @include('components.form-admin', [
        'action' => '/auth/admin',
        'edit' => false,
    ])
@endsection
