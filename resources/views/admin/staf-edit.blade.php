@extends('layouts.layout-admin')

@section('admin_content')
    @include('components.form-staf', [
        'action' => '/auth/staf/' . $staf->username,
        'staf' => $staf,
        'edit' => true,
    ])
@endsection
