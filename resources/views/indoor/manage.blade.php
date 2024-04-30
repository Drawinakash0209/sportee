@extends('layout')
@section('content')


    <header class="flex justify-between items-center pl-10 pr-10 pb- 20 rounded mt-40">
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Manage Your Indoors
        </h1>

        <a href="/home/create" class="mt-8  text-blue-400  text-base font-semibold py-2.5 px-6 border-2 border-white rounded hover:bg-white hover:text-black transition duration-300 ease-in-out">
            <i class="fa-solid fa-plus"></i> Add Indoor
        </a>
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
                        </form>
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
