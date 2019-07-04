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
 },

 mounted() {
  console.log('mounted..')
  if (!this.player) { this.init(); }
 },

 "methods": {
  init() {
   console.log('init..');
   const videoOptions = Object.assign({}, this.globals, this.options);

   const emitState = (event, value) => {
    if (event) { this.$emit(event, this.player); }
    if (value) { this.$emit(this.customEvent, { [event]: value }); }
   }

   this.player = videojs(this.$refs.video, videoOptions);
   this.player.src(this.getSources());
   this.player.addClass('vjs-kaleskop');
   this.player.addClass('vjs-16-9');
   this.player.addClass('vjs-big-play-centered');
  },

  getSources() {
   let sources = [];
   sources.push({
    "src": this.adv.video.storage_url,
    "type": this.adv.video.type
   });

   return sources;
  }
 }
}
</script>
