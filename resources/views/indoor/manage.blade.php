@extends('layout')
@section('content')

<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Manage Gigs
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless ($indoors->isEmpty())
            @foreach ($indoors as $indoor)
                
           
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="show.html">
                        {{$indoor->title}}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a
                        href="/home/{{$indoor->id}}/edit"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-pen-to-square"
                        ></i>
                        Edit</a
                    >
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                <form action="/home/{{$indoor->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i
                        class="fa-solid fa-trash-can"
                    ></i>
                    Delete</button>
                  
                  </section>
                </td>
            </tr>

            @endforeach
            @else
            <tr class="border-grey-300">
                <td class="px-4 py-8 border-t border-b border grey-300 text-lg">
                    <p class="text-center">
                        You have no Indoors yet.
                </td>
            </tr>
            @endunless

        </tbody>
    </table>
</div>

@endsection