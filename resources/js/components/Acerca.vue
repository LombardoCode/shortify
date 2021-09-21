<template>
  <div class="container mx-auto px-4 text-white fnt-quicksand my-6">
    <p class="text-center text-2xl md:text-3xl mb-4">Este proyecto ha sido realizado por:</p>
    <p class="text-center text-4xl md:text-5xl mb-4">Lombardo Moreno Rodríguez</p>
    <p class="text-center text-xl md:text-2xl mb-10">2021</p>
    <div class="flex flex-col md:flex-row justify-center">
      <a href="https://www.linkedin.com/in/lombardo-moreno-rodr%C3%ADguez-bba399218/" class="text-2xl border-2 border-white px-3 py-2 rounded-md transition-all duration-200 hover:bg-white hover:text-black mb-5 md:mb-0 md:mr-5">
        <font-awesome-icon :icon="['fab', 'linkedin']" />
        Linked in
      </a>
      <a href="https://github.com/LombardoCode/shortify" class="text-2xl border-2 border-white px-3 py-2 rounded-md transition-all duration-200 hover:bg-white hover:text-black mb-5 md:mb-0">
        <font-awesome-icon :icon="['fab', 'github']" />
        Github
      </a>
    </div>
  </div>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faGithub, faLinkedin } from '@fortawesome/free-brands-svg-icons'
library.add(faGithub, faLinkedin);

export default {

}
</script>

<style>
  .fnt-quicksand {
    font-family: 'Quicksand', 'Arial', sans-serif;
  }
</style>
