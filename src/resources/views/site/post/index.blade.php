@extends('ooglee-blog::site.layouts.index')
@section('content')
   {{var_dump($response->toJson())}}
   

   {{ $response->each(function($post)
   {
   		var_dump($post->present()->createdAtDate());
   		var_dump($post->present()->viewLink());
   }
   ) }}
@stop