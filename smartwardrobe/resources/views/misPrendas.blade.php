<!DOCTYPE html>
<html>

<head>
	<title>Mis prendas</title>
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
			<div class="text-sm lg:flex-grow flex md:justify-end flex-col md:flex-row justify-center">
			<div class="inline-block pt-5 md:mt-1 mt-3">	
			<a href="/registrarPrenda" class="bg-white cursor-pointer p-3 mr-3 my-2  rounded-full text-2xl font-bold">
					Registrar prenda
				</a>
			</div>
				<div class="inline-block pt-5 md:mt-1 mt-3">
				<a href="/misConjuntos" class="bg-white cursor-pointer p-3 me-3 my-2 rounded-full text-2xl font-bold">
					Mis conjuntos
				</a>
				</div>

			</div>

		</div>
	</nav>


	<div class="container mx-auto">
		<h1 class="text-6xl font-bold text-center morado-texto">Mis prendas</h1>

		@empty($prendas)
		<p class="text-3xl font-bold text-center mt-3">No tienes ninguna prenda guardada.</p>
		@else
		<div class="prendas-div flex justify-center items-center flex-wrap">
			@foreach($prendas as $prenda)
			<div class="prenda-ext p-5 md:w-1/3 w-full">
				<a href="/detallePrenda/{{$prenda->id}}">
					<div class="prenda-interior morado rounded-lg p-5 flex flex-col justify-center items-center">
						<img src="{{ asset('images/' .  $prenda->foto) }}" class="imagen" />
						<h1 class="mt-3 font-bold text-3xl text-white">{{$prenda->nombre}}</h1>
						<h1 class="mt-3 font-bold text-xl text-white">{{$prenda->marca}}</h1>
						<h1 class="mt-3 font-bold text-xl text-white">Comprada en {{$prenda->fechaCompra}}</h1>


					</div>
				</a>
			</div>
			@endforeach
		</div>

		@endempty


	</div>





	<script>
		function cerrarAlerta() {
			var alerta = document.querySelector('.alerta');
			alerta.style.display = 'none';
		}
		const boton = document.querySelector('#boton');
		const menu = document.querySelector('#menu');

		boton.addEventListener('click', () => {
			console.log('click')
			menu.classList.toggle('hidden')
		})
	</script>


</body>

</html>