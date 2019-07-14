<template>

<transition name="fade">
 <div class="fixed z-50 bottom-0 right-0 w-full md:w-64 md:mb-4 md:mr-4 p-4 shadow-lg md:rounded border-2 border-black text-center bg-white text-black" v-if="isOpen">
  <p class="mb-4">This website uses cookies to ensure you get the best experience on our website.</p>
  <button type="button" class="cursor-pointer whitespace-nowrap inline-block py-1 px-2 rounded tracking-wide text-center bg-black text-white" v-on:click="accept">Got It!</button>
 </div>
</transition>

</template>

<script>
export default {
 "name": "cookie-strip",

 data() {
  return {
   "isOpen": false
  }
 },

 created() {
  if ( !this.getVisited() === true ) {
   this.isOpen = true;
  }
 },

 "methods": {
  getVisited() {
   return localStorage.getItem('cookie:accepted');
  },
  setVisited() {
   localStorage.setItem('cookie:accepted', true);
  },
  accept() {
   this.setVisited();
   this.isOpen = false;
  }
 }
}
</script>
