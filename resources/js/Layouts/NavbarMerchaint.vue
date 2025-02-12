<script setup>
import { ref } from 'vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
     <div class="min-h-screen flex overflow-hidden">
  <nav class="flex flex-col bg-gray-200 dark:bg-gray-900 w-64 px-12 pt-4 pb-6">
		<!-- SideNavBar -->

		

		<div class="mt-8">
			<!-- User info -->
		
			<h2
				class="mt-4 mb-2 text-xl dark:text-gray-300 font-extrabold capitalize">
				Hello     {{ $page.props.auth.user.name }}
			</h2>
			<span class="text-sm dark:text-gray-300 pt-8">
				<span class="font-semibold text-green-600 dark:text-green-300">
					{{ $page.props.auth.user.role }}
				</span>
			
			</span>
		</div>

	
		<ul class="mt-2 text-gray-600">
			<!-- Links -->
			<li class="mt-8">
				<a class="flex" :href="route('dashboard')">
					<svg
						class="fill-current h-5 w-5 dark:text-gray-300"
						viewBox="0 0 24 24">
						<path
							d="M16 20h4v-4h-4m0-2h4v-4h-4m-6-2h4V4h-4m6
							4h4V4h-4m-6 10h4v-4h-4m-6 4h4v-4H4m0 10h4v-4H4m6
							4h4v-4h-4M4 8h4V4H4v4z"></path>
					</svg>
					<span
						class="ml-2 capitalize font-medium text-black
						dark:text-gray-300">
						dashboard
					</span>
				</a>
			</li>

			<li class="mt-8">
				<a class="flex" :href="route('profil.index')">
					<svg
						class="fill-current h-5 w-5 dark:text-gray-300"
						viewBox="0 0 24 24">
						<path
							d="M16 20h4v-4h-4m0-2h4v-4h-4m-6-2h4V4h-4m6
							4h4V4h-4m-6 10h4v-4h-4m-6 4h4v-4H4m0 10h4v-4H4m6
							4h4v-4h-4M4 8h4V4H4v4z"></path>
					</svg>
					<span
						class="ml-2 capitalize font-medium text-black
						dark:text-gray-300">
						Profil
					</span>
				</a>
			</li>

			<li class="mt-8">
				<a class="flex" :href="route('makanan.index')">
					<svg
						class="fill-current h-5 w-5 dark:text-gray-300"
						viewBox="0 0 24 24">
						<path
							d="M16 20h4v-4h-4m0-2h4v-4h-4m-6-2h4V4h-4m6
							4h4V4h-4m-6 10h4v-4h-4m-6 4h4v-4H4m0 10h4v-4H4m6
							4h4v-4h-4M4 8h4V4H4v4z"></path>
					</svg>
					<span
						class="ml-2 capitalize font-medium text-black
						dark:text-gray-300">
						Menu
					</span>
				</a>
			</li>

			<li class="mt-8">
				<a class="flex" :href="route('merchaint.order')">
					<svg
						class="fill-current h-5 w-5 dark:text-gray-300"
						viewBox="0 0 24 24">
						<path
							d="M16 20h4v-4h-4m0-2h4v-4h-4m-6-2h4V4h-4m6
							4h4V4h-4m-6 10h4v-4h-4m-6 4h4v-4H4m0 10h4v-4H4m6
							4h4v-4h-4M4 8h4V4H4v4z"></path>
					</svg>
					<span
						class="ml-2 capitalize font-medium text-black
						dark:text-gray-300">
						Daftar Order
					</span>
				</a>
			</li>

			


		</ul>

		<div class="mt-auto flex items-center text-red-700 dark:text-red-400">
		
            <ResponsiveNavLink class="text-red-700 dark:text-red-400 w-full" :href="route('logout')" method="post" as="button">
				<svg class="fill-current h-10 w-10" viewBox="0 0 24 24">
					<path
						d="M16 17v-3H9v-4h7V7l5 5-5 5M14 2a2 2 0 012
						2v2h-2V4H5v16h9v-2h2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V4a2 2
						0 012-2h9z"></path>

						Logout
				</svg>
				
                            </ResponsiveNavLink>

		</div>
	</nav>

 
            <!-- Page Content -->
            <main class="w-full ">
                <slot />
            </main>

</div>
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