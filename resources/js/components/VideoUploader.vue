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
   "files": []
  }
 },

 "computed": {
  "headers": function() {
   return { "X-CSRF-Token": window.KALESKOP.csrfToken }
  }
 }
}
</script>
