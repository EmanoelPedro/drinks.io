<form action="{{$action}}" method="{{$method ?? 'post'}}"
{{$attributes->merge(['class' => '"w-full flex items-stretch rounded overflow-hidden'])}}>

    @csrf
    <input type="text" name="{{$inputName}}" autocomplete="off"
    placeholder="{{$placeholder ?? 'Search for a drink'}}" class="p-3 focus:ring-blue-500 focus:border-blue-500">

    <button class="icon-search px-3 text-white bg-orange-400 hover:bg-orange-500 outline-none"></button>
</form>
@error($inputName)
<div class="my-4 mx-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
    <span class="font-medium">Whoops...</span> {{$message}}
  </div>
@enderror
