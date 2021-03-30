<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Draexlmaier</title>
    <link rel="stylesheet" href=" {{asset('css/app.css')}} ">
</head>
<body>


<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-white-800">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
          <img class="block lg:hidden h-8 w-auto" src="https://tn.draexlmaier.com/typo3conf/ext/in2template/Resources/Public/Images/draexlmaier_logo.svg" alt="Draexlmaier_Logo">
          <img class="hidden lg:block h-8 w-auto" src="https://tn.draexlmaier.com/typo3conf/ext/in2template/Resources/Public/Images/draexlmaier_logo.svg" alt="Draexlmaier_Logo">
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('dashboard') }}" class=" bg-indigo-700 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
            <a href="{{ route('document') }}"  class="text-gray-500 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Technical Documents</a>
            <a href="#" class="text-gray-500 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Lessons Learned</a>
            <a href="#" class="text-gray-500 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Staff Qualification</a>
            <a href="#" class="text-gray-500 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Manage Staff</a>

          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
        
        <a href="#"  class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
          Logout
        </a>
      </div>

       

        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" style="background-color:#0097AC;" class=" text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Technical Documents</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Lessons Learned</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Staff Qualification</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Manage Staff</a>

       <a href="#" style="background-color:#0097AC;" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white ">
           Logout
          </a>
    </div>
  </div>
  <hr>
</nav>







    @yield('content')
</body>
</html>