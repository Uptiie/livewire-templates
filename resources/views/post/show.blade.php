@extends('layouts.app')

@section('content')
    <div class="p-48 bg-gray-50">
        <div class="bg-white shadow p-20">
            <h2 class="text-4xl">{{ $post->title }}</h2>
            <div class="mt-8">
                {{ $post->content }}
                <div class="h-48 mt-8">Scroll down for comments...</div>
                <div class="h-48 mt-8"></div>
                <div class="h-48 mt-8"></div>
            </div>

            <hr>

            <livewire:comments-section :post="$post"/>
        </div>
    </div>
@endsection
