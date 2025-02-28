@extends('layout.plantilla')

@section('title', 'Sistema Inventario')

@section('content')
    
{{-- container  mx-auto px-4  --}}
    <main> 
        <header class="w-full bg-neutral-800">
            <div class="max-w-screen-xl mx-auto px-4 py-2 flex items-center justify-between">
                <h1 class="text-white text-lg font-semibold">DFT SYSTEM</h1>
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="#" class="text-white"></a></li>
                        <li><a href="#" class="text-white">notificacion</a></li>
                        <li><a href="#" class="text-white">almacen</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="flex">
            <aside class="w-fit h-screen bg-neutral-800">
                <div class="flex flex-col items-start space-y-4 p-4">
                    <h1 class="text-white text-lg font-semibold">Nombre usuario</h1>
                    <hr class="w-full rounded-2xl border-2 border-solid border-gray-100 mb-5">
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white">Dashboard</a></li>
                        <li><a href="#" class="text-white">Almacen</a></li>
                        <li><a href="#" class="text-white">Articulo</a></li>
                        <li><a href="#" class="text-white">Categoria</a></li>
                        <li><a href="{{route('grupo.index')}}" class="text-white">Grupo</a></li>
                        
                        <li><a href="#" class="text-white">Salir</a></li>
                        
                    </ul>
                </div>
            </aside>
            <section class="w-full bg-gray-200">


                @yield('seccion-central')



            </section>
        </div>
        



    </main>

@endsection