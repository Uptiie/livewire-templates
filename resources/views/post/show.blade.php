@extends('layouts.app')

@section('content')
    <div class="bg-gray-50">
        <div class="bg-white shadow p-20">
            <a href="/">
                <button class="bg-black px-2 py-1 text-white font-semibold mb-10">< back</button>
            </a>
            <h2 class="text-4xl bg-gray-200 p-3 font-bold">{{ $post->title }}</h2>
            @if ($post->photo)
                <div class="mt-4">
                    <img src="{{ Storage::url($post->photo) }}" alt="cover photo" width="250">
                </div>
            @endif

            <hr>

            <livewire:comments-section :post="$post"/>
        </div>
    </div>
@endsection
