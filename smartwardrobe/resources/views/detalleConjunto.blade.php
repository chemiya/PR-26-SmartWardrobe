<!DOCTYPE html>
<html>

<head>
	<title>Detalle del conjunto</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mx-auto mt-5 flex justify-center items-center flex-col">
		<div class="div-foto flex justify-center items-center">
			<img src="{{ asset('images/' .  $conjunto->foto) }}" class="imagen" />
		</div>
		<div class="div-texto flex justify-start flex-col items-center mt-5 morado w-3/4 p-4 rounded-md">
			<div class="fila-primera flex flex-col md:flex-row justify-around items-center w-full ">
				<div class="div-titulo md:w-1/2 w-full mb-2">
					<p class="text-4xl text-white font-bold mr-5 ">{{$conjunto->nombre}}</p>
				</div>

				<div class="botones flex justify-center items-center md:w-1/2 w-full mb-2">
					<a class="bg-blue-500 text-2xl p-3 rounded-full text-white mr-3" href="/editarConjunto/{{$conjunto->id}}">Editar</a>
					<a class="bg-red-500 text-2xl p-3 rounded-full text-white mr-3" href="/eliminarConjuntoAccion/{{$conjunto->id}}">Eliminar</a>

				</div>
			</div>

			<div class="segunda-fila flex flex-col md:flex-row justify-around items-center w-full mt-3">
				<div class="elemento flex flex-col justify-center items-start  w-full ">
					<p class="text-white text-xl font-bold">Descripción</p>
					<p class="text-white text-3xl ">{{$conjunto->descripcion}}</p>
				</div>

			</div>

			<div class="segunda-fila flex flex-col md:flex-row justify-around items-center  w-full mt-3">
				<div class="elemento flex flex-col justify-center items-start md:w-1/2 w-full ">
					<p class="text-white text-xl font-bold">Fecha de creacion</p>
					<p class="text-white text-3xl ">{{$conjunto->fechaCreacion}}</p>
				</div>
				<div class="elemento flex flex-col justify-center items-start md:w-1/2 w-full ">
					<p class="text-white text-xl font-bold">Numero de prendas</p>
					<p class="text-white text-3xl ">{{$conjunto->numeroPrendas}} </p>
				</div>
			</div>

		</div>
	</div>


	<div class="container mx-auto mt-5">
		<h1 class="text-6xl font-bold text-center morado-texto">Prendas incluidas en el conjunto</h1>
		<div class="prendas-div flex justify-center items-center flex-wrap">
			@foreach($prendasIncluidas as $prenda)
			<div class="prenda-ext p-5 md:w-1/3 w-full">

				<div class="prenda-interior morado rounded-lg p-5 flex flex-col justify-center items-center">
					<h1 class="mb-2 font-bold text-3xl text-white">{{$prenda->seccion}}</h1>
					<img src="{{ asset('images/' .  $prenda->foto) }}" class="imagen" />
					<h1 class="mt-3 font-bold text-3xl text-white">{{$prenda->nombre}}</h1>
					<h1 class="mt-3 font-bold text-xl text-white">{{$prenda->marca}}</h1>
					<h1 class="mt-3 font-bold text-xl text-white">Comprada en {{$prenda->fechaCompra}}</h1>



				</div>
				</a>
			</div>

			@endforeach
		</div>

	</div>
</body>

</html>