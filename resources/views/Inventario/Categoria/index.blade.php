@extends('inventario.plantilla')

@section('seccion-central')
        @if (session('success'))
            <div id="alerta" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
  
        <main class="container  w-11/12  mx-auto p-4 ">
            <h1 class="text-blue-800 font-bold px-4">Categorias</h1>
            <div class="flex justify-self-end p-2">
    
                <a href="{{route('categoria.create')}}" class="p-1 border border-gray-500 rounded bg-emerald-400 hover:bg-emerald-300"><span class="text-gray-500 font-stretch-50%">Añadir</span></a>
    
            </div>
            <table class="min-w-full table-auto bg-white border border-gray-300">
                <thead class="bg-slate-700 border-solid rounded">
                    <tr >
                        <th class="py-2 px-4 border-b">Id</th>
                        <th class="py-2 px-4 border-b max-w-md">Categoria</th>
                        <th class="py-2 px-4 border-b">Estado</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
    
    
    
                </thead>
    
                <tbody>
                    @foreach ($categorias as $categoria)
                        
                        <tr class="odd:bg-gray-300 even:bg-white hover:bg-green-200">
                            <td class="py-2 px-4 border-b text-center">{{$categoria->id}}</td>
                            <td class="py-2 px-4 border-b text-center whitespace-normal break-words max-w-md text-pretty">{{$categoria->descripcion}}</td>
                            <td class="py-2 px-4 border-b text-center">
                                @if ($categoria->estado)
                                    Activo
                                @else    
                                    Inactivo
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b"> 
                                <div class="flex justify-center">
                                    <a href="{{route('categoria.edit',$categoria)}}" class="p-1 border border-gray-500 rounded bg-emerald-400 hover:bg-emerald-300"><span class="text-gray-500 font-stretch-50%">Edit</span></a>
                                    {{-- <a href="{{route('grupo.destroy',$grupo)}}" class="p-1 border border-gray-500 rounded bg-red-400 hover:bg-red-300"><span class="text-gray-200 font-stretch-50%">Delete</span></a> --}}
                                    <form action="{{route('categoria.destroy',$categoria)}}" method="POST" class="ml-2">
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
            <div class="mb-4">
                {{-- {{ $grupos->links() }} --}}
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