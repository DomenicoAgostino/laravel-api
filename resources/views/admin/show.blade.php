@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ $post->title }} <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}">MODIFICA</a></h1>

    @if ($post->category)
        <h3>Categoria:{{ $post->category->name }}</h3>
    @endif

    @if ($post->tags)
        @foreach ($post->tags as $tag )
        <span class="badge bg-success">{{ $tag->name }}</span>
        @endforeach

    @endif

    <p>
        {{ $post->content }}
    </p>

    <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">torna all'elenco</a>
</div>
@endsection
