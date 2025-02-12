<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    role: '',
});

const submit = () => {
    form.post(route('register'), {
        onSuccess: () => {
            Swal.fire({
    text: 'Success! Anda Berhasil Regristasi',
    icon: 'success',
    toast: true,
    showConfirmButton: false,
    position: 'top',
    timer: 3500
  });
                },
                onError: (errors) => {
                    Swal.fire({
    text: 'Maaf Alamat Username atau Nama Sudah Terdaftar',
    icon: 'warning',
    toast: true,
    showConfirmButton: false,
    position: 'top',
    timer: 3500
  });
                },
    });
};
</script>

<template>
  <Head title="Register" />


  <div class="min-h-screen bg-gradient-to-br from-purple-700 text-gray-900 flex justify-center">
    <div class="max-w-screen-sm m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div>

            <div class="py-8 flex flex-col  items-center">
                <h1 class="text-3xl w-80 text-center font-extrabold">
                  Regrister 
                </h1>
                <span class="text-xl mt-2">Halaman Regrister</span>
                <div class="w-full flex-1 mt-8">
                  
                   

                    <div class="mx-auto max-w-xs">
                        <form @submit.prevent="submit" class="md:mt-8 mt-8">
           

           
           <div>
           <InputLabel for="name" value="Nama" />

           <TextInput
               id="name"
               type="text"
               class="mt-1 block w-full"
               v-model="form.name"
               required
               autocomplete="name"
           />
       </div>

  


          <div class="mt-4">
           <InputLabel for="username" value="username" />

           <TextInput
               id="username"
               type="text"
               class="mt-1 block w-full"
               v-model="form.username"
               required
               autocomplete="username"
           />

       </div>

       <div class="mt-4">
           <InputLabel for="email" value="email" />

           <TextInput
               id="email"
               type="text"
               class="mt-1 block w-full"
               v-model="form.email"
               required
               autocomplete="email"
           />

       </div>

       <div class="mt-4">
           <InputLabel for="password" value="Password" />

           <TextInput
               id="password"
               type="password"
               class="mt-1 block w-full"
               v-model="form.password"
               required
               autocomplete="new-password"
           />

       </div>

       
       <div class="mt-4">
            <InputLabel for="role" value="Role" />
            <select  v-model="form.role"  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100  dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
                <option value="" selected>Pilih Role</option>
    <option :value="'merchaint'">Merchaint</option>
    <option :value="'company'">Company</option>
  </select>
        </div>

       <div class="flex items-center justify-end  mt-8 mb-6">
         

           <PrimaryButton  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
               Register
           </PrimaryButton>
       </div>


       <Link
               :href="route('login')"
               class="underline text-sm text-gray-600 hover:text-gray-900 text-center rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
           >
               Sudah Punya Akun, Silahkan Kembali
           </Link>
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
