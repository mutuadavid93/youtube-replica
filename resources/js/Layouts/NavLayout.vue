<template>
  <!-- HINT: start out by setting ancestor div to `relative` -->
  <div class="relative">
    <!-- start navigation setup  -->
    <div
      id="TopNav"
      class="w-[100%] h-[60px] fixed bg-black z-20 flex items-center justify-between"
    >
      <div class="flex items-center">
        <!-- TIP: icons should always be inside buttons if a click event is to be used on them -->
        <button
          type="button"
          @click="openSideNav = !openSideNav"
          class="p-2 ml-3 rounded-full hover:bg-gray-800 inline-block cursor-pointer"
        >
          <MenuIcon fillColor="#FFFFFF" :size="26" />
        </button>

        <!-- space between two elements -->
        <div class="mx-2"></div>

        <!-- Logo -->
        <div class="flex items-center justify-center text-white mr-10 cursor-pointer">
          YOUTUBE
        </div>
      </div>

      <!-- start search input -->

      <!-- 
        md:block  hidden: 
        i.e. screens that meet or exceed the medium breakpoint (768px) 
        The element will be visible only on medium-sized screens and above.
       -->
      <div class="w-[600px] md:block hidden">
        <div class="flex items-center">
          <div class="rounded-full flex w-full items-center bg-[#222222]">
            <!-- 
                EXPLANATION::
                ============

                1. text-base: deafault font size i.e. 16px or 1rem
                2. block: Sets the display of the element to block, making it take up the full width available.
                3. w-full: Sets the width of the element to 100% of its parent container.
                4. bg-clip-padding: apply background-color only to the padding area of the element, excluding the border.
                5. transition: Applies a transition effect to the element.
                6. ease-in-out: Specifies the easing function for the transition (in this case, ease-in-out).
                7. focus:ring-0: Removes the focus ring when the element is in focus.
                8. m-0: Sets the margin to 0 (removes any default margin).
             -->

            <!-- prettier-ignore -->
            <input type="text" class="
            form-control 
            block 
            w-full 
            px-5 
            py-1.5 
            text-base 
            font-normal 
            text-gray-200
            bg-black
            placeholder-gray-400 
            bg-clip-padding
            border
            border-solid
            border-l-gray-700
            border-y-gray-700
            rounded-l-full
            transition
            ease-in-out
            m-0
            border-transparent
            focus:ring-0" 
            placeholder="Search" />

            <button class="w-[54px] h-[40px] m-0 pl-3">
              <MagnifyIcon fillColor="#FFFFFF" :size="23" />
            </button>
          </div>

          <button
            type="button"
            class="p-2 ml-2 rounded-full bg-[#222222] hover:bg-gray-700"
          >
            <MicrophoneIcon fillColor="#FFFFFF" :size="23" />
          </button>
        </div>
      </div>
      <!-- end search input -->

      <div class="flex items-baseline">
        <button type="button" class="p-2 rounded-full hover:bg-gray-700 cursor-pointer">
          <VideoPlusOutlineIcon fillColor="#FFFFFF" :size="23" />
        </button>
        <button
          type="button"
          class="p-2 ml-2 rounded-full hover:bg-gray-700 cursor-pointer"
        >
          <BellOutLine fillColor="#FFFFFF" :size="23" />
        </button>
        <img
          src="https://yt3.ggpht.com/yti/AHyvSCDKOQ3lxeNSnUyu823Rn1KPMPA8EFigKDIbjvIMrw=s88-c-k-c0x00ffffff-no-rj-mo"
          class="rounded-full mx-8"
          width="35"
        />
      </div>
    </div>
    <!-- end navigation setup  -->

    <!-- start side navigation -->
    <div
      id="SideNav"
      :class="!openSideNav ? 'w-[70px]' : 'w-[240px]'"
      class="h-[100%] fixed z-0 bg-black"
    >
      <ul
        :class="!openSideNav ? 'p-2' : '-ml-2 px-5 pb-2 pt-[7px]'"
        class="mt-[60px] w-full"
      >
        <SideNavItem :openSideNav="openSideNav" iconString="Home" />
        <SideNavItem :openSideNav="openSideNav" iconString="Add Video" />
        <SideNavItem :openSideNav="openSideNav" iconString="Delete Video" />

        <!-- the horizontal line + some space -->
        <div class="border-b border-b-gray-700 my-2.5"></div>

        <SideNavItem :openSideNav="openSideNav" iconString="Subscriptions" />
        <SideNavItem :openSideNav="openSideNav" iconString="Library" />
        <SideNavItem :openSideNav="openSideNav" iconString="Liked" />
        <SideNavItem :openSideNav="openSideNav" iconString="History" />
        <SideNavItem :openSideNav="openSideNav" iconString="Watch Later" />

        <div v-if="openSideNav">
          <div class="border-b border-b-gray-700 my-2.5"></div>
          <div class="text-gray-400 text-[14px] font-extrabold">
            About Press Copyright
            <div>Contact us</div>
            Creator Advertise Developers
          </div>

          <div class="border-b border-b-gray-700 my-2.5"></div>

          <div class="text-gray-400 text-[14px] font-extrabold">
            Terms Privacy Policy & Safety
            <div>How YouTube works</div>
            <span> Test new features</span>
          </div>
        </div>
      </ul>
    </div>
    <!-- end side navigation -->
    <div id="SideNavOverlay"></div>

<!-- 60px is the height of nav bar -->
    <div class="w-[100%] h-[calc(100vh-60px)] absolute right-0 top-[60px]"
    :class="{'w-[calc(100%-70px)]': !openSideNav, 'w-[calc(100%-240px)]': openSideNav}"
    >
      <slot />
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import MenuIcon from "vue-material-design-icons/Menu.vue";
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";
import MicrophoneIcon from "vue-material-design-icons/Microphone.vue";
import BellOutLine from "vue-material-design-icons/BellOutline.vue";
import SideNavItem from "@/Components/SideNavItem.vue";
import VideoPlusOutlineIcon from "vue-material-design-icons/VideoPlusOutline.vue";

let openSideNav = ref(true);
</script>

<style>
body {
  background-color: black;
}
</style>
