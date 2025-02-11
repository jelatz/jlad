<template>
    <div class="min-h-screen w-60 shadow-lg">
        <Link :href="route('admin')"><img :src="Logo" :alt="alt" class="w-32 md:mx-auto" />
        </Link>

        <div>
            <ul class="flex flex-col items-stretch nav">
                <li>
                    <Link>Dashboard</Link>
                </li>
                <li><Link>Blogs</Link></li>
                <li>
                    <Link :href="route('blogs')">Back to blog page</Link>
                </li>
            </ul>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue';

const Logo = ref("/images/logoold.png");

</script>

<style scoped>
.nav a {padding: 10px 10px;width: 100%; display: block;}
.nav a:hover{background-color: #222831; color: #fff;}
</style>