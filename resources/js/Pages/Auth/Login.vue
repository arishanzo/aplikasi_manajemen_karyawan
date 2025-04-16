<script setup>
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


        <nav class=" w-full max-w-screen-2xl px-4 py-2 mx-auto bg-white shadow-md rounded-md lg:px-8 lg:py-3 mt-10">
  <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
    <a href="#" class="mr-4 block cursor-pointer py-1.5 text-base text-slate-800 font-semibold">
      PT. Pificia Group
    </a>
 
    <div class="lg:block">
      <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
     
        
        <li
        class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
        <a class="flex font-semibold" :href="route('home')">
						Home
				</a>
        </li>
        <li
        class="flex items-center p-1 text-sm gap-x-2  text-slate-600">
        <a
        :href="route('login')"
            class="inline-flex font-semibold items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide transition duration-200 rounded shadow-md  hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
          >
            Login
    </a>
        </li>
      </ul>
    </div>
   
  </div>
</nav>


<div class="bg-gray-100">
      <div class="px-4 py-16 mx-auto mt-16 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="px-4 py-16 bg-gray-100  mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="flex flex-col justify-between lg:flex-row">
      <div class=" lg:max-w-lg lg:pr-5 lg:mb-0">
        <div class="max-w-sm items-center justify-center pt-20 mb-6">
          <h2 class="max-w-lg mb-6 font-sans text-3xl  font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
           
            <span class="relative inline-block">
              <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-gray-400 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                <defs>
                  <pattern id="dc223fcc-6d72-4ebc-b4ef-abe121034d6e" x="0" y="0" width=".135" height=".30">
                    <circle cx="1" cy="1" r=".7"></circle>
                  </pattern>
                </defs>
                <rect fill="url(#dc223fcc-6d72-4ebc-b4ef-abe121034d6e)" width="52" height="24"></rect>
              </svg>

            <span class="relative inline-block text-deep-purple-accent-400">Apa Kata Mereka Tentang Kami</span>
            </span>
          </h2>
          <p class="text-base text-gray-700 md:text-lg">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.          </p>
        </div>
        <hr class="mb-6 border-gray-300" />
        <div class="flex">
          <a href="/" aria-label="Play Song" class="mr-3">
            <div class="flex items-center justify-center w-10 h-10 text-white transition duration-300 transform rounded-full shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 hover:scale-110">
                <img src="https://cdn.devdojo.com/tails/avatars/024.jpg" className="rounded-full border-4 border-white" />
      
            </div>
          </a>
          <div class="flex flex-col">
            <div class="text-sm font-semibold">
              Anggun Levie
            </div>
            <div class="text-xs text-gray-700">HRD PT. XVJS</div>
          </div>
        </div>
      </div>

      <!-- login -->
      <div class="px-5 pt-6  bg-white text-center border border-gray-300 rounded lg:w-2/5">
        <div class="mb-8 font-semibold text-2xl">Login</div>
        <div class="flex justify-center w-full mb-3">

          <div class="w-full flex-1">
                  
                   

                    <div class="mx-auto max-w-xs">
                        <form @submit.prevent="submit" class="">


                 <InputLabel for="username" class="text-start" value="Username" />

                        <TextInput
                    id="username"
                    type="text"
                    class="w-full px-8 mt-4 py-4 rounded-lg font-medium  border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                    v-model="form.username"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Masukan Username Anda"
                />

                <InputError class="mt-2" :message="form.errors.username" />

                <InputLabel for="password" class="mt-4 text-start" value="Password" />


                <TextInput
                    id="password"
                    type="password"
                    class="w-full px-8 mt-4 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                    v-model="form.password"
                    required
                    autocomplete="current-password"

                     placeholder="Masukan Password Anda"
                />
                <InputError class="mt-2" :message="form.errors.password" />  
                     
                            <div class="mt-8">
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
          
                      

                    </div>
                </form>
                        <p class="p-4 mt-4 text-xs text-gray-600 text-center">
                           
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
      </div>
</div>

</template>
