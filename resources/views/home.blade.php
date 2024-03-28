<x-site-layout>
    {{-- Search Drinks Form  --}}
    <div class="w-full py-12 bg-gray-50 flex flex-col items-center justify-center">
        <div class="basis-full pb-3">
            <h2 class="text-3xl font-semibold text-gray-700">Find a cool drink</h2>
        </div>
        <x-search-form placeholder="Type a cocktail name here..." :action="route('site.results')" input-name="drink_name"/>
    </div>

    <div class="container mx-auto">
        <div>
            <h2 class="text-3xl font-black text-gray-700 ml-8">Cocktails</h2>
        </div>
        <div class="flex flex-col justify-center md:justify-start items-center md:flex-row md:items-start flex-wrap">
            @foreach ($cocktails as $value)
            <x-card :name="$value['strDrink']" :tumb="$value['strDrinkThumb']" :url="route('site.drink',
            ['id' => $value['idDrink']])" class="md:basis-[calc(50%-40px)]" />
            @endforeach
        </div>
    </div>

</x-site-layout>
