@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-200 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">
                   <livewire:counter/>
                    <livewire:contact-form/>
                    <livewire:search-dropdown/>
                    <livewire:data-tables/>
                    <div class="bg-white shadow-lg p-10">
                        <h2 class="text-lg font-bold">Livewire Blog Posts w/ Comments</h2>

                        <ul class="List-disc mt-6">
                            @foreach($posts as $post)
                                <li class="mt-4 rounded-md bg-gray-100 shadow p-4">
                                    <a href="{{ route('post.show', $post) }}" class="">{{ $post->title }}</a>
                                    <a href="{{ route('post.edit', $post) }}" class="pl-3">
                                        <button class="bg-black text-white text-sm font-semibold p-1 px-2">Edit</button>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <livewire:poll-example/>
                </div>
            </div>
        </div>
    </div>
@endsection
