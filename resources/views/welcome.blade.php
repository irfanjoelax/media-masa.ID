@extends('layouts.web')

@section('title', 'Beranda')

@section('content')
    <!-- Top News Slider Start -->
    <x-topslider/>
    <!-- Top News Slider End -->

    <!-- Main News Slider Start -->
    <x-main-news/>
    <!-- Main News Slider End -->

    <!-- Category News Slider Start -->
    <x-category-slider/>
    <!-- Category News Slider End -->
@endsection
