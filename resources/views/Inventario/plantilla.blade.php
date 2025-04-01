@extends('layout.plantilla')

@section('title', 'Sistema Inventario')

@section('content')
    
{{-- container  mx-auto px-4  --}}
    <main> 
        <header class="w-full bg-neutral-800">
            <div class="w-full max-w-screen-xl px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <h1 class="text-white text-lg font-semibold">SGI CTS</h1>
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="#" class="text-white"></a></li>
                        <li><a href="#" class="text-white">notificacion</a></li>
                        <li><a href="#" class="text-white">Almacen</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="flex">
            <aside class="w-fit h-screen bg-neutral-800">
                <div class="flex flex-col items-start space-y-4 p-4">
                    <h1 class="text-white text-lg font-semibold">Bienvenido: {{Auth::user()->name}} </h1>
                    <hr class="w-full rounded-2xl border-2 border-solid border-gray-100 mb-5">
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white">Dashboard</a></li>
                        <li><a href="#" class="text-white">Almacen</a></li>
                        <li><a href="{{route('articulo.index')}}" class="text-white">Articulo</a></li>
                        <li><a href="{{route('categoria.index')}}" class="text-white">Categoria</a></li>
                        <li><a href="{{route('grupo.index')}}" class="text-white">Grupo</a></li>
                        
                        <li><a href="{{route('logout')}}" class="text-white">Cerrar sesion</a></li>
                        
                    </ul>
                </div>
            </aside>
            <section class="w-full  bg-neutral-300">


                @yield('seccion-central')



            </section>
        </div>
        



    </main>

@endsection