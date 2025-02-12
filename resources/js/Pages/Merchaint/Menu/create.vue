<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import NavbarMerchaint from '@/Layouts/NavbarMerchaint.vue';



</script>




<template>
    <Head title="Menu" />

    <NavbarMerchaint>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambahkan Menu Disini</h2>
        </template>

        <div class="py-12">
            
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
         
      
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form @submit.prevent="submit" class=" p-20">
           

           
              
                        <h2 class=" text-xl pb-8 text-gray-800 leading-tight">Lengkapi Data</h2>

           <div class=" border-y pt-8">
       
            <div>
            <InputLabel for="id_profil" value="Nama Perusahaan" />
            <select  v-model="form.id_profil" required  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100  dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
                <option  value="" selected>Pilih Perusahaan</option>
    <option  v-for="profil in Profil" :key="profil.id_profil"  :value="profil.id_profil">{{profil.nama_perusahaan  }}</option>
  </select>
        </div>

        <InputError class="mt-2" :message="form.errors.id_profil" />

        <div class="mt-8">
            <InputLabel for="makanan" value="Nama Makanan" />

            <TextInput
                id="makanan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.makanan"
                required
                autocomplete="makanan"
            />
        </div> 
        <InputError class="mt-2" :message="form.errors.makanan" />

        <div class="mt-8">
            <InputLabel for="jenis_makanan" value="Jenis Makanan" />

            <TextInput
                id="jenis_makanan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.jenis_makanan"
                required
                autocomplete="jenis_makanan"
            />
        </div>

        <InputError class="mt-2" :message="form.errors.jenis_makanan" />

        <div class="mt-8">
            <InputLabel for="deskripsi" value="Deskripsi" />

            <TextInput
                id="deskripsi"
                type="text"
                class="mt-1 block w-full"
                v-model="form.deskripsi"
                required
                autocomplete="deskripsi"
            />
        </div>

        <InputError class="mt-2" :message="form.errors.deskripsi" />
        <div class="mt-8">
            <InputLabel for="foto" value="Foto Makanan" />

            <TextInput
                id="deskripsi"
                type="file"
                class="mt-1 block w-full"
                v-model="form.foto"
                required
                autocomplete="foto"
                @change="handleFileChange" accept="image/png, image/jpeg"
            />
        </div>
        <InputError class="mt-2" :message="form.errors.foto" />

        <div class="mt-8">
            <InputLabel for="harga" value="Harga" />

            <TextInput
                id="harga"
                type="number"
                class="mt-1 block w-full"
                v-model="form.harga"
                required
                autocomplete="harga"
            />
        </div>

        <InputError class="mt-2" :message="form.errors.harga" />
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
    </NavbarMerchaint>
</template>

<script>

export default {
    name: "App",
    props: {
    Profil: Object, 
  },
  data() {
    return {
      form: useForm({
        id_profil: '',
        makanan: '',
    jenis_makanan: '',
    deskripsi: '',
    foto: '',
    harga: '',
      })
    };
},



methods: {

    handleFileChange (event) {
  this.form.foto = event.target.files[0];
},
    submit() {
        this.form.post(route('makanan.store'), {
         onSuccess: () => {
            Swal.fire({
    text: 'Success! Anda Berhasil Menambahkan Data',
    icon: 'success',
    toast: true,
    showConfirmButton: false,
    position: 'top',
    timer: 3500
}).then((result) => {
        if (result.isConfirmed) {
          // Jika pengguna mengonfirmasi, reload halaman
          window.location.reload();
        }
  });         },
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