@extends('layouts.app')

@section('content')
<div class="container">
    <h1>MODIFICA di : {{ $post->title }}</h1>

    {{-- elenco di tutti gli errori eventuali --}}

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach

    </ul>
    </div>

    @endif
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" id="form">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" value="{{ old('title', $post->title) }}" class="form-control @error('title')

        @enderror" id="title" name="title" placeholder="Titolo">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
        <p class="text-danger" id="error-title"></p>
        <div class="mb-3">
            <label for="title" class="form-label">Contenuto del post</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="10">{{old('content',  $post->content)}}</textarea>
            @error('content')
            <p class="text-danger">{{ $message }} </p>
            @enderror
            </div>


            <div class="mb-3">
                <select class="form-select" name="category_id">
                    <option value="">Seleziona una categoria</option>
                    @foreach ($categories as $category)
                    <option @if($category->id == old('category_id', $post->category ? $post->category->id : '')) selected @endif value="{{$category->id}}">{{$category->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                @foreach ($tags as $tag )
                    <input type="checkbox"
                    name="tags[]"
                    id="tag{{$loop->iteration}}"
                    @if (!$errors->any() && $post->tags->contains($tag->id) )
                    checked
                    @elseif ($errors->any() && in_array($tag->id, old('tags', []) ) )
                    checked

                    @endif
                    value="{{ $tag->id }}">
                    <label class="mr-3" for="tag{{$loop->iteration}}">{{ $tag->name }}</label>
                @endforeach
            </div>

        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
</div>
@endsection
