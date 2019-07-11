<template>

<div>
 <button class="publish-button relative cursor-pointer w-2 h-2 rounded-full" v-on:click.prevent="toggle" v-bind:class="[ isPublished ? 'published' : '' ]">
  <span v-if="isPublished">Unpublish</span>
  <span v-else>Publish</span>
 </button>
</div>

</template>

<script>
export default {
 "name": "publish-button",

 "props": {
  "endpoint": {
   "type": String,
   "required": true
  },
  "published": {
   "type": Boolean
  }
 },

 data() {
  return {
   "isPublished": this.published
  }
 },

 "methods": {
  toggle() {
   this.isPublished ? this.unpublish() : this.publish();
  },
  publish() {
   axios.post(this.endpoint)
    .then(response => this.isPublished = true)
    .catch(response => console.log('Publish err', response.data))
  },
  unpublish() {
   axios.post(this.endpoint, { "_method": "delete" } )
    .then(response => this.isPublished = false)
    .catch(response => console.log('Unpublish err', response.data))
  }
 }
}
</script>
