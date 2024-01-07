@props(['item'])


      
      <article class="h-auto col-span-1 m-auto min-h-full cursor-pointer overflow-hidden rounded-lg pb-2 shadow-lg transition-transform duration-200 hover:translate-y-2">
        <a href="#" class="block h-full w-full">
          <img class="max-h-40 w-full object-cover" src="{{$item->photo ? asset('storage/' . $item->photo): asset('/images/CR7.png')}}" />
          <div class="w-full bg-white p-4">
            <p class="text-md font-medium text-indigo-500"><i class="fa-solid fa-location-dot"></i> {{$item['location']}}</p>
            <h1 class="mb-2 text-xl font-medium text-gray-800"><a href="/home/{{$item['id']}}">{{$item['title']}}</a></h1>
           
            <div class="justify-starts mt-4 flex flex-wrap items-center">

                <x-listing-tags :tagsCsv="$item->tags"/>
            
            </div>
          </div>
        </a>
      </article>
    
  