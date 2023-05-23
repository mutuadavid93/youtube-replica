<template>
  <Head title="Youtube" />

  <NavLayout>
    <!-- 
    xl:flex : only apply flex to xl screens and up on md screens and down, it will be ignored
   -->
    <div class="xl:flex">
      <div class="p-3">
        <video src="/videos/seoul-traffic.mp4" controls autoplay />
        <div class="text-white text-2xl font-extrabold mt-4">A cool video</div>
        <div class="flex items-center mb-4">
          <img
            class="rounded-full mt-1.5 flex items-baseline w-8 h-8"
            :src="
              `https://picsum.photos/id/${(Math.random() * 100).toFixed(0)}/100` || ''
            "
          />
          <div class="pl-2 mt-1">
            <div class="text-white text-lg font-extrabold flex items-center">
              John Doe <CheckCircle fillColor="#888888" :size="17" />
            </div>
            <div class="text-sm text-gray-400 font-extrabold">1k views - 3 days ago</div>
          </div>
        </div>

        <div class="bg-[#3F3F3F] rounded-lg w-full p-3 text-white">
          <div class="text-white text-lg font-extrabold">1k views - 3 days ago</div>
          <div class="text-sm font-extrabold mb-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </div>
          <div class="text-sm font-extrabold">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type
            specimen book.
          </div>
        </div>

        <div class="mt-6">
          <div class="text-white text-lg font-extrabold">12 Comments</div>
          <!-- stretches the flex items to fill the container along the cross-axis
          useful when you want the items to expand vertically to match the height of the container.
           -->
          <div class="flex items-flex mb-4 mt-2">
            <img
              class="rounded-full mt-2 w-12 h-12"
              :src="
                `https://picsum.photos/id/${(Math.random() * 100).toFixed(0)}/100` || ''
              "
            />
            <div class="pl-6 mt-1">
              <div class="text-white font-extrabold flex items-baseline">
                <div>Alex Smith</div>
                <div class="text-gray-400 pl-3">6 days ago</div>
              </div>

              <div class="text-gray-200 text-sm font-semibold">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo amet impedit
                soluta ea iusto odio culpa quos laboriosam, numquam quibusdam, possimus
                autem nisi, ut neque reprehenderit tempora aut id dolorem. Sed ab iure
                dicta soluta vel, id mollitia. Eligendi placeat quos vitae illo expedita?
                Illo voluptatum quia error iste tempore commodi inventore ullam, magni
                sunt nulla quaerat excepturi harum omnis?
              </div>

              <div class="mt-4 flex items-center">
                <ThumbUpOutline fillColor="#FFFFFF" :size="20" class="pr-2" />
                <div class="text-gray-400 text-sm font-extrabold pr-10">
                  {{ (Math.random() * 100).toFixed(0) }}
                </div>
                <ThumbDownOutline fillColor="#FFFFFF" :size="20" />
              </div>
            </div>
          </div>
        </div>
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
