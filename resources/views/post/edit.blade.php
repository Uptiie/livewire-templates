@extends('layouts.app')

@section('content')
    <div class="m-10">
        <livewire:post-edit :post="$post"/>
    </div>
@endsection
