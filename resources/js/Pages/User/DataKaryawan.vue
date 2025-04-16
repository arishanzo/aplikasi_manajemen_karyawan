<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Navbar from '@/Layouts/Navbar.vue';
import { Head , Link, router} from '@inertiajs/vue3';

</script>

<template>
    <Head title="Data Karyawan" />

    <Navbar>
       

        <div class="py-20">
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
              
      <!-- Header Section -->
      <div class="bg-gradient-to-r from-blue-600 to-indigo-700 animate-gradient text-white p-6 md:p-10">
        <div class="flex flex-col md:flex-row items-center">
         
          <div class="md:w-3/4 text-center md:text-left md:pl-8">

            
            <h1 v-if="Karyawan?.nama_karyawan" class="text-3xl md:text-4xl font-bold mb-2">{{ Karyawan.nama_karyawan }}</h1>
            <h1 v-else class="text-3xl md:text-4xl font-bold mb-2">Nama Anda</h1>

            <h2 v-if="Karyawan.departemen" class="text-xl md:text-2xl font-medium mb-4">{{ Karyawan.departemen }}</h2>
            <h2 v-else class="text-xl md:text-xl font-medium mb-4">Departemen Anda</h2>
            <div class="flex flex-wrap justify-center md:justify-start gap-3">
              <div class="flex items-center bg-white bg-opacity-20 rounded-full px-4 py-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span v-if="Karyawan.email" class="text-sm">{{ Karyawan.email}}</span>
                <span v-else class="text-sm">Email Anda</span>
              </div>
             
              <div class="flex items-center bg-white bg-opacity-20 rounded-full px-4 py-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9" />
                </svg>
                 <span v-if="Karyawan.linkmedsos" class="text-sm">{{ Karyawan.linkmedsos}}</span>
                <span v-else class="text-sm">Link Sosmed</span>
              </div>
            </div>
          </div>
          <div class="md:w-1/4 flex justify-center mb-6 md:mb-0">

            
       <Link v-if="Karyawan.id_karyawan"
               :href="route('DataKaryawan.edit' , Karyawan.id_karyawan)"
               class="bg-blue-900 inline-flex font-semibold items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide transition duration-200 rounded-full shadow-md  hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
           >
               Edit Profil
           </Link>

           <Link v-else
               :href="route('DataKaryawan.create')"
               class="bg-blue-900 inline-flex font-semibold items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide transition duration-200 rounded-full shadow-md  hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
           >
               Buat Profil
           </Link>
           
          </div>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="p-6 md:p-10  shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          
          <!-- Left Column -->
          <div class="col-span-2">
            <!-- About Me -->
            <div class="mb-8">
              <h2 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
             
                Alamat
              </h2>
              <div class="w-16 h-1 bg-blue-600 mb-4"></div>
              <p v-if="Karyawan.alamat" class="text-gray-600">{{ Karyawan.alamat }}</p>
            </div>
            
           
            <!-- Projects -->
            <div class="mt-16">
              <h2 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
             
                Sekolah
              </h2>
              <div class="w-16 h-1 bg-blue-600 mb-4"></div>
              <p v-if="Karyawan.sekolah" class="text-gray-600">{{ Karyawan.sekolah }}</p>
            </div>

            <div class="mt-16">
              <h2 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
             
                Email
              </h2>
              <div class="w-16 h-1 bg-blue-600 mb-4"></div>
              
              <p v-if="Karyawan.email" class="text-gray-600">{{ Karyawan.email }}</p>
            
            </div>
          </div>
          
          <!-- Right Column -->
          <div>
            <div class="mb-8">
              <h2 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
                
                No Hp
              </h2>
              <div class="w-16 h-1 bg-blue-600 mb-4"></div>
              <p v-if="Karyawan.sekolah" class="text-gray-600">{{ Karyawan.no_hp }}</p>
            </div>

            <div class="mb-16">
              <h2 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
              
                Jurusan
              </h2>
              <div class="w-16 h-1 bg-blue-600 mb-4"></div> 
              <p v-if="Karyawan.sekolah" class="text-gray-600">{{ Karyawan.jurusan }}</p>
            </div>


            
            <div class="mb-16">
              <h2 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
              
                Dokumen
              </h2>
              <div class="w-16 h-1 bg-blue-600 mb-4"></div>
              <a v-if="Karyawan.dokumen" :href="`/${Karyawan.dokumen}`" target="_blank" class="text-blue-500 underline">
  Lihat Dokumen
</a>
               </div>
            
          </div>

          
        </div>
      </div>
                

      
            </div>
        </div>
   
      </Navbar>
</template>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#example')) {
    $('#example').DataTable({
        // konfigurasi DataTable
    });
}
    });

export default {
    name: "App",

    props: {
   Karyawan: Object,
   
    
  },

  methods: {
  
    navigateAndRefresh(url) {
      window.location.href = url; // Navigasi dan refresh total
    },

    confirmDelete(id) {
      // Tampilkan konfirmasi menggunakan SweetAlert2
      Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data yang sudah dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          // Jika pengguna mengonfirmasi, kirim permintaan hapus
          router.delete(route("profil.destroy", id), {
            onSuccess: () => {
              Swal.fire("Terhapus!", "Data berhasil dihapus.", "success");
            },
            onError: (error) => {
              Swal.fire("Error!", "Terjadi kesalahan saat menghapus data.", "error");
            },
          });
        }
      });
    }
  

  }
};


</script>