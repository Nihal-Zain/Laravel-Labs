<template>
    <div>
        <h1>Posts</h1>
    </div>  
    <div>
        <h1 class="text-2xl font-bold">All Posts</h1>
        <ul>
            <li v-for="post in posts" :key="post.id">
               {{ post.title }} - {{ post.user?.name ?? 'Unknown' }}
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
defineProps({ posts: Array });
</script>