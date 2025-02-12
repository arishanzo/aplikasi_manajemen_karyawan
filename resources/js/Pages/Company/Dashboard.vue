<script setup>
import NavbarCompany from '@/Layouts/NavbarCompany.vue';
import { Head, router } from '@inertiajs/vue3';

const formatRupiah = (value) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(value);
};

</script>

<template>
    <Head title="Dashboard" />

    <NavbarCompany>
        <div class="py-20">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-xl bg-shadow-gray-900 shadow-md  text-gray-900">Hello Selamat Datang, Di Aplikasi E-Katering </div>
                    
                    <section className="bg-gray-50 py-8 antialiased md:py-12">
  <div className="mx-auto md:max-w-screen-2xl px-4 2xl:px-0">
  
    <div className="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
      <div>
        <span class="mt-4 text-gray-500">Pilih Menu Makanan Disini Untuk Memesan Makanan Dengan Klik Makanan</span>
      </div>

      <div className="flex items-center space-x-4">

      <div
          >   <input type="text"
          v-model="searchQuery" 
              className="bg-transparent text-base font-normal  placeholder:text-gray-500 focus-within:outline-0"
              placeholder="Cari Data"
              
              />
                </div>
      </div>
     </div>
     
     <a href="" class="hover:bg-gray-800">
    <div className="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
  
      <div v-for="makanan in Makanan" key='' className="rounded-lg border border-gray-200 bg-white p-6 shadow-sm ">
   
        <div className=" w-full">
          <a :href="route('company.create', makanan.id_makanan)">
            <img v-if="makanan.foto" :src="`/storage/${makanan.foto}`"alt="Gambar" class="w-80 h-40 object-cover">

               </a>
        </div>
        <div className="pt-6">
          <div className="mb-4 flex items-center justify-between gap-4">
           
           
          </div>

          <a href='' className="text-lg font-semibold leading-tight text-gray-900 hover:underline ">{{ makanan.makanan }}</a>
          <div class="text-gray-500">
          <span>{{ makanan.jenis_makanan }} </span>
        </div>

        <div class="text-gray-500 mt-4">
          <span>{{ makanan.nama_perusahaan}}</span>
        </div>

        <div class="text-gray-500 ">
          <span>Lokasi : {{ makanan.alamat}}
           </span>
        </div>
    

          <ul className="mt-4 flex items-center gap-4">
         

            <li className="flex items-center gap-2">
            
              <p className="text-xl font-medium font-semibold text-gray-900">{{ formatRupiah (makanan.harga) }}</p>
            </li>
          </ul>

          <div class="text-gray-500 mt-2">
          <span>{{ makanan.deskripsi }} </span>
        </div>
        
        </div>
      
      </div>
  
    </div>
  </a>
   
  
  </div>
 
</section>
                </div>
                
            </div>
        </div>
    </NavbarCompany>
</template>

<script>
export default {
    
    name: "App",

    props: {
   Makanan: Object,
   search: String,
  },
  data() {
        return {
            searchQuery: this.search || "",
        };
    },
    watch: {
        searchQuery(value) {
            router.get('/company', { search: value }, { preserveState: true, replace: true });
        }
    },
    methods: {
        goToPage(url) {
            router.get(url);
        }
    }
  
};
</script>