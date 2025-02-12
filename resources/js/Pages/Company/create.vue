<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import NavbarMerchaint from '@/Layouts/NavbarMerchaint.vue';
import NavbarCompany from '@/Layouts/NavbarCompany.vue';



</script>




<template>
    <Head title="Pesanan" />


    <NavbarCompany>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambahkan Orderan Disni</h2>
        </template>

        <div class="py-12">
            
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
         
      
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form @submit.prevent="submit" class=" p-20">
           

           
              
                        <h2 class=" text-xl pb-8 text-gray-800 leading-tight">Lengkapi Data Pesanan</h2>

           <div class=" border-y pt-8">
       

       
        
        <div hidden>
            <InputLabel for="makanan" value="makanan" />

            <TextInput
                id="makanan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.id_makanan"
                required
                autocomplete="makanan"
            />
        </div>

        <div >
            <InputLabel for="makanan" value="Nama Makanan" />

            <TextInput
                id="makanan"
                type="text"
                class="mt-1 block w-full"
                v-model="form.makanan"
                required
                readonly
                autocomplete="makanan"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="ketering" value="Nama Katering" />

            <TextInput
                id="katering"
                type="text"
                class="mt-1 block w-full"
                v-model="form.nama_katering"
                required
                readonly
                autocomplete="katering"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="jumlah_porsi" value="Jumlah Porsi" />

            <TextInput
                id="jumlah_porsi"
                type="number"
                class="mt-1 block w-full"
                v-model="form.jumlah_porsi"
                required
                autocomplete="jumlah_porsi"
            />
        </div>

        <div class="mt-8">
            <InputLabel for="tgl_pengiriman" value="Tanggal Pengiriman" />

            <TextInput
                id="tgl_pengiriman"
                type="date"
                class="mt-1 block w-full"
                v-model="form.tgl_pengiriman"
                required
                autocomplete="tgl_pengiriman"
            />
        </div>



      
           </div>
        <div class="flex items-center justify-end  mt-8 mb-6">
          

            <PrimaryButton  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Tambah Pesanan
            </PrimaryButton>
        </div>


      
    </form>

                </div>
                
            </div>
        </div>
    </NavbarCompany>
</template>
<script>

import { Head,  useForm } from '@inertiajs/vue3';
import NavbarMerchaint from '@/Layouts/NavbarMerchaint.vue';


export default {
    name: "App",

    props: {
    Makanan: Object,
  },
  data() {
    return {
      form: useForm({
        nama_katering : this.Makanan.profil.nama_perusahaan,
         makanan: this.Makanan.makanan,
         id_makanan: this.Makanan.id_makanan,
        jumlah_porsi: '',
    tgl_pengiriman: '',
      })
    };
  },

  methods: {
    
    submit() {
        this.form.put(route('company.store'), {
         onSuccess: () => {
            Swal.fire({
    text: 'Success! Anda Berhasil Membuat Pesanan',
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
    text: 'Maaf Tidak Dapat pesan',
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