<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>hello create</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        create page
        <form action="{{ route('hello.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="text" name="title" class="border @error('title') border-red-500 @else  border-blue-500 @enderror">
            <button type="submit" class="text-white bg-blue-700">submit</button>
            @error('title')
            {{ $message }}
            @enderror
        </form>


    </body>

</html>