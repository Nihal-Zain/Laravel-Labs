<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
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
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif


    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">

        <a href="{{route('posts.create')}}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Post</a>

        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Posted By</th>
                    <th class="border p-2">Created At</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr class="text-center bg-white">
                        <td class="border p-2">{{ $post['id'] }}</td>
                        <td class="border p-2">{{ $post['title'] }}</td>
                        <td class="border p-2">{{ $post['author'] }}</td>
                        <td class="border p-2">{{ $post['created_at'] }}</td>
                        <td class="border p-2">
                        <a href="{{ route('posts.show', $post['id']) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
                        <a href="{{ route('posts.edit', $post['id']) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Edit</a>

                        <!-- Corrected Delete Form -->
                        <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>
                    </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
