<template>
 
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
