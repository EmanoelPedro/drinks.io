<x-site-layout>

  <div class="w-full pt-32 bg-gray-50 flex flex-col items-center justify-start h-screen">
    <div class="pb-3">
        <h2 class="text-3xl font-semibold text-gray-700">Search For a Drink</h2>
    </div>
    <x-search-form placeholder="Type a cocktail name here..." method="POST" :action="route('site.results')" input-name="drink_name"/>
  </div>
</x-site-layout>
