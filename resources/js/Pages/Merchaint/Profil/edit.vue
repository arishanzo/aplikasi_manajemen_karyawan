<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';




</script>




<template>
    <Head title="Profil" />
    <NavbarMerchaint>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Halaman Edit Profil</h2>
        </template>

        <div class="py-12">
            
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
         
      
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form @submit.prevent="submit" class=" p-20">
           

           
              
                        <h2 class=" text-xl pb-8 text-gray-800 leading-tight"> Lengkapi Datanya</h2>

           <div class=" border-y pt-8">

            
       
            <div>
            <InputLabel for="nama_perusahaan" value="Nama Perusahaan" />

            <TextInput
                id="nama_perusahaan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.nama_perusahaan"
                required
                autocomplete="nama_perusahaan"
            />
        </div> 
        
        <div class="mt-8">
            <InputLabel for="alamat" value="Alamat Perusahaan" />

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
            <InputLabel for="kontak" value="Kontak Perusahaan" />

            <TextInput
                id="kontak"
                type="text"
                class="mt-1 block w-full"
                v-model="form.kontak"
                required
                autocomplete="kontak"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="deskripsi" value="Deskripsi Perusahaan" />

            <TextInput
                id="deskripsi"
                type="text"
                class="mt-1 block w-full"
                v-model="form.deskripsi"
                required
                autocomplete="deskripsi"
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
    </NavbarMerchaint>
</template>

<script>

import { Head,  useForm } from '@inertiajs/vue3';
import NavbarMerchaint from '@/Layouts/NavbarMerchaint.vue';


export default {
    name: "App",

    props: {
    Profil: Object,
  },
  data() {
    return {
      form: useForm({
         id_user: this.Profil.id_user,
        nama_perusahaan: this.Profil.nama_perusahaan,
    alamat: this.Profil.alamat,
    kontak: this.Profil.kontak,
    deskripsi: this.Profil.deskripsi_perusahaan,
      })
    };
  },

  methods: {
    submit() {
        this.form.put(route('profil.update', this.Profil.id_profil), {
         onSuccess: () => {
            Swal.fire({
    text: 'Success! Anda Berhasil Edit Data',
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
  });
                },
                onError: (errors) => {
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