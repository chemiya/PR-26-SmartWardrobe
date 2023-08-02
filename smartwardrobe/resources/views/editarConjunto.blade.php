<!DOCTYPE html>
<html>

<head>
    <title>Editar conjunto</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <form method="post" action="/editarConjuntoAccion" enctype="multipart/form-data">
        <div class="container mx-auto mt-5 p-10">


            <div class="morado p-5 rounded-md">
                @csrf
                <h1 class="text-center text-3xl text-white font-bold">Editar conjunto</h1>
                <div class="mb-3">
                    <label class="font-bold text-white text-xl">Nombre</label>
                    <div class="">
                        <input type="text" value="{{$conjunto->nombre}}" name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        <input type="hidden" name="id" class="form-control" value="{{$conjunto->id}}" />
                        <input type="hidden" name="numeroPrendas" class="form-control" value="{{$conjunto->numeroPrendas}}" />

                    </div>
                    @error('nombre')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="font-bold text-white text-xl">Descripcion</label>
                    <div class="">
                        <input type="text" value="{{$conjunto->descripcion}}" name="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    @error('descripcion')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror
                </div>












                <div class="mb-3">
                    <label class="font-bold text-white text-xl">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" name="foto" />
                        <img src="{{ asset('images/' . $conjunto->foto) }}" class="imagen mt-2" />
                    </div>
                    @error('foto')
                    <div class="text-white font-bold">{{ $message }}</div>
                    @enderror

                </div>





                <div class="barra-fija">
                    <input type="submit" class="bg-white cursor-pointer p-3 me-3 my-2 rounded-full text-xl font-bold" value="Editar conjunto" />
                </div>
            </div>

        </div>


        <div class="container mx-auto">
            <h1 class="text-6xl font-bold text-center morado-texto">Prendas incluidas</h1>



            <div class="prendas-div flex justify-center items-center flex-wrap">
                @foreach($prendasIncluidas as $prenda)
                <div class="prenda-ext p-5 md:w-1/3 w-full">

                    <div class="prenda-interior morado rounded-lg p-5 flex flex-col justify-center items-center">
                        <img src="{{ asset('images/' .  $prenda->foto) }}" class="imagen" />
                        <h1 class="mt-3 font-bold text-3xl text-white">{{$prenda->nombre}}</h1>
                        <h1 class="mt-3 font-bold text-xl text-white">{{$prenda->marca}}</h1>
                        <h1 class="mt-3 font-bold text-xl text-white">Comprada en {{$prenda->fechaCompra}}</h1>
                        <a class="bg-red-500 text-2xl p-3 rounded-full text-white mr-3" href="/eliminarPrendaConjuntoAccion/{{$prenda->idComponente}}">Eliminar</a>

                    </div>

                </div>
                @endforeach
            </div>







        </div>







        <div class="container mx-auto padding-abajo">
            <h1 class="text-6xl font-bold text-center morado-texto">Prendas sin incluir</h1>



            <div class="prendas-div flex justify-center items-center flex-wrap">
                @foreach($prendasFiltradas as $prenda)
                <div class="prenda-ext p-5 md:w-1/3 w-full">

                    <div class="prenda-interior morado rounded-lg p-5 flex flex-col justify-center items-center">
                        <img src="{{ asset('images/' .  $prenda->foto) }}" class="imagen" />
                        <h1 class="mt-3 font-bold text-3xl text-white">{{$prenda->nombre}}</h1>
                        <h1 class="mt-3 font-bold text-xl text-white">{{$prenda->marca}}</h1>
                        <h1 class="mt-3 font-bold text-xl text-white">Comprada en {{$prenda->fechaCompra}}</h1>
                        <select name="incluir{{$prenda->id}}" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="noincluir" selected>No incluir</option>
                            <option value="cabeza">Cabeza</option>
                            <option value="pecho">Pecho</option>
                            <option value="piernas">Piernas</option>

                        </select>

                    </div>

                </div>
                @endforeach
            </div>







        </div>
    </form>



</body>

</html>









<!--

<h1>editar conjunto</h1>
@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif
<form method="post" action="/editarConjuntoAccion" enctype="multipart/form-data">
    @csrf
    
    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" value="{{$conjunto->nombre}}" />
            <input type="hidden" name="id" class="form-control" value="{{$conjunto->id}}" />
            <input type="hidden" name="numeroPrendas" class="form-control" value="{{$conjunto->numeroPrendas}}" />
        </div>
        @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Descripcion</label>
        <div class="col-sm-10">
            <input type="text" name="descripcion" class="form-control" value="{{$conjunto->descripcion}}" />
        </div>
        @error('descripcion')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Foto</label>
        <div class="col-sm-10">
            <input type="file" name="foto" class="form-control" />
            <img src="{{ asset('images/' . $conjunto->foto) }}" width="100" class="img-thumbnail" />


        </div>
        @error('foto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>


    <h1>prendas incluidas</h1>
@foreach($prendasIncluidas as $prenda)
<h1>{{$prenda->nombre}}</h1>

<a href="/eliminarPrendaConjuntoAccion/{{$prenda->idComponente}}">eliminar</a>



@endforeach


<h1>prendas sin incluir</h1>
@foreach($prendasFiltradas as $prenda)
<h1>{{$prenda->nombre}}</h1>

<select name="incluir{{$prenda->id}}">
    <option value="noincluir" selected>No incluir</option>
    <option value="cabeza">Cabeza</option>
    <option value="pecho">Pecho</option>
    <option value="piernas">Piernas</option>

</select>





@endforeach










    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Add" />
    </div>
</form>
-->