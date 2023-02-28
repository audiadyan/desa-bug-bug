@extends('layouts.layout-admin')

@section('admin_content')
    @include('components.form-news', [
        'action' => '/auth/news/' . $news->slug,
        'news' => $news,
        'edit' => true,
    ])
@endsection
