<template>
  <div class="container mx-auto px-3 mt-4">
    <div class="bg-white rounded-md overflow-hidden fnt-quicksand py-2 w-full lg:w-3/4 mx-auto">
      <div class="px-3 py-4">
        <p class="text-center text-xl font-bold">Ingrese el URL a acortar</p>
      </div>
      <div class="px-4 pt-2 pb-4">
        <div class="xl:flex">
          <input type="text" name="url" id="url" class="w-full xl:w-auto xl:flex-1 px-3 py-2 xl:mr-3 rounded-md border-2 border-gray-400 focus:border-blue-500 outline-none" placeholder="Ingrese la URL a acortar">
          <input type="submit" class="w-full xl:w-auto px-3 py-5 xl:py-2 mt-4 xl:mt-0 rounded-md transition-all duration-200 bg-blue-900 hover:bg-blue-1000 cursor-pointer text-white text-lg" value="Acortar">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>
  .fnt-quicksand {
    font-family: 'Quicksand', 'Arial', sans-serif;
  }
</style>
