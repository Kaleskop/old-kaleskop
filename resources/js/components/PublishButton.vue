<template>

<div></div>

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
 }
}
</script>
