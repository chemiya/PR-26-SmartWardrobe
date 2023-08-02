<!DOCTYPE html>
<html>

<head>
	<title>Editar prenda</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
</body>
</html>


<div class="container mx-auto mt-5 p-10">

        <form method="post" action="/editarPrendaAccion" enctype="multipart/form-data" class="morado p-5 rounded-md">
            @csrf
            <h1 class="text-center text-3xl text-white font-bold">Editar prenda</h1>
            <div class="mb-3">
                <label class="font-bold text-white text-xl">Nombre</label>
                <div class="col-sm-10">
                <input type="hidden" name="id" class="form-control" value="{{$prenda->id}}"/>
                    <input type="text" value="{{$prenda->nombre}}" name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                @error('nombre')
                <div class="text-white font-bold">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3 flex justify-around items-center md:flex-row flex-col">
                <div class="interior-entrada md:w-1/2 w-full md:pr-5">
                    <label class="font-bold text-white text-xl">Marca</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$prenda->marca}}" name="marca" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('marca')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>


                <div class="interior-entrada md:w-1/2 w-full ">

                    <label class="font-bold text-white text-xl">Talla</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$prenda->talla}}" name="talla" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
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
                        <input type="text" value="{{$prenda->fechaCompra}}" name="fechaCompra" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('fechaCompra')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>


                <div class="interior-entrada md:w-1/2 w-full ">

                    <label class="font-bold text-white text-xl">Precio de compra</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$prenda->precioCompra}}" name="precioCompra" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
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
                    <img src="{{ asset('images/' . $prenda->foto) }}" class="imagen mt-2"  />
                </div>
                @error('foto')
                <div class="text-white font-bold">{{ $message }}</div>
                @enderror

            </div>





            <div class="text-center">
                <input type="submit" class="bg-white cursor-pointer p-3 me-3 my-2 rounded-full text-xl font-bold" value="Editar prenda" />
            </div>
        </form>
    </div>





























<!--
<h1>editar prenda</h1>
<form method="post" action="/editarPrendaAccion" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" value="{{$prenda->nombre}}"/>
            <input type="hidden" name="id" class="form-control" value="{{$prenda->id}}"/>
        </div>
        @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Marca</label>
        <div class="col-sm-10">
            <input type="text" name="marca" class="form-control" value="{{$prenda->marca}}" />
        </div>
        @error('marca')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Talla</label>
        <div class="col-sm-10">
            <input type="text" name="talla" class="form-control" value="{{$prenda->talla}}" />
        </div>
        @error('talla')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Fecha de compra</label>
        <div class="col-sm-10">
            <input type="text" name="fechaCompra" class="form-control" value="{{$prenda->fechaCompra}}"/>
        </div>
        @error('fechaCompra')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Precio de compra</label>
        <div class="col-sm-10">
            <input type="text" name="precioCompra" class="form-control" value="{{$prenda->precioCompra}}"/>
        </div>
        @error('precioCompra')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Foto</label>
        <div class="col-sm-10">
            <input type="file" name="foto" class="form-control" />
            <img src="{{ asset('images/' . $prenda->foto) }}" width="100" class="img-thumbnail" />
			
			
        </div>
        @error('foto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
    </div>

    

   

    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Add" />
    </div>
</form>

-->