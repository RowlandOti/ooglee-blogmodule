@extends('layouts.master')

@section('title')
	{{ Config::get('laravelblog::meta.index_page.page_title') }}
@endsection

@section('meta_description')
	{{ Config::get('laravelblog::meta.index_page.meta_description') }}
@endsection

@section('meta_keywords')
	{{ Config::get('laravelblog::meta.index_page.meta_keywords') }}
@endsection

@section('content')
	@include('laravelblog::partials.list')
	@include('laravelblog::partials.archives')
@stop