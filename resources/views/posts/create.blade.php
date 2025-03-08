<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div>
    <nav class="bg-gray-900 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{route('posts.index')}}" class="text-white text-xl font-semibold">ITI Blog</a>
        <ul class="flex space-x-4">
            <li><a href="{{route('posts.index')}}" class="text-gray-300 hover:text-white">Home</a></li>
            <li><a href="{{route('posts.index')}}" class="text-gray-300 hover:text-white">All Posts</a></li>
        </ul>
    </div>
</nav>
    </div>
<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Create a Post</h1>
    
    <form action="/posts" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Post Creator</label>
            <select name="creator" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option>Ahmed</option>
                <option>John</option>
                <option>Sarah</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Create
        </button>
    </form>
</div>

</body>
</html>