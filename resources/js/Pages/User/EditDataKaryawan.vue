<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Navbar from '@/Layouts/Navbar.vue';


</script>




<template>
    <Head title="Menu" />

    <Navbar>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Halaman Edit Karyawan</h2>
        </template>

        <div class="py-12">
            
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
         
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
                disabled
                required
                autocomplete="kode_karyawan"
            />
        </div>

        <div class="mt-8" hidden>
            <InputLabel for="departemen" value="Departemen" />

            <TextInput
                id="departemen"
                type="text"
                class="mt-1 block w-full"
                v-model="form.departemen"
                required
                autocomplete="departemen"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="id_departemen" value="Nama departemen" />
            <select  v-model="form.id_departemen"  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100  dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
                <option value="" selected>Pilih Departemen</option>
    <option  v-for="departemen in Departemen" :key="departemen.id_departemen"  :value="departemen.id_departemen">{{ departemen.nama_departemen }}</option>
  </select>
        </div>


        
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

        
    
      
           </div>
        <div class="flex items-center justify-end  mt-8 mb-6">
          

            <PrimaryButton >
         Update Data
            </PrimaryButton>
        </div>


      
    </form>

                </div>
                
            </div>
        </div>
    </Navbar>
</template>

<script>

import { Head,  useForm } from '@inertiajs/vue3';

export default {
    name: "App",

    props: {
    Karyawan: Object,
    Departemen: Object,
  },
  data() {
    return {
      form: useForm({

        id_departemen: this.Karyawan.id_departemen,
        departemen: this.Karyawan.departemen,
        kode_karyawan: this.Karyawan.kode_karyawan,
        nama_karyawan: this.Karyawan.nama_karyawan,
        no_hp: this.Karyawan.no_hp,
        alamat: this.Karyawan.alamat,
        email: this.Karyawan.email,
        sekolah: this.Karyawan.sekolah,
        jurusan: this.Karyawan.jurusan,
        linkmedsos: this.Karyawan.linkmedsos,
        dokumen: this.Karyawan.dokumen,
       
      })
    };
  },

  methods: {

    submit() {
        this.form.put(route('DataKaryawan.update', this.Karyawan.id_karyawan), {
            
         onSuccess: () => {
            Swal.fire({
    text: 'Success! Anda Berhasil Edit Data',
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
                onError: () => {
                    Swal.fire({
    text: 'Maaf Tidak Dapat Edit Data',
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