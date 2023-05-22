<template>
  <div class="relative">
    <!-- 
    EXPLANATION::
    =============

    1. "transition ease-in-out delay-150": The transition (i.e. change) will be smooth, and will start after 150ms.
    2. "hover:translate-y-8": When you move your mouse over the element, it will go up or down by a small amount.
    3. "hover:scale-125": Element becomes a little bit bigger, 1.25 (125%) on hover.
    4. "duration-300": The transition will last for 300 milliseconds.
    5.  "aspect-video" : create a container that maintains the aspect ratio of a video. i.e. video retains its 
    proper width and height proportions, preventing it from being stretched or distorted.

   -->
    <div
      class="rounded-lg bg-black m-2"
      :class="[
        show && width > 639
          ? 'absolute z-30 transition ease-in-out delay-150 hover:translate-y-8 hover:scale-125 hover:bg-[#202020] duration-300'
          : '',
      ]"
    >
      <div
        @mouseover="show = true"
        @mouseleave="
          show = false;
          showVideo = false;
        "
      >
        <!-- 
            TIP: Multiple statements can be used inside a single attribute e.g. img below.
            - if showVideo is false, show the thumbnail, else show nothing
        -->
        <img
          :src="thumbnail || ''"
          class="aspect-video cursor-pointer"
          :class="
            (show ? 'transition ease-in-out delay-150 rounded-l-lg' : 'rounded-lg',
            showVideo ? 'delay-350 hidden' : '')
          "
        />
        <!-- if showVideo is true, show the video, else show nothing -->
        <div
          class="w-full h-full aspect-video cursor-pointer"
          :class="showVideo ? '' : 'delay-350 hidden'"
        >
          <video ref="video" muted :src="videoUrl || ''" type="video/mp4" />
        </div>
      </div>

      <div>
        <div class="flex mt-1.5">
          <div>
            <!-- TIP: individual elements e.g. img can as well be flexed -->
            <img
              class="rounded-full mt-1.5 flex items-baseline w-8 h-8"
              :src="image || ''"
            />
          </div>
          <div class="px-1.5 text-white mt-1">
            <div class="text-[17px] font-extrabold w-full cursor-pointer">
              {{ title.substring(0, 100) }}
            </div>
            <div
              class="text-[14px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer"
            >
              {{ user.substring(0, 30) }} <CheckCircle fillColor="#888888" :size="17" />
            </div>
            <div class="text-sm mb-1 text-gray-300 cursor-pointer">{{ views }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, toRefs, watch, onMounted } from "vue";
import CheckCircle from "vue-material-design-icons/CheckCircle.vue";

const props = defineProps({
  title: String,
  user: String,
  views: String,
  image: String,
  videoUrl: String,
  thumbnail: String,
});

// Convert props to refs
const { title, user, views, image, videoUrl, thumbnail } = toRefs(props);

// Local state
let show = ref(false);
let showVideo = ref(false);
let video = ref(null);
let width = ref(document.documentElement.clientWidth);

onMounted(() => {
  window.addEventListener("resize", () => {
    width.value = document.documentElement.clientWidth;
  });
});

// see - https://developer.mozilla.org/en-US/docs/Web/API/HTMLMediaElement
watch(
  () => show.value,
  (show) => {
    video.value.play();
    // If show is true, show the video
    if (show) {
      showVideo.value = true;
      video.value.play();
      return "";
    }

    // else
    showVideo.value = false;
    video.value.pause();
    video.value.currentTime = 0;
  }
);
</script>

<style lang="scss" scoped></style>
