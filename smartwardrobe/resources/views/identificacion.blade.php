<!DOCTYPE html>
<html>

<head>
    <title>Identificarse</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    @if($message = Session::get('success'))

    <div class="alerta flex justify-center items-center">
        <div class="flex justify-center items-center p-2">
        <p class="alerta-mensaje">{{ $message }}</p>
        </div>
        <div class="flex justify-center items-center p-2">
        <span class="close-btn" onclick="cerrarAlerta()">&times;</span>
        </div>
        
        
    </div>

    @endif
    <div class="container mx-auto flex md:flex-row flex-col justify-center items-center mt-10">
        <div class="icono-div md:w-1/2 w-full flex justify-center items-center ">
            <img src="{{ asset('images/icono.png') }}" class="icono-grande" />
        </div>
        <div class="col-inputs p-5  p-16 md:w-1/2 w-full">
            <div class="interior morado p-5 rounded-md">
                <h1 class="text-center text-3xl text-white font-bold">Identifícate en Smartwardrobe</h1>
                <form method="post" action="/identificarUsuarioAccion" class="mt-5">
                    @csrf
                    <div class="mb-3">
                        <label class="font-bold text-white text-xl">Username</label>
                        <div class="">
                            <input type="text" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        </div>
                        @error('username')
                        <div class="text-white font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="">
                        <label class="font-bold text-white text-xl">Contraseña</label>
                        <div class="">
                            <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        </div>
                        @error('password')
                        <div class="text-white font-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($message = Session::get('error'))
                    <div class="mt-3"><p class="text-white font-bold text-center">{{ $message }}</p></div>

                    @endif



                    <div class="text-center mt-5">
                        <input type="submit" class="bg-white cursor-pointer p-3 me-3 my-2 rounded-full text-xl font-bold" value="Identificarse" />
                    </div>
                </form>
            </div>


        </div>


        <script>
            function cerrarAlerta() {
                var alerta = document.querySelector('.alerta');
                alerta.style.display = 'none';
            }
        </script>


    </div>
</body>

</html>