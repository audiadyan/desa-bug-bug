@extends('layouts.layout-admin')

@section('admin_content')
    @include('components.form-staf', [
        'action' => '/auth/staf',
        'edit' => false,
    ])
@endsection
