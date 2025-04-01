@extends('inventario.plantilla')


@section('seccion-central')


<main class="container  w-11/12  mx-auto p-4 ">


    <div>
        <h1 class="text-green-800 font-bold px-4">Editar Articulo</h1>

    </div>
    <br>
    <form action="{{route('articulo.update',$articulo)}}" method="POST" class="p-3 max-w-min bg-neutral-600 backdrop-blur-sm shadow-md border rounded border-none">
        @csrf
        @method('put')
        <label for="" class="font-bold">
            <span class="text-blue-100">descripcion del articulo: </span>
            <br>
            <textarea  name="descripcion"   rows="5" cols="50" class="border-2 rounded-md font-medium bg-fuchsia-100 border-sky-400 outline-none overflow-y-auto resize-none">{{old('descripcion',$articulo->descripcion)}}</textarea>
            
        </label>
        @error('descripcion')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        


        <label for="" class="font-bold">
            <span class="text-blue-100">Categoria: </span>
            <br>
            {{-- <input type="text" name="categoria_id"  value="{{old('categoria_id')}}" class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none"> --}}
           
                
            
                <select name="categoria_id" id="" class="border-2 rounded-md font-extralight bg-fuchsia-100 text-black border-purple-400 outline-none">
                    {{-- <option value="" >seleccione una categoria</option> --}}
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" {{old('categoria_id', $articulo->categoria_id) == $categoria->id ? 'selected' : ''}}> {{$categoria->descripcion}}</option>
                    @endforeach
                </select>
            

        </label>
        @error('categoria_id')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>




        <label for="" class="font-bold">
            <span class="text-blue-100">Marca: </span>
            <br>
            {{-- <input type="text" name="grupo_id"  value="{{old('grupo_id')}}" class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none"> --}}
            <select name="grupo_id" id="" class="border-2 rounded-md font-extralight bg-fuchsia-100 text-black border-purple-400 outline-none">
                 {{-- <option value="" >Seleccione una marca</option> --}}
            @foreach ($grupos as $grupo)
                <option value="{{$grupo->id}}" {{old('grupo_id',$articulo->grupo_id) == $grupo->id ? 'selected' : ''}}>{{$grupo->descripcion}}</option>
            @endforeach

            </select>
        </label>
        @error('grupo_id')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        <label for="" class="font-bold">
            <span class="text-blue-100">Stock: </span>
            <br>
            <input type="number" name="stock"  value="{{old('stock',$articulo->stock)}}" min="0"  class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none">
            
        </label>
        @error('stock')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>



        <label for="" class="text-blue-100 font-bold">
            <span class="text-blue-100">Estado:</span> 
            <br> 
            <select name="estado" class="border-2 rounded-md bg-fuchsia-100 text-black border-purple-400 outline-none">
                <option value="1" {{ old('estado',$articulo->estado) == 'true' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado',$articulo->estado) == 'false' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </label>
        @error('estado')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        
        <button class="bg-emerald-800 border rounded p-2 font-bold text-white  hover:bg-green-300 duration-200" type="submit"> add </button>
        <a type="button" href="{{route('articulo.index')}}" class="bg-red-600 border rounded p-2 font-bold text-white  hover:bg-red-400 duration-200">cancel</a>


    </form>


</main>

@endsection