<templete>
     <AlertDialog>
        <AlertDialogTrigger>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">View Details</button>
        </AlertDialogTrigger>
        <AlertDialogContent>
            <AlertDialogTitle>Post Details</AlertDialogTitle>
            <AlertDialogDescription>
                <p v-if="post">
                    <strong>{{ post.title }}</strong>
                    <br>{{ post.description }}
                </p>
            </AlertDialogDescription>
            <AlertDialogCancel>Close</AlertDialogCancel>
        </AlertDialogContent>
    </AlertDialog>

</templete>

<script setup>
import { ref } from 'vue';
import { AlertDialog, AlertDialogTrigger, AlertDialogContent, AlertDialogTitle, AlertDialogDescription, AlertDialogCancel, AlertDialogAction } from "@shadcn/vue";

const props = defineProps(['id']);
const post = ref(null);

const fetchPost = async () => {
    let response = await fetch(`/api/posts/${props.id}`);
    post.value = await response.json();
};

onMounted(() => {
    fetchPost();
});

</script>