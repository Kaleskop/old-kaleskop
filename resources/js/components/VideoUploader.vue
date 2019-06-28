<template>

<div></div>

</template>

<script>
import FileUpload from "vue-upload-component";

export default {
 "name": "video-uploader",

 "components": { FileUpload },

 data() {
  return {
   "files": [],
   "minSize": 1024*1024*7,
   "size": 1024*1024*1000*0.9
  }
 },

 "computed": {
  "headers": function() {
   return { "X-CSRF-Token": window.KALESKOP.csrfToken }
  }
 }
}
</script>
