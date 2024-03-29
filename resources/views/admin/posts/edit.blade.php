@extends('admin.layouts.master')

@push('libs-css')
    <link rel="stylesheet" href="{{ asset('/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush


@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Sửa Thành bài viết') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.post.update')" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$post->id" />
                <div class="row justify-content-center">
                    @include('admin.posts.forms.edit-left', ['post' => $post])
                    @include('admin.posts.forms.edit-right', ['post' => $post])
                </div>
            </x-form>
        </div>
    </div>
@endsection


@push('libs-js')
    <script src="{{ asset('libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('libs/ckeditor/adapters/jquery.js') }}"></script>
    @include('ckfinder::setup')

    <script src="{{ asset('/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/libs/select2/dist/js/i18n/' . trans()->getLocale() . '.js') }}"></script>
@endpush
