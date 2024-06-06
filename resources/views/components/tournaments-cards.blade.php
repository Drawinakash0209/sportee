@props(['tourn'])

        <div class="relative w-full flex items-end justify-start text-left bg-cover bg-center"
             style="height: 450px; background-image:url({{$tourn->photo ? asset('storage/' . $tourn->photo): asset('/images/CR7.png')}});">
            <div class="absolute top-0  right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
            </div>
            {{$tourn['date']}}
            <div class="absolute top-0 right-0 left-0 mx-5 mt-2 flex justify-between items-center">
                <a href="#" class="text-xs bg-indigo-600 text-white px-5 py-2 uppercase hover:bg-white hover:text-indigo-600 transition ease-in-out duration-500">Tournament</a>
                <div class="text-white font-regular flex flex-col justify-start">
                    <span class="text-3xl leading-0 font-semibold"><?php echo date('d', strtotime($tourn['tournamentDate'])); ?></span>
                    <span class="-mt-3"><?php echo date('M', strtotime($tourn['tournamentDate'])); ?></span>
                </div>
            </div>

            <main class="p-5 z-10">
                <a href="/home/tournament/{{$tourn['id']}}"
                   class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">{{$tourn['title']}}
                </a>
                <br>
                <a href="#"
                   class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">{{$tourn['noOFplayers']}} V {{$tourn['noOFplayers']}}
                </a>
            </main>

        </div>


