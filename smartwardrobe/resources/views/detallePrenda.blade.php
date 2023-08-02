<!DOCTYPE html>
<html>

<head>
	<title>Detalle de la prenda</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

	<div class="container mx-auto mt-5 pb-5 flex justify-center items-center flex-col">
		<div class="div-foto flex justify-center items-center">
			<img src="{{ asset('images/' .  $prenda->foto) }}" class="imagen" />
		</div>
		<div class="div-texto flex justify-start flex-col items-center mt-5 morado w-3/4 p-4 rounded-md">
			<div class="fila-primera flex flex-col md:flex-row justify-around items-center w-full ">
				<div class="div-titulo md:w-1/2 w-full mb-2">
					<p class="text-4xl text-white font-bold mr-5 ">{{$prenda->nombre}}</p>
				</div>

				<div class="botones flex justify-center items-center md:w-1/2 w-full mb-2">
					<a class="bg-blue-500 text-2xl p-3 rounded-full text-white mr-3" href="/editarPrenda/{{$prenda->id}}">Editar</a>
					<a class="bg-red-500 text-2xl p-3 rounded-full text-white mr-3" href="/eliminarPrendaAccion/{{$prenda->id}}">Eliminar</a>

				</div>
			</div>

			<div class="segunda-fila flex flex-col md:flex-row justify-around items-center w-full mt-3">
				<div class="elemento flex flex-col justify-center items-start md:w-1/2 w-full ">
					<p class="text-white text-xl font-bold">Fecha de compra</p>
					<p class="text-white text-3xl ">{{$prenda->fechaCompra}}</p>
				</div>
				<div class="elemento flex flex-col justify-center items-start md:w-1/2 w-full ">
					<p class="text-white text-xl font-bold">Precio de compra</p>
					<p class="text-white text-3xl ">{{$prenda->precioCompra}} €</p>
				</div>
			</div>

			<div class="segunda-fila flex flex-col md:flex-row justify-around items-center  w-full mt-3">
				<div class="elemento flex flex-col justify-center items-start md:w-1/2 w-full ">
					<p class="text-white text-xl font-bold">Marca</p>
					<p class="text-white text-3xl ">{{$prenda->marca}}</p>
				</div>
				<div class="elemento flex flex-col justify-center items-start md:w-1/2 w-full ">
					<p class="text-white text-xl font-bold">Talla</p>
					<p class="text-white text-3xl ">{{$prenda->talla}} </p>
				</div>
			</div>

		</div>
	</div>



</body>

</html>