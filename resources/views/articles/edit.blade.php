<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>article create</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        create page
        <form action="{{ route('article.update', ['article' => $article]) }}" method="POST">
            @csrf
            @method('PUT')

            <p class="mb-4">
                <input
                       type="text"
                       name="title"
                       class="border @error('title') border-red-500 @else  border-blue-500 @enderror"
                       value="{{ old('title', $article->title ?? '' ) }}">
                @error('title')
                <span>{{ $message }}</span>
                @enderror
            </p>

            <p class="mb-4">
                <input
                       type="text"
                       name="content"
                       class="border @error('content') border-red-500 @else  border-blue-500 @enderror"
                       value="{{ old('content', $article->content ?? '' ) }}">
                @error('content')
                {{ $message }}
                @enderror
            </p>

            <p class="mb-4">
                <input
                       type="text"
                       name="extra"
                       class="border @error('extra') border-red-500 @else  border-blue-500 @enderror"
                       value="{{ old('extra', $article->extra ?? '' ) }}">
                @error('extra')
                {{ $message }}
                @enderror
            </p>

            <p><button type="submit" class="text-white bg-blue-700">update</button></p>

        </form>


    </body>

</html>