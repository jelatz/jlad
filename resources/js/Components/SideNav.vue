<template>
    <div @click="" class="min-h-screen w-60 shadow-lg overflow-hidden">
        <Link :href="route('admin')"><img :src="Logo" :alt="alt" class="w-32 md:mx-auto h-32" />
        </Link>

        <div>
            <ul class="flex flex-col items-stretch nav">
                <li>
                    <Link :href="route('dashboard')" :class="{'bg-[#222831] text-white' : $page.component === 'Blogs/Dashboard'}">Dashboard</Link>
                </li>
                <li>
                    <Link :href="route('admin')":class="{'bg-[#222831] text-white' : $page.component === 'Blogs/Admin'}">Blogs</Link>
                </li>
                <li>
                    <Link :href="route('blogs')">Back to blog page</Link>
                </li>
                <!-- <li>
                    <Link :href="route('topics')">Topics</Link>
                </li> -->
            </ul>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue';

const Logo = ref("/images/logoold.png");

const alt = ref("Logo");
</script>

<style scoped>
.nav a {padding: 10px 10px;width: 100%; display: block;}
.nav a:hover{background-color: #222831; color: #fff;}
.nav li {
    overflow: hidden;
    text-wrap: nowrap;
}
</style>