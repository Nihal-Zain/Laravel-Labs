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
    @if ($errors->any())    
    <div class="bg-red-500 text-white p-4 text-center text-xl rounded-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </div>
    @endif
    <!-- Form Container -->
    <div class="mt-6 flex justify-center w-full">
        <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Post</h2>
            <form action="{{ route('posts.update',$post->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
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
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">{{ $post->description }}</textarea>
    </div>

    <!-- Post Creator -->
    <div>
        <label class="block text-gray-700 font-medium">Post Creator</label>
        <select name="user_id" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
            @foreach ($users as $user)
            <option value="{{$user->id}}" {{ $user->id == $post->user_id ? 'selected' : '' }}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Image -->
    <div>
        <label class="block text-gray-700 font-medium">Upload Image</label>
        <input type="file" name="image" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none" accept="image/*">
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
