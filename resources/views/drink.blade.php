@php
 $isFavorite = \App\Models\FavoriteDrink::isFavorite($drink['idDrink']);

@endphp
<x-site-layout>
  <div class="flex flex-col md:flex-row p-4 container mx-auto">
    <div class="flex flex-col lg:basis-[70%]">
      <h1 class="mb-2 ml-2 text-2xl font-bold tracking-tight text-gray-900">{{$drink['strDrink']}}</h1>
      <div>
        <img class="rounded" src="{{$drink['strDrinkThumb']}}" alt="">
      </div>
      <div class="my-2">
              <button type="button" data-drink-id="{{$drink['idDrink']}}" name="add_favorite" class="{{!$isFavorite ? '' : 'hidden'}} text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none ">Add to Favorites</button>
              <button type="button" data-drink-id="{{$drink['idDrink']}}" name="remove_favorite" class="{{$isFavorite ? '' : 'hidden'}} text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none ">Remove to Favorites</button>

      </div>
    </div>

    <div class="mt-12 lg:mt-0">
      <h2 class="mb-4 ml-2 text-2xl text-center font-bold tracking-tight text-gray-900">Ingredients</h2>

      <div class="flex flex-wrap md:ml-5 lg:basis-[30%]">
        @foreach ($ingredients as $ingredient)
        <div class="basis-1/4">
          <img class="rounded" src="{{$ingredient['ingredientThumb']}}" alt="">
          <p class="text-center font-semibold text-gray-800">{{$ingredient['strIngredient']}}</p>
        </div>
      @endforeach
      </div>
    </div>
  </div>

    <x-slot name="scripts">
        <script src="{{asset('js/pages/drink.js')}}"></script>
    </x-slot>
</x-site-layout>
