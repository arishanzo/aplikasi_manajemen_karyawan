<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Navbar from '@/Layouts/Navbar.vue';



</script>




<template>
    <Head title="Tambah Data Hadir" />

<Navbar>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambahkan Daftar Hadir Anda Disni</h2>
        </template>

        <div class="py-12">
            <div class="max-w-screen-2xl  mx-auto sm:px-6 lg:px-8">
          
      
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form @submit.prevent="submit" class=" p-20">
           

           
              
                        <h2 class=" text-xl pb-8 text-gray-800 leading-tight">Lengkapi Data</h2>

           <div class=" border-y pt-8">


            <div>
            <InputLabel for="kode_karyawan" value="Id Card Karyawan" />

            <TextInput
                id="kode_karyawan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.kode_karyawan"
                disabled
                required
                autocomplete="kode_karyawan"
            />

            
        </div> 
       

        <div class='mt-8'>
            <InputLabel for="Tgl_hadir" value="Tanggal" />

            <TextInput
                id="tgl_hadir"
                type="date"
                class="mt-1 block w-full"
                v-model="form.tgl_hadir"
                required
                autocomplete="tgl_hadir"
            />
        </div> 

        
        <div class="mt-8">
            <InputLabel for="status" value="Status Kehadiran" />
            <select  v-model="form.status"  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100  dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
                <option value="" selected>Pilih Status</option>
    <option value="Hadir"  >Hadir</option>
    <option value="Izin"  >Izin</option>
    <option value="Cuti"  >Cuti</option>
  </select>
        </div>


        
        <div class="mt-8">
            <InputLabel for="keterangan" value="keterangan" />

            <TextInput
                id="keterangan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.keterangan"
                required
                autocomplete="keterangan"
            />
        </div>
           </div>
        <div class="flex items-center justify-end  mt-8 mb-6">
          

            <PrimaryButton  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Tambah Data
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
  
    props: {
   Karyawan: Object,
   
    
  },

  data() {
    return {
      form: useForm({
        kode_karyawan: this.Karyawan.kode_karyawan,
        tgl_hadir: '',
        status: '',
    keterangan: '',
      })
    };
},



methods: {


    submit() {
        this.form.post(route('DataHadir.store'), {
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