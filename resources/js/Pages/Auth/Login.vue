<script setup>
// import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';



const form = useForm({
    username: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
   
        <Head title="Log in" />

<div class="min-h-screen bg-gradient-to-br from-purple-700 text-gray-900 flex justify-center">
    <div class="max-w-screen-sm m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div>
                   
          
            <div class="mt-28 flex flex-col  items-center">
                <h1 class="text-3xl w-80 text-center font-extrabold">
                  Silahkan LOGIN
                </h1>
                <span class="text-xl mt-2">E-Ketering</span>
                <div class="w-full flex-1 mt-8">
                  
                   

                    <div class="mx-auto max-w-xs">
                        <form @submit.prevent="submit" class="">


                 <InputLabel for="username" value="Username" />

                        <TextInput
                    id="username"
                    type="text"
                    class="w-full px-8 mt-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                    v-model="form.username"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Masukan Username Anda"
                />

                <InputError class="mt-2" :message="form.errors.username" />

                <InputLabel for="password" class="mt-4" value="Password" />


                <TextInput
                    id="password"
                    type="password"
                    class="w-full px-8 mt-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />  
                     
                            <div class="mt-16">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-3">
                                Log in
                            </span>
                   
                </PrimaryButton>
          
                <Link
                    
                    :href="route('register')"
                    class="mt-5 tracking-wide font-semibold bg-purple-400 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                  
                  <span class="ml-3">
                               Daftar Akun
                            </span>
                </Link>

                      

                    </div>
                </form>
                        <p class="mt-16 text-xs text-gray-600 text-center">
                           
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Terms of Service by <span class="font-extrabold">aris wahyudi</span>
                            </a>
                            and its
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Privacy Policy
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>

</template>
