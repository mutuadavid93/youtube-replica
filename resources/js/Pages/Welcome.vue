<template>
  <Head title="Youtube" />

  <NavLayout>
    <!-- 
    RESPONSIVENESS ::
    ================

    2xl:grid-cols-5: extra-large screens (1536px and up) e.g. 4k monitor such as iMac Pro
    xl:grid-cols-4: large screens (1280px and up) e.g. desktop
    lg:grid-cols-3: medium screens (1024px and up) e.g. laptop
    md:grid-cols-3: small screens (768px and up) e.g. iPad and Tablets
    sm:grid-cols-2: extra-small screens (640px and up) e.g. iPhone 6/7/8 Plus and Android phones

    NOTE: For screens smaller than the specified breakpoint, the default number of columns specified 
    in other breakpoints will be used. Or the default value will be applied.


   -->
    <div
      class="grid 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2"
    >
      <div v-for="(video, index) in videos" :key="video">
        <Link :href="route('videos.show', { id: video.id })">
          <VideoCard
            :title="video.title"
            :user="video.user"
            :views="video.views"
            :image="`https://picsum.photos/id/${index}/100`"
            :videoUrl="video.video"
            :thumbnail="video.thumbnail"
          />
        </Link>
      </div>
    </div>
  </NavLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import VideoCard from "@/Components/VideoCard.vue";

// Extra props
defineProps({
  videos: Array,
});
</script>

<style>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}
</style>
