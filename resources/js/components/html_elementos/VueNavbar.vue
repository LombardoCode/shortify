<template>
  <div class="py-2">
    <div class="container mx-auto px-3">
      <nav class="flex flex-col lg:flex-row fnt-quicksand">
        <div class="flex-1 flex justify-between items-center">
          <a href="/" class="py-2 text-2xl text-white select-none">shortify</a>
          <div class="lg:hidden px-4 py-2 border-2 border-white rounded-md transition-all duration-200 hover:bg-white cursor-pointer text-white hover:text-black" @click="toggleNav()">
            <font-awesome-icon :icon="['fa', 'bars']" />
          </div>
        </div>
        <ul class="lg:block select-none" :class="nav.mostrar ? 'block' : 'hidden'">
          <li>
            <a href="/acerca-de" class="inline-block w-full lg:w-auto px-5 py-3 text-center lg:text-left transition-all duration-200 hover:bg-white hover:text-black rounded-none lg:rounded-full text-white font-bold">
              Acerca de
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faBars } from '@fortawesome/free-solid-svg-icons'
library.add(faBars)

export default {
  mounted() {

  },
  data() {
    return {
      nav: {
        mostrar: false
      }
    }
  },
  methods: {
    toggleNav() {
      this.nav.mostrar = !this.nav.mostrar;
    }
  }
}
</script>

<style>
  .fnt-quicksand {
    font-family: 'Quicksand', 'Arial', sans-serif;
  }
</style>
