@extends('inventario.plantilla')

@php
use App\Models\User;    
@endphp
@section('seccion-central')

    
<main class="container  w-11/12  mx-auto p-4 ">
    <h1 class="text-blue-800 font-bold px-4">Usuarios</h1>
    @can('create',User::class)
        <div class="flex justify-self-end p-2">

            <a href="{{route('usuario.create')}}" class="p-1 border border-gray-500 rounded bg-emerald-400 hover:bg-emerald-300"><span class="text-gray-500 font-stretch-50%">Añadir</span></a>

        </div>    
    @endcan
    
    <table class="min-w-full table-auto bg-white border border-gray-300 border-t-4  rounded-lg overflow-hidden">
        <thead class="bg-blue-600 text-gray-300 border-solid rounded">
            <tr >
                <th class="py-2 px-4 border-b">Id</th>
                <th class="py-2 px-4 border-b max-w-md">Nombre</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Rol</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                
                <tr class="odd:bg-gray-300 even:bg-white hover:bg-green-200">
                    <td class="py-2 px-4 border-b text-center">{{$user->id}}</td>
                    <td class="py-2 px-4 border-b text-center whitespace-normal break-words max-w-md text-pretty">{{$user->name}}</td>
                    <td class="py-2 px-4 border-b text-center">{{$user->email}}</td>
                    <td class="py-2 px-4 border-b text-center">{{$user->role->description}}</td>
                    <td class="py-2 px-4 border-b"> 
                       
                            <div class="flex justify-center">
                                @can('update', $user)
                                    <a href="{{route('usuario.edit',$user)}}" class="p-1 border border-gray-500 rounded bg-emerald-400 hover:bg-emerald-300"><span class="text-gray-500 font-stretch-50%">Edit</span></a>
                                @endcan
                                {{-- <a href="" class="p-1 border border-gray-500 rounded bg-red-400 hover:bg-red-300"><span class="text-gray-200 font-stretch-50%">Delete</span></a> --}}
                                 <form action="" method="POST" class="ml-2">
                                    @csrf
                                    @method('patch')
                                    {{-- <label for="estado">Estado del usuario</label> --}}
                                    <input type="checkbox" name="estado" value="1" {{old('estado')}}>
                                    {{-- <button type="submit" class="p-1 border border-gray-500 rounded bg-red-400 hover:bg-red-300"><span class="text-gray-200 font-stretch-50%">delete</button> --}}



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

</main>
    
@endsection