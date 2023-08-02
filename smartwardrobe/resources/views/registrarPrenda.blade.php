<!DOCTYPE html>
<html>

<head>
    <title>Registrar prenda</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto mt-5 p-10">

        <form method="post" action="/registrarPrendaAccion" enctype="multipart/form-data" class="morado p-5 rounded-md">
            @csrf
            <h1 class="text-center text-3xl text-white font-bold">Registrar prenda</h1>
            <div class="mb-3">
                <label class="font-bold text-white text-xl">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                @error('nombre')
                <div class="text-white font-bold">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3 flex justify-around items-center md:flex-row flex-col">
                <div class="interior-entrada md:w-1/2 w-full md:pr-5">
                    <label class="font-bold text-white text-xl">Marca</label>
                    <div class="col-sm-10">
                        <input type="text" name="marca" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('marca')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>


                <div class="interior-entrada md:w-1/2 w-full ">

                    <label class="font-bold text-white text-xl">Talla</label>
                    <div class="col-sm-10">
                        <input type="text" name="talla" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('talla')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror

                </div>

            </div>


            <div class="mb-3 flex justify-around items-center md:flex-row flex-col">
                <div class="interior-entrada md:w-1/2 w-full md:pr-5">
                    <label class="font-bold text-white text-xl">Fecha de compra</label>
                    <div class="col-sm-10">
                        <input type="text" name="fechaCompra" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('fechaCompra')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>


                <div class="interior-entrada md:w-1/2 w-full ">

                    <label class="font-bold text-white text-xl">Precio de compra en €</label>
                    <div class="col-sm-10">
                        <input type="number" name="precioCompra" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('precioCompra')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror

                </div>

            </div>



           


            <div class="mb-3">
                <label class="font-bold text-white text-xl">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" />
                </div>
                @error('foto')
                <div class="text-white font-bold">{{ $message }}</div>
                @enderror

            </div>





            <div class="text-center">
                <input type="submit" class="bg-white cursor-pointer p-3 me-3 my-2 rounded-full text-xl font-bold" value="Registrar prenda" />
            </div>
        </form>
    </div>
</body>

</html>