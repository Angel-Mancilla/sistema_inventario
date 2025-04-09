@extends('inventario.plantilla')

@section('seccion-central')

        @if (session('success'))
            <div id="alerta" class="bg-green-500 text-white p-4 rounded mb-4 duration-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4 duration-200">
                {{session('error')}};
            </div>
        @endif

        
  
        <main class="container  w-11/12  mx-auto p-4 ">
            <h1 class="text-blue-800 font-bold px-4">Articulos</h1>
          
            <div class="flex justify-self-end p-2">
    
                <a href="{{route('articulo.create')}}" class="p-1 border border-gray-500 rounded bg-emerald-400 hover:bg-emerald-300"><span class="text-gray-500 font-stretch-50%">Añadir</span></a>
    
            </div>
                
            
            {{-- <div class="overflow-x-auto w-full"> --}}
                {{-- min-w-[1000px] --}}
            <table class="min-w-full table-auto bg-white border  border-gray-300 border-t-4  rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-gray-300 border-solid rounded ">
                    <tr >
                        <th class="py-2 px-4 border-b">Id</th>
                        <th class="py-2 px-4 border-b max-w-md">Nombre del producto</th>
                        <th class="py-2 px-4 border-b">Categoria</th>
                        <th class="py-2 px-4 border-b">Marca</th>
                        <th class="py-2 px-4 border-b">Stock</th>
                        <th class="py-2 px-4 border-b">Estado</th>
                        <th class="py-2 px-4 border-b">Fecha de creacion</th>
                        <th class="py-2 px-4 border-b">Ultima actualizacion</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
    
    
    
                </thead>
    
                <tbody>
                    @foreach ($articulos as $articulo)
                        
                        <tr class="odd:bg-gray-300 even:bg-white hover:bg-green-200">
                            <td class="py-2 px-4 border-b border-b-gray-500 text-center">{{$articulo->id}}</td>
                            <td class="py-2 px-4 border-b border-b-gray-500 text-center whitespace-normal break-words max-w-md text-pretty">{{$articulo->descripcion}}</td>
                            <td class="py-2 px-4 border-b border-b-gray-500 text-center whitespace-normal break-words max-w-md text-pretty">{{$articulo->categoria->descripcion}}</td>
                            <td class="py-2 px-4 border-b border-b-gray-500 text-center whitespace-normal break-words max-w-md text-pretty">{{$articulo->grupo->descripcion}}</td>
                            <td class="py-2 px-4 border-b border-b-gray-500 text-center">{{$articulo->stock}}</td>
                            <td class="py-2 px-4 border-b  border-b-gray-500 text-center">
                                @if ($articulo->estado)
                                    <span class="text-green-700">Activo</span>
                                @else    
                                    <span class="text-red-500">Inactivo</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-500 text-center whitespace-normal break-words max-w-md text-pretty">{{ optional($articulo->created_at)->format('d/m/Y H:i:s')}}</td>
                            <td class="py-2 px-4 border-b border-b-gray-500 text-center whitespace-normal break-words max-w-md text-pretty">{{ optional($articulo->updated_at)->format('d/m/Y H:i:s')}}</td>
                            <td class="py-2 px-4 border-b border-b-gray-500"> 
                                <div class="flex justify-center">
                                    <a href="{{route('articulo.edit',$articulo)}}" class="p-1 border border-gray-500 rounded bg-emerald-400 hover:bg-emerald-300"><span class="text-gray-500 font-stretch-50%">Edit</span></a>
                                    {{-- <a href="{{route('grupo.destroy',$grupo)}}" class="p-1 border border-gray-500 rounded bg-red-400 hover:bg-red-300"><span class="text-gray-200 font-stretch-50%">Delete</span></a> --}}
                                    <form action="{{route('articulo.destroy',$articulo)}}" method="POST" class="ml-2">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="p-1 border border-gray-500 rounded bg-red-400 hover:bg-red-300"><span class="text-gray-200 font-stretch-50%">delete</button>
    
    
    
                                    </form>
                                </div>
    
                            </td>
                        </tr>
                    @endforeach
    
                </tbody>
            </table>
            {{-- </div> --}}
            <br>
            <div class="mb-4">
                {{ $articulos->links() }}
            </div>
            
            <script>
                // Hace que la alerta desaparezca después de 3 segundos
                setTimeout(() => {
                    const alerta = document.getElementById('alerta');
                    if (alerta) {
                        alerta.style.display = 'none';
                    }
                }, 3000);
            </script>
        </main>
    
    
@endsection