<template>

<div>
 <div>
  <div>
   <form>
    <file-upload
     name="uservideo" accept="video/*" class="video-uploader" post-action="/videos/upload"
     ref="upload" v-model="files"
     v-bind:headers="headers"
     v-bind:size="size"
     v-on:input-file="inputFile"
     add-index
    >Add file</file-upload>
   </form>

   <div>
    <div v-for="file in files" v-bind:key="file.index">
     <div v-if="file.success">
      <p>Mission complete!</p>
     </div>
     <div v-else>
      <div>
       <div>
        <button type="button" v-on:click.prevent="remove(file)">Remove</button>
       </div>

       <p>{{ file.name }}</p>
       <p><span>{{ file.size }}</span> <span>{{ file.type }}</span></p>
      </div>

      <div v-if="file.active || file.progress !== '0.00'">
       <span>{{ file.progress }}%</span>
      </div>
     </div>
    </div>
   </div>
  </div>

  <div>
   <button type="button" v-if="!$refs.upload || !$refs.upload.active" @click="$refs.upload.active = true">Upload</button>
   <button type="button" v-else @click="$refs.upload.active = false">Stop</button>
  </div>
 </div>
</div>

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
 },

 "methods": {
  remove(file) {
   this.$refs.upload.remove(file)
  },
  inputFile(newFile, oldFile) {
   if (newFile && !oldFile) {
    // add
    console.log('add');
   }
   if (newFile && oldFile) {
    // update
    console.log('update');

    // before send
    if (newFile.active && !oldFile.active) {
     if (newFile.size >= 0 && newFile.size < this.minSize) {
      this.$refs.upload.update(newFile, { "error": 'size' });
      console.log('size', newFile.size);
     }
    }

    // Upload progress
    if (newFile.progress !== oldFile.progress) {
     console.log('progress', newFile.progress);
    }

    // Uploaded successfully
    if (newFile.success !== oldFile.success) {
     console.log('success', newFile.success);
    }
   }
   if (!newFile && oldFile) {
    // remove
    console.log('remove');
   }
  }
 }
}
</script>
