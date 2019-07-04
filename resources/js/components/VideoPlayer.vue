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
  },
  "playsinline": {
   "type": Boolean,
   "default": false
  },
  "start": {
   "type": Number,
   "default": 0
  },
  "options": {
   "type": Object,
   "default": () => ({})
  },
  "customEvent": {
   "type": String,
   "default": 'statechaged'
  },
  "events": {
   "type": Array,
   "default": () => []
  },
  "globals": {
   "type": Object,
   "default": () => (
    {
     "errorDisplay": false,
     "autoplay": false,
     "controls": true,
     "preload": 'auto',
     "fluid": false,
     "muted": false,
     "techOrder": ['html5'],
     "controlBar": {
      "remainingTimeDisplay": false,
      "playToggle": {},
      "progressControl": {},
      "fullscreenToggle": {},
      "volumeMenuButton": {
       "inline": false,
       "vertical": true
      }
     },
     "plugins": {}
    }
   )
  }
 },

 data() {
  return {
   "player": null, "reseted": true
  }
 }
}
</script>
