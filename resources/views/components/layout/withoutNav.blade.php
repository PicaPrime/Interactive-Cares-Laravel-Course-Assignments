<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'IBlog  | Modern Blog' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




</head>

<body class="bg-gray-50 font-sans">


    <div class="flex h-screen overflow-hidden">
        <aside class="bg-gray-800 text-white flex-shrink-0 w-64 relative z-10 flex flex-col" id="sidebar">
            <div class="flex items-center justify-between h-16 px-4 border-b border-gray-700">
                <a href="{{ route('dashboard') }}">
                    <div class="flex items-center space-x-2">
                    <i class="fas fa-blog text-2xl text-blue-400"></i>
                    <h1 class="text-xl font-bold">I<span class="text-blue-400">Blog</span></h1>
                </div>
                </a>
                <button id="sidebar-toggle" class="text-gray-400 hover:text-white md:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-grow px-2 py-4 overflow-y-auto">
                <nav class="flex-1 space-y-1">
                    <div>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-3 py-3 text-sm font-medium rounded-md bg-gray-900 text-white">
                            <i class="fas fa-tachometer-alt text-blue-400 mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <div class="sidebar-dropdown">
                        <button
                            class="sidebar-dropdown-toggle flex items-center w-full px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-newspaper mr-3"></i>
                            <span>Content Management</span>
                            <i class="fas fa-chevron-down ml-auto text-xs"></i>
                        </button>
                        <div class="sidebar-dropdown-menu hidden pl-2 mt-1 space-y-1">
                            <a href={{ route('categories.create') }}
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-pen mr-3 text-xs"></i>
                                <span>Create Category</span>
                            </a>
                            <a href={{ route('categories.index') }}
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-folder mr-3 text-xs"></i>
                                <span>Category List</span>
                            </a>
                            <a href={{ route('posts.create') }}
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-pen mr-3 text-xs"></i>
                                <span>Create Post</span>
                            </a>
                            <a href={{ route('posts.index') }}
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-folder mr-3 text-xs"></i>
                                <span>All Posts</span>
                            </a>

                            <a href={{ route('posts.category') }}
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-folder mr-3 text-xs"></i>
                                <span>Posts According to Category</span>
                            </a>

                        </div>
                    </div>

                    {{-- <div class="sidebar-dropdown">
                        <button
                            class="sidebar-dropdown-toggle flex items-center w-full px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-chart-line mr-3"></i>
                            <span>Analytics & Reports</span>
                            <i class="fas fa-chevron-down ml-auto text-xs"></i>
                        </button>
                        <div class="sidebar-dropdown-menu hidden pl-2 mt-1 space-y-1">
                            <a href="#"
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-eye mr-3 text-xs"></i>
                                <span>Traffic</span>
                            </a>
                            <a href="#"
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-users mr-3 text-xs"></i>
                                <span>Audience</span>
                            </a>
                            <a href="#"
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-receipt mr-3 text-xs"></i>
                                <span>Reports</span>
                            </a>
                        </div>
                    </div> --}}
                    {{-- 
                    <div>
                        <a href="#"
                            class="flex items-center px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-comments mr-3"></i>
                            <span>Comments</span>
                        </a>
                    </div>

                    <div>
                        <a href="#"
                            class="flex items-center px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-bookmark mr-3"></i>
                            <span>Bookmarks</span>
                        </a>
                    </div>

                    <div class="sidebar-dropdown">
                        <button
                            class="sidebar-dropdown-toggle flex items-center w-full px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-cog mr-3"></i>
                            <span>User Settings</span>
                            <i class="fas fa-chevron-down ml-auto text-xs"></i>
                        </button>
                        <div class="sidebar-dropdown-menu hidden pl-2 mt-1 space-y-1">
                            <a href="#"
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-user mr-3 text-xs"></i>
                                <span>Profile</span>
                            </a>
                            <a href="#"
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-lock mr-3 text-xs"></i>
                                <span>Security</span>
                            </a>
                            <a href="#"
                                class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                                <i class="fas fa-bell mr-3 text-xs"></i>
                                <span>Notifications</span>
                            </a>
                        </div>
                    </div>

                    <div>
                        <a href="#"
                            class="flex items-center px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>Messages</span>
                        </a>
                    </div>
                    <div>
                        <a href="#"
                            class="flex items-center px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-users mr-3"></i>
                            <span>Team</span>
                        </a>
                    </div>
                    <div>
                        <a href="#"
                            class="flex items-center px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            <i class="fas fa-star mr-3"></i>
                            <span>Favorites</span>
                        </a>
                    </div> --}}

                    <div class="mt-auto px-4 py-4 border-t border-gray-700">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
                                class="w-10 h-10 rounded-full">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">John Doe</p>
                                <a href="#" class="text-xs font-medium text-gray-400 hover:text-gray-200">View
                                    profile</a>
                            </div>
                        </div>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="mt-4 w-full flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Sign out
                            </button>
                        </form>

                    </div>
                </nav>
            </div>


        </aside>

        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="flex justify-between items-center px-4 py-4 sm:px-6 lg:px-8">
                    <button class="md:hidden text-gray-500 focus:outline-none" id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <div class="flex-1 max-w-md mx-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" placeholder="Search dashboard..."
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button class="p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                            <i class="fas fa-bell text-xl"></i>
                        </button>
                        <button class="p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                            <i class="fas fa-envelope text-xl"></i>
                        </button>

                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center space-x-2 focus:outline-none">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
                                    class="w-8 h-8 rounded-full">
                                <span class="hidden md:inline text-gray-700">John Doe</span>
                                <i class="fas fa-chevron-down text-gray-500 text-xs"></i>
                            </button>
                            <div id="user-menu"
                                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                                    Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Notifications</a>
                                <div class="border-t border-gray-200"></div>
                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                    out</a> --}}
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        Sign out
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="px-4 py-6 sm:px-6 lg:px-8">

                @yield('content')

            </main>
        </div>


    </div>



    @vite('resources/js/create-category-script.js')

</body>

</html>
