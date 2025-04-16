<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Navbar from '@/Layouts/Navbar.vue';



</script>




<template>
    <Head title="Data Profil" />

<Navbar>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambahkan Profil Anda Disini</h2>
        </template>

        <div class="py-12">
            
            <div class="max-w-screen-2xl  mx-auto sm:px-6 lg:px-8">
         
      
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form @submit.prevent="submit" class=" p-20">
           
                        <h2 class=" text-xl pb-8 text-gray-800 leading-tight">Lengkapi Data</h2>
                        <div class=" border-y pt-8">
                        <div>
                    <InputLabel for="nama_karyawan" value="Nama Karyawan" />

                    <TextInput
                        id="nama_karyawan"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.nama_karyawan"
                        required
                        autocomplete="nama_karyawan"
                    />
        </div> 

        <div class="mt-8">
            <InputLabel for="kode_karyawan" value="ID Card Karyawan" />

            <TextInput
                id="kode_karyawan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.kode_karyawan"
                required
                autocomplete="kode_karyawan"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="id_departemen" value="Nama departemen" />
            <select  v-model="form.id_departemen"  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100  dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
                <option value="" selected>Pilih Departemen</option>
    <option  v-for="departemen in Departemen" :key="departemen.id_departemen"  :value="departemen.id_departemen">{{ departemen.nama_departemen }}</option>
  </select>
        </div>


        <InputError class="mt-2" :message="form.errors.foto" /> 
        
        <div class="mt-8">
            <InputLabel for="alamat" value="Alamat Karyawan" />

            <TextInput
                id="alamat"
                type="text"
                class="mt-1 block w-full"
                v-model="form.alamat"
                required
                autocomplete="alamat"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="email_karyawan" value="Email Karyawan" />

            <TextInput
                id="email_karyawan"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autocomplete="email"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="no_hp" value="No Hp" />

            <TextInput
                id="no_hp"
                type="text"
                class="mt-1 block w-full"
                v-model="form.no_hp"
                required
                autocomplete="no_hp"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="sekolah" value="Asal Sekolah" />

            <TextInput
                id="sekolah"
                type="text"
                class="mt-1 block w-full"
                v-model="form.sekolah"
                required
                autocomplete="sekolah"
            />
        </div>

        


        <div class="mt-8">
            <InputLabel for="jurusan" value="Jurusan Sekolah" />

            <TextInput
                id="jurusan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.jurusan"
                required
                autocomplete="jurusan"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="linkmedsos" value="Link Medsos" />

            <TextInput
                id="linkmedsos"
                type="text"
                class="mt-1 block w-full"
                v-model="form.linkmedsos"
                required
                autocomplete="linkmedsos"
            />
        </div>

        
        <div class="mt-8">
            
            <InputLabel for="dokumen" value="Upload Dokumen" />

            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
       
              <div class="text-center">
              <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm/6 text-gray-600 ">
                <InputLabel for="dokumen" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500" />
                  <TextInput
                id="dokumen"
                type="file"
                class="mt-1 block w-full text-center"
                v-model="form.dokumen"
                required
                autocomplete="dokumen"
                @change="handleFileChange"  
                accept="application/pdf"
            />
        </div>
        <p class="text-xs/5 pt-8  text-gray-600">PDF only up to 1MB</p>
            </div>
        </div>
    
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
    Departemen: Object,
    
  },
  data() {
    return {
      form: useForm({
        id_departemen: '',
        kode_karyawan: '',
        nama_karyawan: '',
        no_hp: '',
        alamat: '',
        email: '',
        sekolah: '',
        jurusan: '',
        linkmedsos: '',
        dokumen: '',
      })
    };
},



methods: {

    handleFileChange (event) {
  this.form.dokumen = event.target.files[0];
 
  },
    submit() {
        this.form.post(route('DataKaryawan.store'), {
         onSuccess: () => {
            Swal.fire({
    text: 'Success! Anda Berhasil Menambahkan Data Profil Karyawan',
    icon: 'success',
    toast: true,
    showConfirmButton: true,
    position: 'top',
    timer: 3500
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