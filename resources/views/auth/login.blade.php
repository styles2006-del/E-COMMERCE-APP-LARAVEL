<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="">
    <div class="flex h-screen">
        <div class="bg-white h-full w-1/2 hidden lg:block bg-[url('http://localhost:8000/bg_auth.jpg')] bg-cover">
        </div>
        <div class="w-1/2 flex items-center justify-center w-full xl:w-1/2">
            <form action="{{ route('auth.login') }}" method="post" class="space-y-3 p-8">
                @csrf
                <h1 class="text-green-600 text-3xl text-center">Se connecter</h1>
                <div class="flex flex-col">
                    <label for="email" class="text-sm">Email : </label>
                    <input type="email" name="email"
                        class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                </div>
                <div class="flex flex-col">
                    <label for="password" class="text-sm">Password : </label>
                    <input type="password" name="password" class="border border-gray-200 px-2 py-1 rounded rounded-lg">
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white py-1 px-3 hover:blue-300 w-full rounded rounded-lg sm:bg-green-600">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
