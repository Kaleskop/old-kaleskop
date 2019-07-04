<template>

<div>
 <video class="video-js " ref="video"></video>
</div>

</template>

<script>
import _vjs from "video.js";
const videojs = window.videojs || _vjs;

export default {
 "name": "video-player",

 "props": {
  "adv": {
   "type": Object,
   "required": true
  }
 },

 data() {
  return {
   "player": null, "reseted": true
  }
 }
}
</script>
