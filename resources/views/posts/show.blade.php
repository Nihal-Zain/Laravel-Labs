<html>
    <head>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body>
    <div>
            <nav class="bg-gray-900 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{route('posts.index')}}" class="text-white text-xl font-semibold">ITI Blog</a>
        <ul class="flex space-x-4">
            <li><a href="{{route('posts.index')}}" class="text-gray-300 hover:text-white">Home</a></li>
        </ul>
    </div>
</nav>
    </div>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <!-- Post Info -->
    <div class="mb-6 border-b pb-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Post Info</h2>
        <p class="text-lg font-bold text-gray-700">Title: <span class="font-normal">{{$post['title']}}</span></p>
        <p class="text-lg font-bold text-gray-700">Description:{{$post['description']}}</p>
        </p>
        <p class="text-gray-600">With supporting text below as a natural lead-in to additional content.</p>
    </div>

    <!-- Post Creator Info -->
    <div class="p-4 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Post Creator Info</h2>
        <p class="text-gray-700"><span class="font-bold">Name:</span> {{$post['postedBy']['name']}}</p>
        <p class="text-gray-700"><span class="font-bold">Email:</span> {{$post['postedBy']['email']}}</p>
        <p class="text-gray-700"><span class="font-bold">Created At:</span>  {{$post['postedBy']['createdAt']}}</p>
    </div>
</div>
</body>

</html>
