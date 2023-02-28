@extends('layouts.layout-admin')

@section('admin_content')
    @include('components.form-event', [
        'action' => '/auth/event',
        'edit' => false,
    ])
@endsection
