<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';




</script>




<template>
    <Head title="Menu" />

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
       <InputLabel for="id_profil" value="Nama Perusahaan" />
       <select  v-model="form.id_profil"  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100  dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500">

           <option  value="" selected>Pilih Perusahaan</option>
<option  v-for="profil in Profil" :key="profil.id_profil"  :value="profil.id_profil">{{profil.nama_perusahaan  }}</option>
</select>
   </div>
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

        <div class="mt-8" hidden>
            <InputLabel for="foto" value="Foto Makanan" />

            <TextInput
                id="deskripsi"
                type="text"
                class="mt-1 block w-full"
                v-model="form.foto"
                required
                autocomplete="foto"
              
            />
</div>

            <div class="mt-8">
                <InputLabel for="fotobaru" value="Foto Makanan" />

            <TextInput
                id="fotobaru"
                type="file"
                class="mt-1 block w-full"
                v-model="form.fotobaru"
            
                autocomplete="fotobaru"
               accept="image/png, image/jpeg"
            />
        </div>


        <div class="mt-8">
            <InputLabel for="harga" value="Harga" />

            <TextInput
                id="harga"
                type="number"
                class="mt-1 block w-full"
                v-model="form.harga"
                autocomplete="harga"
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
    Menu: Object,
    Profil: Object,
  },
  data() {
    return {
      form: useForm({
        id_profil: this.Menu.id_profil,
        makanan: this.Menu.makanan,
    jenis_makanan: this.Menu.jenis_makanan,
    deskripsi: this.Menu.deskripsi,
    foto: this.Menu.foto,
    harga: this.Menu.harga,
    fotobaru: '',
      })
    };
  },

  methods: {

    handleFileChange (event) {
  this.form.fotobaru = event.target.files[0];
},
    submit() {
        console.log("Data yang dikirim:", this.form);
        this.form.put(route('makanan.update', this.Menu.id_makanan), {
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