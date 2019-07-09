<template>

<div class="inline-block rounded border-2 border-black shadow-md">
 <div>
  <div class="relative pt-8 pb-4 px-4">
   <form>
    <file-upload
     name="uservideo" accept="video/*" class="video-uploader" post-action="/videos/upload"
     ref="upload" v-model="files"
     v-bind:headers="headers"
     v-bind:size="size"
     v-on:input-file="inputFile"
     add-index
    >Select Video</file-upload>
   </form>

   <div>
    <div v-for="file in files" v-bind:key="file.index">
     <div v-if="file.success" class="my-4 p-2">
      <p class="font-medium text-2xl">Mission complete!</p>
     </div>
     <div v-else>
      <div class="relative p-2 border border-black">
       <div class="mb-4 text-center">
        <button type="button" v-on:click.prevent="remove(file)">Remove</button>
       </div>

       <p class="mb-2 font-bold">{{ file.name }}</p>
       <p class="text-sm"><span>{{ file.size }}</span> <span>{{ file.type }}</span></p>
      </div>

      <div v-if="file.active || file.progress !== '0.00'" class="py-4 text-center">
       <span class="font-semibold text-3xl">{{ file.progress }}%</span>
      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="relative py-6 px-4 border-t border-black text-center">
   <button type="button" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center" v-if="!$refs.upload || !$refs.upload.active" @click="$refs.upload.active = true">Upload</button>
   <button type="button" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center" v-else @click="$refs.upload.active = false">Stop</button>
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
