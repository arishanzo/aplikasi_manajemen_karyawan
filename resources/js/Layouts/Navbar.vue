<script setup>
import { ref } from 'vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
		<nav class=" w-full max-w-screen-2xl px-4 py-2 mx-auto bg-white shadow-md rounded-md lg:px-8 lg:py-3 mt-10">
  <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
    <a href="#" class="mr-4 block cursor-pointer py-1.5 text-base text-slate-800 font-semibold">
      PT. Pificia Group
    </a>
 
    <div class="lg:block">
      <ul v-if="$page.props.auth.user.role === 'user'" class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
     
        
        <li
        class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
        <a class="flex font-semibold" :href="route('dashboard')">
						Home
				</a>
        </li>
		  
        <li
        class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
        <a class="flex font-semibold" :href="route('DataKaryawan.index')">
						Data Diri
				</a>
        </li>
		<li
        class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
        <a class="flex font-semibold" :href="route('DataHadir.index')">
						Manajemen Absen
				</a>
        </li>
		<li
        class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
        <a class="flex font-semibold" :href="route('HistoryAudit.index')">
						History
				</a>
        </li>
        <li
        class="flex items-center p-1 text-sm gap-x-2  text-slate-600">
        <a
        :href="route('logout')"
            class="inline-flex font-semibold items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide transition duration-200 rounded shadow-md  hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
          >
            Log Out
    </a>
        </li>
      </ul>

      <ul v-else class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
     
        
     <li
     class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
     <a class="flex font-semibold" :href="route('dashboard')">
         Home
     </a>
     </li>
   
     <li
     class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
     <a class="flex font-semibold" :href="route('DataDepartemen.index')">
         Data Departemen
     </a>
     </li>

     <li
        class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
        <a class="flex font-semibold" :href="route('DataKaryawan.index')">
						Data Karyawan
				</a>
        </li>

 <li
     class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
     <a class="flex font-semibold" :href="route('DataHadir.index')">
         Manajemen Absen
     </a>
     </li>
 <li
     class="flex items-center p-1 text-sm gap-x-2 text-slate-600 ">
     <a class="flex font-semibold" :href="route('HistoryAudit.index')">
         History
     </a>
     </li>
     <li
     class="flex items-center p-1 text-sm gap-x-2  text-slate-600">
     <a
     :href="route('logout')"
         class="inline-flex font-semibold items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide transition duration-200 rounded shadow-md  hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
       >
         Log Out
 </a>
     </li>
   </ul>
    </div>
   
  </div>
</nav>

 
            <!-- Page Content -->
            <main class="w-full ">
                <slot />
            </main>

</template>

<script>
export default {
  methods: {
    navigateAndRefresh(url) {
      window.location.href = url; // Navigasi dan refresh total
    },
  },
};
</script>