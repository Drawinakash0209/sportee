<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lexend:wght@400;500&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<body>

    <header class="head"> 

    
        <a href="#" class="indoorLogo">SPORTEE</a>


        <input type="checkbox" id="ch">

        <label for="ch" class="icons">
            <i class='bx bx-menu' id="menu"></i>
            <i class='bx bx-x' id="cancel"></i>
           
        </label>

        <nav class="navbar">
            




            
            @auth
            <span class="text-white text-lg">
                Welcome {{auth()->user()->name}} !
            </span>
            <a href="/indoor/manager" style="--i:1;" class=" text-lg">Manage</a>
            <form class="inline" method="POST" action="/logout">
              @csrf
              <button type="submit" class="text-white text-lg px-5">
                <i class="fa-solid fa-right-from-bracket text-white  text-lg px-2"></i>Log out
              </button>
            @else
            <a href="/login" style="--i:1;">Login</a>
            <a href="/register" style="--i:2;">Sign up</a>

            @endauth

        </nav>

    </header>

    

    <!-- component -->
    
{{-- <nav class="flex justify-between px-20 py-10 items-center bg-white">
    <h1 class="text-xl text-gray-800 font-bold">HotCoffee</h1>
    <div class="flex items-center">
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pt-0.5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input class="ml-2 outline-none bg-transparent font-" type="text" name="search" id="search" placeholder="Search..." />
        <div class="">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-indigo-500 hover:bg-red-600"
            >
                Search
            </button>
      </div>
      <ul class="flex items-center space-x-6">
        <li class="font-semibold text-gray-700">Home</li>
        <li class="font-semibold text-gray-700">Articles</li>
        <li>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M12 14l9-5-9-5-9 5 9 5z" />
            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
          </svg>
        </li>
        <li>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </li>
        <li>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
        </li>
      </ul>
    </div>
  </nav> --}}
{{--    --}}

    



   <main>
    @yield('content')

   </main>


   

    <footer>
        <div class="footer-content">
            <h3>Code Opcaity</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia ipsam alias praesentium amet quis, minima voluptatum explicabo sunt eos obcaecati reiciendis consequatur ducimus dolore illo tempore voluptates nemo soluta perspiciatis.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></i></a></li>
                <li><a href="#"><i class="fa-brands fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
    
        <div class="footer-bottom">
            <p>copyright &copy;2023 Sportee. designed by <span>Drawin</span></p>
        </div>
    </footer>

    <x-message />

</body>
</html>
