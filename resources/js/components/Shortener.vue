<template>
  <div class="container mx-auto px-3 mt-4">

    <div class="fnt-quicksand w-full lg:w-3/4 mx-auto">
      <div v-if="errores.mostrar" class="bg-red-600 text-white px-4 py-3 mb-2 rounded-md overflow-hidden">
        <div class="text-center">
          <div v-for="(error, index) in errores.datos" :key="index">
            <p v-for="(llave, index2) in error" :key="index2">
              <i class="far fa-times-circle"></i>
              {{ llave }}
            </p>
          </div>
        </div>
      </div>
      <div v-if="datos_url.url_corta" class="bg-green-600 text-white px-4 py-3 mb-2 rounded-md overflow-hidden">
        <p class="text-center">¡El URL ha sido generado!</p>
        <a v-if="datos_url.url_corta_completa" :href="datos_url.url_corta_completa" class="block text-center text-xl mt-3 underline">{{ datos_url.url_corta_completa }}</a>
      </div>
      <div class="bg-white px-3 py-4 rounded-md overflow-hidden">
        <p class="text-center text-xl font-bold py-2">Ingrese el URL a acortar</p>
        <div class="px-4 pt-2 pb-1 xl:pb-3">
          <form @submit.prevent="crearURL()">
            <input type="hidden" name="_token" :value="csrf">
            <div class="xl:flex">
              <input type="text" name="url" id="url" class="w-full xl:w-auto xl:flex-1 px-3 py-2 xl:mr-3 rounded-md border-2 border-gray-400 focus:border-blue-500 outline-none" placeholder="Ingrese la URL a acortar" v-model="datos_url.url_original">
              <input type="submit" class="w-full xl:w-auto px-3 py-5 xl:py-2 mt-4 xl:mt-0 rounded-md transition-all duration-200 bg-blue-900 hover:bg-blue-1000 cursor-pointer text-white text-lg" value="Acortar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      datos_url: {
        url_original: '',
        url_corta: '',
        url_corta_completa: ''
      },
      errores: {
        mostrar: false,
        datos: []
      }
    }
  },
  methods: {
    crearURL() {
      axios.post('/api/url', this.datos_url)
      .then(res => {
        console.log(res.data);

        if (res.data.success) {
          // Eliminamos los errores
          this.errores.mostrar = false;
          this.errores.datos = [];

          // Guardamos las URLs
          this.datos_url.url_corta = res.data.url_corta;
          this.datos_url.url_corta_completa = window.location.href + res.data.url_corta;
        } else {
          if (!res.data.success) {
            // Guardamos y mostramos los errores
            this.errores.mostrar = true;
            this.errores.datos = res.data.errores;

            // Eliminamos las URLs generadas
            this.datos_url.url_corta = '';
            this.datos_url.url_corta_completa = '';
          }
        }
      })
      .catch(err => {
        console.log(err);
      })
    }
  }
}
</script>

<style>
  .fnt-quicksand {
    font-family: 'Quicksand', 'Arial', sans-serif;
  }
</style>
