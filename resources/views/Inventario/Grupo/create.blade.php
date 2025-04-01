@extends('inventario.plantilla')


@section('seccion-central')


<main class="container  w-11/12  mx-auto p-4 ">


    <div>
        <h1 class="text-green-800 font-bold px-4">Añadir Marca</h1>

    </div>
    <br>
    <form action="{{route('grupo.store')}}" method="POST" class="p-3 max-w-min bg-neutral-600 backdrop-blur-sm shadow-md border rounded border-none">
        @csrf
        <label for="" class="font-bold">
            <span class="text-blue-100">Nombre de la marca:</span>
            <br>
            <input type="text" name="descripcion"  value="{{old('descripcion')}}" class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none">
        </label>
        @error('descripcion')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        <label for="" class="text-blue-100 font-bold">
            <span class="text-blue-100">Estado:</span> 
            <br> 
            <select name="estado" class="border-2 rounded-md bg-fuchsia-100 text-black border-purple-400 outline-none">
                <option value="1" {{ old('estado') == 'true' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado') == 'false' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </label>
        @error('estado')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        
        <button class="bg-emerald-800 border rounded p-2 font-bold text-white  hover:bg-green-300 duration-200" type="submit"> add </button>
        <a type="button" href="{{route('grupo.index')}}" class="bg-red-600 border rounded p-2 font-bold text-white  hover:bg-red-400 duration-200">cancel</a>


    </form>


</main>

@endsection