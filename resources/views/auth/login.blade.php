
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

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="https://tn.draexlmaier.com/typo3conf/ext/in2template/Resources/Public/Images/draexlmaier_logo.svg" alt="Draexlmaier_Logo">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Sign in to your account
      </h2>
      
    </div>



 @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif


    <form class="mt-8 space-y-6" action="{{ route('login') }}" method="post">
         @csrf
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Email address</label>
          <input value="{{ old('email') }}" id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-400 focus:border-blue-400 focus:z-10 sm:text-sm" placeholder="Email address">

             {{-- <label for="username" class="sr-only">Username Or Email address</label>
          <input value="{{ old('email'),old('registration_number') }}" id="username" name="_username" type="text" autocomplete="" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-400 focus:border-blue-400 focus:z-10 sm:text-sm" placeholder="Username Or Email address"> --}}
        </div>
        
        <div>
          <label for="password" class="sr-only">Password</label>
          <input value="" id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-400 focus:border-blue-400 focus:z-10 sm:text-sm" placeholder="Password" >
        </div>
      </div>

     

      <div>
        <button type="submit" style="background-color:#0097AC; " class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
         
          Sign in
        </button>
      </div>
    </form>
  </div>

  

</div>
 
  

</body>
</html>