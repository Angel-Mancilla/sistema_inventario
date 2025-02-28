@extends('layout.plantilla')   

@section('title', 'Home')
@section('content')
    <div class="h-screen bg-gradient-to-r from-cyan-600 to-gray-900 p-2">
            <div class="container mx-auto max-w-2xl ">
                <h1 class="text-2xl text-center text-gray-200">SISTEMA DE INVENTARIO</h1>

                {{-- bg-gradient-to-r from-neutral-900 to-purple-900 --}}
            </div>
            <div class="rounded-md container mx-auto max-w-2xl mt-24 bg-white/30 backdrop-blur-sm ">
                
                <h1 class="text-cyan-300 text-center">Ingresar al sistema</h1>
                <form action="" method="">

                    <input type="email" name="email" autocomplete="off" placeholder="Email" class=" block w-full p-2 mb-3 outline-none text-gray-100 border-b-2 border-gray-200">
                    <input type="password" name="password" autocomplete="off" placeholder="password" class=" block w-full p-2 mb-3 outline-none text-gray-100 border-b-2 border-gray-200">
                    <input type="checkbox" name="remember" id="recordar">
                    <label for="recordar" class="text-gray-700">Mantener sesion iniciada</label>
        
        
                    <button type="submit" class="mt-4 rounded-md block mx-auto bg-gray-400 hover:bg-gray-500 ease-in duration-300"> Iniciar sesion</button>
        


                </form>
                <a href="{{route('inventario.dashboard')}}">Entrar</a>
            </div>
    </div>
@endsection