<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Navbar from '@/Layouts/Navbar.vue';



</script>




<template>
    <Head title="Tambah Data Departemen" />

<Navbar>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambahkan Daftar Departemen Disni</h2>
        </template>

        <div class="py-12">
            <div class="max-w-screen-2xl  mx-auto sm:px-6 lg:px-8">
          
      
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form @submit.prevent="submit" class=" p-20">
           

           
              
              
                        <h2 class=" text-xl pb-8 text-gray-800 leading-tight"> Lengkapi Datanya</h2>

                        <div class=" border-y pt-8">
       
        <div>
            <InputLabel for="Kode_departemen" value="Kode Departemen" />

            <TextInput
                id="kode_departemen"
                type="text"
                class="mt-1 block w-full"
                v-model="form.kode_departemen"
                required
                autocomplete="kode_departemen"
            />
        </div> 

        
       

        
        <div class="mt-8">
            <InputLabel for="nama_departemen" value="nama_departemen" />

            <TextInput
                id="nama_departemen"
                type="text"
                class="mt-1 block w-full"
                v-model="form.nama_departemen"
                required
                autocomplete="nama_departemen"
            />
        </div>
           </div>
        <div class="flex items-center justify-end  mt-8 mb-6">
          

            <PrimaryButton >
         Simpan Data
            </PrimaryButton>
        </div>


      

      
    </form>

                </div>
                
            </div>
        </div>
    </Navbar>
</template>

<script>

export default {
    name: "App",
  
  data() {
    return {
      form: useForm({
        kode_departemen: '',
        nama_departemen: '',
   
      })
    };
},



methods: {


    submit() {
        this.form.post(route('DataDepartemen.store'), {
         onSuccess: () => {
            Swal.fire({
    text: 'Success! Anda Berhasil Menambahkan Data',
    icon: 'success',
    toast: true,
    showConfirmButton: true,
    
}).then((result) => {
        if (result.isConfirmed) {
          // Jika pengguna mengonfirmasi, reload halaman
          window.location.reload();
        }
  });
                },
                onError: (errors) => {
                    Swal.fire({
    text: 'Maaf Tidak Dapat Menambahkan Data',
    icon: 'warning',
    toast: true,
    showConfirmButton: false,
    position: 'top',
    timer: 3500
  });
                },
    });
    }
  }
};
</script>