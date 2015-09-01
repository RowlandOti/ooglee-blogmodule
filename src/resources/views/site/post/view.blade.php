@extends('ooglee-blog::site.layouts.index')
@section('content')
   {{var_dump($post->present()->createdAtDate())}}
   {{var_dump($post->present()->viewLink())}}
   
@stop