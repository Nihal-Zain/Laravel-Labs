<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center min-h-screen">

    <!-- Navbar -->
    <nav class="bg-gray-900 p-4 w-full">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{route('posts.index')}}" class="text-white text-xl font-semibold">ITI Blog</a>
            <ul class="flex space-x-4">
                <li><a href="{{route('posts.index')}}" class="text-gray-300 hover:text-white">Home</a></li>
                <li><a href="{{route('posts.index')}}" class="text-gray-300 hover:text-white">All Posts</a></li>
            </ul>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="mt-6 flex justify-center w-full">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Post</h2>
            <form action="{{ route('posts.update', ['id' => $post['id']]) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div>
        <label class="block text-gray-700 font-medium">Title</label>
        <input type="text" name="title" value="{{ $post['title'] }}" 
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
    </div>

    <!-- Description -->
    <div>
        <label class="block text-gray-700 font-medium">Description</label>
        <textarea name="description" rows="4"
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">{{ $post['description'] }}</textarea>
    </div>

    <!-- Post Creator -->
    <div>
        <label class="block text-gray-700 font-medium">Post Creator</label>
        <select name="name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
            <option value="John Doe" {{ $post['postedBy']['name'] == 'John Doe' ? 'selected' : '' }}>John Doe</option>
            <option value="Jane Smith" {{ $post['postedBy']['name'] == 'Jane Smith' ? 'selected' : '' }}>Jane Smith</option>
            <option value="Alice Johnson" {{ $post['postedBy']['name'] == 'Alice Johnson' ? 'selected' : '' }}>Alice Johnson</option>
        </select>
    </div>

    <!-- Update Button -->
    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
        Update
    </button>
</form>

        </div>
    </div>

</body>
</html>
