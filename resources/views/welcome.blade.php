<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Booklog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">



</head>

<body style="background-color: #FEFAE0">

    <div class="header py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div></div>
            <nav class="ms-auto">
                <ul class="nav d-flex align-items-center justify-content-end">
                    @guest
                        <li class="nav-item me-3">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @else
                        <li class="nav-item me-3">
                            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </div>

    </div>
    <div class="flex items-center justify-between  p-8 ml-2 rounded-lg">
        <div class="w-full md:w-1/2">
            <h1 class="text-7xl font-bold mb-4 font-sans">Start Building Your online Library</h1>
            <p class="text-lg mb-6">
                Easily track the books you've read, organize your collection, and <br> showcase your personal library
                online
                with <i>Booklog</i>
            </p>
            <button class="button-hero px-8 py-4 text-xl ml-20"
                onclick="window.location.href='{{ route('register') }}'">
                Try now!
            </button>


            <div class="mt-8">
                <p class="text-sm font-medium mb-2">Made with:</p>
                <div class="flex space-x-4">
                    <!-- Laravel and Livewire logos/icons -->
                    <img src="images/laravel.png" alt="Laravel" class="h-8">
                    <img src="images/tailwind.png" alt="Livewire" class="h-8">
                </div>
            </div>
        </div>

        <!-- Right Illustration Section -->
        <div class="hidden md:block w-1/2">
            <img src="images/welcome-image.png" alt="Illustration" class="w-full h-auto">
        </div>
    </div>




    </div>

    <div class="max-w-7xl mx-auto py-12 space-y-12">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 lg:pl-12 form">
                <h2 class="text-5xl font-bold">Organize Your Books</h2>
                <p class="mt-3 text-lg text-gray-600">
                    Easily manage the books you've read, categorize them, <br>and create a personal online library.
                </p>
                <ul class="mt-4 space-y-2 text-gray-500">
                    <li>✔️ Track reading progress</li>
                    <li>✔️ Categorize by genre and author</li>
                    <li>✔️ Add personal reviews</li>
                </ul>
            </div>
            <div class="lg:w-1/2">
                {{-- obrazok sem --}}

            </div>

        </div>


        <div class="flex flex-col lg:flex-row-reverse items-center ">
            <div class="lg:w-1/2 lg:pr-12 form">
                <h2 class="text-5xl font-bold">Share with Friends</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Showcase your library to others, get book recommendations, <br> and build your reading network.
                </p>
                <ul class="mt-4 space-y-2 text-gray-500">
                    <li>✔️ Share book recommendations</li>
                    <li>✔️ Follow friends' reading lists</li>
                    <li>✔️ Discover trending books</li>
                </ul>
            </div>
            <div class="lg:w-1/2">
                {{-- obrazok sem --}}
            </div>

        </div>
    </div>

    <section class="py-20">
        <div class="container mx-auto text-center">
            <!-- Heading and Subheading -->
            <h2 class="text-4xl font-bold mb-4">Discover a New Way to Manage Your Library</h2>
            <p class="text-lg text-gray-600 mb-12">Effortlessly track your reading journey and explore new books.</p>

            <!-- Feature Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Feature 1 -->
                <div class="p-8 rounded-lg shadow-lg">
                    <div class="mb-6">
                        <!-- Book Open Icon -->
                        <i class="fas fa-book-open text-5xl text-[lightblue]"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Organize Your Collection</h3>
                    <p class="text-gray-600">Easily catalog all your books—physical, digital, or audio—in one convenient
                        place.</p>
                </div>

                <!-- Feature 2 -->
                <div class="p-8 rounded-lg shadow-lg">
                    <div class="mb-6">
                        <!-- Chart Line Icon (for Tracking Progress) -->
                        <i class="fas fa-chart-line text-5xl text-[lightblue]"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Track Your Reading Progress</h3>
                    <p class="text-gray-600">Monitor your reading habits, set goals, and see your progress over time.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="p-8 rounded-lg shadow-lg">
                    <div class="mb-6">
                        <!-- Lightbulb Icon (for Recommendations) -->
                        <i class="fas fa-lightbulb text-5xl text-[lightblue]"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Get Personalized Recommendations</h3>
                    <p class="text-gray-600">Receive book suggestions tailored to your interests and reading history.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="p-8 rounded-lg shadow-lg">
                    <div class="mb-6">
                        <!-- Users Icon (for Community) -->
                        <i class="fas fa-users text-5xl text-[lightblue]"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Connect with Fellow Readers</h3>
                    <p class="text-gray-600">Join a community to share reviews, discuss books, and expand your literary
                        network.</p>
                </div>
            </div>
        </div>
    </section>









    <footer>
        <p>&copy; 2024 Booklog | Created by <a href="https://www.linkedin.com/in/samuel-kov%C3%A1%C4%8D-0707b0265/"
                style="color: lightblue;">Samuel Kováč</a> |
            <a href="#" style="color: #ffffff;">FAQ</a> |
            <a href="#" style="color: #ffffff;">Contact Us</a>
        </p>
    </footer>


</body>

</html>
