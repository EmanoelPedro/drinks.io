
  <div {{$attributes->merge(['class' => 'max-w-sm m-5 bg-gray-50 border border-gray-200 rounded-lg shadow overflow-hidden hover:shadow-lg duration-100'])}}>
    <a href="{{$url}}">
      <img class="max-w-full" src="{{$tumb}}" alt="{{$name}}">
    </a>
    <div class="max-w-full p-2">
        <a href="{{$url}}" class=" mb-2 text-2xl font-bold tracking-tight text-gray-900">
          {{$name}}
        </a>
    </div>
</div>
