<script setup>
import Navbar from '@/Layouts/Navbar.vue';

import { ref } from 'vue';
import { Head , Link, router, useForm } from '@inertiajs/vue3';


const fileInput = ref(null);

const form = useForm({
  file: null,
});

const triggerFileInput = () => {
  fileInput.value.click();
};


const handleFileUpload = (e) => {
  const file = e.target.files[0];
  if (!file) return;

  form.file = file;

  form.post(route('datakaryawan.import'), {
    preserveScroll: true,
    forceFormData: true, 
    onSuccess: () => {
      fileInput.value.value = ''; 
      window.location.reload();
    },
  });
};

</script>

<template>
    <Head title="Daftar Karyawan" />

    <Navbar>
        

        <div class="py-20">
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
     
               

<div class="pt-8 bg-white p-8 pb-8">
                <Link
                   
                   :href="route('DataKaryawan.create')"
                  
                   class="p-2  mb-16 btn btn-blue bg-blue-500  text-xl text-gray-100 hover:text-gray-200 rounded-md"
               >
                 Tambah Karyawan
               </Link>


               <button @click="triggerFileInput" class="m-4 bg-green-600 text-white px-4 py-2 rounded">
      Upload Excel
    </button>

    <p v-if="form.processing" class="mt-2 text-yellow-600">Uploading...</p>
    <p v-if="form.recentlySuccessful" class="mt-2 text-green-600">Import berhasil!</p>
    <p v-if="form.errors.file" class="mt-2 text-red-600">{{ form.errors.file }}</p>


    <input
      type="file"
      ref="fileInput"
      class="hidden"
      accept=".xlsx,.xls,.csv"
      @change="handleFileUpload"
    />
              </div>

              <div>
   
  </div>
              </div>

                <div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <table  id="example" class="table-auto w-full table-bordered">
        <thead class="bg-gray-200">
            <tr>
          <th  class="px-4 py-2">Nama Karyawan</th>
          <th  class="px-4 py-2">Nama Departemen</th>
          <th  class="px-4 py-2">No Hp</th>
          <th  class="px-4 py-2">alamat</th>
          <th  class="px-4 py-2">email</th>
          <th  class="px-4 py-2">sekolah</th>
          <th  class="px-4 py-2">jurusan</th>
          <th  class="px-4 py-2">linkmedsos</th>
          <th  class="px-4 py-2">dokumen</th>
          <th  class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>

        
        <tr v-for="karyawan in Karyawan" :key="karyawan.id_karyawan">
          <td class="border px-4 py-2">{{ karyawan.nama_karyawan }}</td>
          <td class="border px-4 py-2">{{ karyawan.departemen }}</td>
          <td class="border px-4 py-2">{{ karyawan.no_hp }}</td>
          <td class="border px-4 py-2">{{ karyawan.alamat }}</td>
          <td class="border px-4 py-2">{{ karyawan.email }}</td>
          <td class="border px-4 py-2">{{ karyawan.sekolah }}</td>
          <td class="border px-4 py-2">{{ karyawan.jurusan }}</td>
          <td class="border px-4 py-2">{{ karyawan.linkmedsos }}</td>
          <td class="border px-4 py-2">     <a v-if="karyawan.dokumen > 0 " :href="`/${karyawan.dokumen}`" target="_blank" class="text-blue-500 underline">
                Lihat Dokumen
                </a>
                <p  v-else> Belum Ada</p>
         </td>
                 <td class="border px-4 py-2 text-center"> 

            
            <Link
                    :href="route('DataKaryawan.edit', karyawan.id_karyawan)" 
                   
                    class="btn btn-blue-800 bg-blue-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
                >
                 Edit Data
                </Link>

                   
                   <!-- Tombol Hapus -->
                   <button @click="confirmDelete(karyawan.id_karyawan)" class="btn btn-blue-800 bg-red-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
            >
              Hapus
            </button>    
    
    </td>
        </tr>
      </tbody>
           
    </table>

   
    
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
          router.delete(route("DataKaryawan.destroy", id), {
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