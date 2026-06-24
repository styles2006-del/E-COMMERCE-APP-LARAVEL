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
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                stroke="currentColor">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </g>
                        </svg>
                        <input type="email" placeholder="mail@site.com" name="email" />
                    </label>
                    <div class="validator-hint hidden">Enter valid email address</div>
                </div>
                <div class="flex flex-col">
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                stroke="currentColor">
                                <path
                                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                                </path>
                                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                            </g>
                        </svg>
                        <input type="password" placeholder="Password" minlength="8" name="password"/>
                    </label>
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-600 text-white py-1 px-3 hover:blue-300 w-full rounded rounded-lg sm:bg-green-600">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
