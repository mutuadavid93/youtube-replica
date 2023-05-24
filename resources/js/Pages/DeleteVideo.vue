<template>
  <Head title="Youtube" />

  <NavLayout>
    <div class="max-w-2xl mx-auto p-4">
      <!-- 

        NOTE: Styling Tables with TailwindCSS

        1. min-w-full : ensures that the element takes up at least the full available width, but it can expand further if needed.

        width="320" when only set without height, the video will be displayed with its original aspect ratio, scaled to fit the 
        specified width while maintaining its proportions.

        setting the height explicitly will need you adjust it to your layout requirements.
       -->

      <table class="min-w-full">
        <thead class="border-b">
          <tr class="text-white flex justify-between">
            <th scope="col" class="text-sm font-medium px-6 py-4 text-left">Videos</th>
            <th scope="col" class="text-sm font-medium px-6 py-4 text-left">Options</th>
          </tr>
        </thead>

        <tbody>
          <tr class="border-b flex justify-between">
            <td class="px-6 py-4 w-7/12 text-sm font-medium text-gray-900">
              <video
                src="/videos/seoul-traffic.mp4"
                width="320"
                controls
                type="video/mp4"
              ></video>
            </td>
            <td class="px-6 py-4 w-5/12 text-sm font-medium text-gray-900 relative">
              <!-- We can have div inside table elements too  -->
              <div class="text-white font-extrabold mb-4">This is a title</div>
              <div class="w-full">
                <button
                  class="text-white absolute bottom-4 right-4 text-xs bg-red-600 hover:bg-red-700 font-bold py-1 px-1 float-right rounded cursor-pointer"
                >
                  Delete
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </NavLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";

// defineProps({
//   canLogin: Boolean,
// });
</script>
