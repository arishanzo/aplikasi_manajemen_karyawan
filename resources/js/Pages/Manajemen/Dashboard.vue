<script setup>
import Navbar from '@/Layouts/Navbar.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <Navbar>
     

        <div class="py-20">
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-xl  text-gray-900">Selamat Datang   {{ $page.props.auth.user.name }} </div>

                    <div class="flex items-center justify-center  text-gray-800 p-10 bg-gray-100">
 

</div>
                </div>
                
            </div>
        </div>
    </Navbar>
</template>

<script>
export default {
    name: "App",

 
};
</script>