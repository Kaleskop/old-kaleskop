<template>

<transition name="fade">
 <div v-if="isOpen">
  <p>This website uses cookies to ensure you get the best experience on our website.</p>
  <button type="button" v-on:click="accept">Got It!</button>
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
