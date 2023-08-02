<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mx-auto p-5 mt-5 flex justify-center">
        <div class="interior p-5 morado rounded-md w-full md:w-1/2">
            <h1 class="text-center text-3xl text-white font-bold">Regístrate ahora
                para organizar tus
                outfits</h1>
            <form method="post" action="/registrarUsuarioAccion" class="mt-5">
                @csrf
                <div class="mb-3">
                    <label class="font-bold text-white text-xl">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('username')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="font-bold text-white text-xl">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('password')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="">
                    <label class="font-bold text-white text-xl">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('email')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center mt-5">
                    <input type="submit" class="bg-white cursor-pointer p-3 me-3 my-2 rounded-full text-xl font-bold" value="Registrarse" />
                </div>
            </form>

        </div>




    </div>
</body>

</html>