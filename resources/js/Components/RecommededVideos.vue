<template>
  <div @mouseover="show = true" @mouseleave="show = false">
    <!-- 
        - if show is false, show the thumbnail, else show nothing
    -->
    <img
      width="340"
      :src="vid.thumbnail || ''"
      class="aspect-video cursor-pointer rounded-lg"
      :class="show ? 'delay-350 hidden' : ''"
    />

    <div
      class="w-full h-full aspect-video cursor-pointer"
      :class="show ? '' : 'delay-350 hidden'"
    >
      <!-- TIP: add 340 width equevalent to image thus they are same size  -->
      <video width="340" ref="video" muted :src="vid.video || ''" type="video/mp4" />
    </div>
  </div>

  <!--
    w-[500px]: This 500px is to explicitly set its width to 500 pixels, potentially overriding 
    any width settings inherited from its parent elements i.e. 500px too.
    
    - This allows for a specific width constraint on the nested element within the larger layout.
  -->
  <div class="w-[500px]">
    <div class="px-1.5 pl-3 text-white mt-1">
      <div class="text-[15px] pb-1.5 font-extrabold w-full cursor-pointer">
        {{ vid.title }}
      </div>
      <div
        class="text-[12px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer"
      >
        {{ vid.user }} <CheckCircle fillColor="#888888" :size="17" />
      </div>
      <div class="text-sm mb-1 text-gray-300 cursor-pointer">{{ vid.views }}</div>
    </div>
  </div>
</template>

<script setup>
import { ref, toRefs, watch } from "vue";
import CheckCircle from "vue-material-design-icons/CheckCircle.vue";

const props = defineProps({ vid: Object });
const { vid } = toRefs(props);

let show = ref(false);
let video = ref(null);

watch(
  () => show.value,
  (show) => {
    // Pause the currently playing media, if any
    if (video.value !== null && !video.value.paused) {
      video.value.pause();
      video.value.currentTime = 0;
    }

    // If show is true, show the video
    if (show) {
      video.value.play();
      return "";
    }

    // else
    video.value.pause();
    video.value.currentTime = 0;
  }
);
</script>

<style lang="scss" scoped></style>
