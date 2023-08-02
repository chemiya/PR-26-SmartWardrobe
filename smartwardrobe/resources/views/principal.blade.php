<!DOCTYPE html>
<html>

<head>
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/f877ada887.js" crossorigin="anonymous"></script>
</head>

<body>



	<nav class="flex items-center justify-between flex-wrap morado p-6">
		<div>
			<img src="{{ asset('images/icono.png') }}" class="icono-pequeno" />
		</div>

		<div class="block lg:hidden">
			<button id='boton' class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
				</svg>
			</button>
		</div>
		<div id='menu' class="w-full block flex-grow lg:flex lg:items-center lg:w-auto ">
			<div class="text-sm w-full  flex md:justify-end flex-col md:flex-row justify-center">
				<div class="inline-block pt-5 md:mt-1 mt-3">
				<a href="/identificacion" class="bg-white cursor-pointer  p-3 mr-3 my-2  rounded-full text-2xl font-bold">
					Identificarse
				</a>
				</div>
				
				<div class="inline-block pt-5 md:mt-1 mt-3">
				<a href="/registro" class="bg-white cursor-pointer  p-3 mr-3 my-2  rounded-full text-2xl font-bold">
					Registrarse
				</a>
				</div>

			</div>

		</div>
	</nav>


	<div class="container flex md:flex-row flex-col justify-center mt-10 mx-auto">
		<div class="titulo-div md:w-1/2 w-full flex justify-center items-center pt-2 pb-2">
			<h1 class="text-6xl font-bold text-center morado-texto">SmartWardrobe,
				la aplicación para
				gestionar tus outfits</h1>
		</div>
		<div class="imagen-div md:w-1/2 w-full flex justify-center items-center">
			<img src="{{ asset('images/icono.png') }}" class="icono-grande" />
		</div>

	</div>



	<div class="container mx-auto mt-32 p-10 ">
		<h1 class="text-6xl font-bold text-center morado-texto mb-16">Guarda todas las prendas que tengas</h1>
		<div class="interior-container morado rounded-md p-5 flex md:flex-row flex-col justify-around">
			<div class="icono-div md:w-1/2 w-full flex justify-center items-center">

				<i class="fa-solid fa-shirt icono"></i>
			</div>
			<div class="texto-div md:w-1/2 w-full flex flex-col justify-center items-start">
				<h1 class="text-3xl text-white font-bold">Solo tienes que introducir
					los detalles de la prenda</h1>
				<p class="text-white text-xl">Nombre</p>
				<p class="text-white text-xl">Talla</p>
				<p class="text-white text-xl">Foto</p>
				<p class="text-white text-xl">Fecha de compra</p>
				<p class="text-white text-xl">Precio de compra</p>

			</div>
		</div>



	</div>


	<div class="container mx-auto mt-32 p-10 ">
		<h1 class="text-6xl font-bold text-center morado-texto mb-16">Guarda conjuntos a partir de tus prendas</h1>
		<div class="interior-container morado rounded-md p-5 flex md:flex-row flex-col justify-around">
			<div class="texto-div md:w-1/2 w-full flex flex-col justify-center items-start">
				<h1 class="text-3xl text-white font-bold">Con las prendas que tengas,
					crea conjuntos</h1>
				<p class="text-white text-xl">Nombre</p>
				<p class="text-white text-xl">Descripción</p>
				<p class="text-white text-xl">Que prendas incluye</p>


			</div>
			<div class="icono-div md:w-1/2 w-full flex justify-center items-center">
				<i class="fa-solid fa-user-tie icono"></i>
			</div>

		</div>



	</div>

	<div class="morado mt-10 flex justify-center items-center flex-col p-10">
		<h1 class="text-3xl font-bold text-white">José María Lozano Olmedo</h1>
		<h1 class="text-3xl font-bold text-white">All rights reserved &copy;</h1>
	</div>



	<script>
		const boton = document.querySelector('#boton');
		const menu = document.querySelector('#menu');

		boton.addEventListener('click', () => {
			console.log('click')
			menu.classList.toggle('hidden')
		})
	</script>


</body>

</html>