<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportee</title>
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
        <a href="/" class="indoorLogo">SPORTEE</a>


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
            
            <a href="/home/manage" style="--i:1;" class=" text-lg">Manage</a>

            <form class="inline" method="POST" action="/logout">
              @csrf
              <button type="submit" class="text-white text-lg px-5">
                <i class="fa-solid fa-right-from-bracket text-white  text-lg px-2"></i>Log out
              </button>
            </form>
            @else
            <a href="/login" style="--i:1;">Login</a>
            <a href="/register" style="--i:2;">Sign up</a>

            @endauth

        </nav>

    </header>



   <main>
    @yield('content')

   </main>


   

    <footer>
        <div class="footer-content">
            <h3>Sportee</h3>
            <p>Discover the essence of sports excellence with Sportee – your ultimate destination for dynamic athletic experiences. From state-of-the-art facilities to community-driven events, Sportee is committed to fostering a passion for sports. Join us in celebrating the spirit of competition, camaraderie, and achievement. Your journey to a vibrant sports community begins here.</p>
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
