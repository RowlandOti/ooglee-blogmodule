@extends('layouts.master')

@section('title')
	{{ !empty($post->page_title) ? $post->page_title : 'Blog &middot; '.$post->title }}
@endsection

@section('meta_description')
	{{ $post->meta_description }}
@endsection

@section('meta_keywords')
	{{ $post->meta_keywords }}
@endsection

@section('content')
	@include('laravelblog::partials.details')
	@include('laravelblog::partials.archives')
@stop
