<x-site-layout>

  @if (!empty($drinks))
  <div class="w-full py-12 bg-gray-50 flex flex-col items-center justify-center">
    <div class="basis-full pb-3">
        <h2 class="text-3xl font-semibold text-gray-700">This is not what you were looking for ? Do another search</h2>
    </div>
    <x-search-form placeholder="Type a cocktail name here..." :action="route('site.results')" input-name="drink_name"/>
  </div>

  <div>
      <div>
          <h2 class="text-3xl font-black text-gray-700 ml-8">Results</h2>
      </div>
      <div class="flex flex-col justify-center md:justify-start items-center md:flex-row md:items-start flex-wrap">
      @foreach ($drinks as $value)
      <x-card :name="$value['strDrink']" :tumb="$value['strDrinkThumb']" :url="route('site.drink', ['id' => $value['idDrink']])" />
        @endforeach
  </div>
  </div>
  @else
  <div class="w-full pt-32 bg-gray-50 flex flex-col items-center justify-start h-screen">
    <div class="pb-3">
        <h2 class="text-3xl font-semibold text-gray-700">Your search yielded no results...</h2>
    </div>
    <x-search-form placeholder="search for another drink" :action="route('site.search')" input-name="drink_name"/>
  </div>
  @endif
</x-site-layout>
