<template>
  <Head title="Youtube" />

  <NavLayout>
    <!-- 
    xl:flex : only apply flex to xl screens and up on md screens and down, it will be ignored
   -->
    <div class="xl:flex">
      <div class="p-3">
        <video src="/videos/seoul-traffic.mp4" controls autoplay />
      </div>
    </div>
  </NavLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import CheckCircle from "vue-material-design-icons/CheckCircle.vue";
import ThumbUpOutline from "vue-material-design-icons/ThumbUpOutline.vue";
import ThumbDownOutline from "vue-material-design-icons/ThumbDownOutline.vue";

// defineProps({
//   canLogin: Boolean,
// });
</script>
