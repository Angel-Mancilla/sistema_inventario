@extends('inventario.plantilla')


@section('seccion-central')


<main class="container  w-11/12  mx-auto p-4 ">


    <div>
        <h1 class="text-green-800 font-bold px-4">Editar Usuario</h1>

    </div>
    <br>
    <form action="{{route('usuario.update',$user)}}" method="POST" class="p-3 max-w-min bg-neutral-600 backdrop-blur-sm shadow-md border rounded border-none">
        @csrf
        @method('patch')
        <label for="" class="font-bold">
            <span class="text-blue-100">Nombre del usuario:</span>
            <br>
            <input type="text" autocomplete="off" name="name" value="{{old('name',$user->name)}}"  class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none">
        </label>
        @error('name')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        <label for="" class="font-bold">
            <span class="text-blue-100">Email del usuario:</span>
            <br>
            <input type="text" autocomplete="off" name="email"  value="{{old('email',$user->email)}}" class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none">
        </label>
        @error('email')
            <p class="text-red-500">{{$message}}</p>
        @enderror

        <br><br>
        <label for="" class="text-blue-100 font-bold">
            <span class="text-blue-100">Rol actual:</span> 
            <br> 
            <span>{{$user->role->description}}</span>
            <br><br>
            <select name="role_id" class="border-2 rounded-md bg-fuchsia-100 text-black border-purple-400 outline-none">
            <option value=" ">Seleccione un rol</option>
            @foreach ($roles as $rol)
                <option value="{{$rol->id}}" {{ old('role_id') == $rol->id ? 'selected' : '' }}>{{$rol->description}}</option>
            @endforeach
            </select>
        </label>
        @error('role_id')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <br><br>
        <label for="" class="font-bold">
            <span class="text-blue-100">Contrasenia nueva:</span>
            <br>
            <input type="password" autocomplete="off" name="password" class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none">
        </label>
        @error('password')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        <label for="" class="font-bold">
            <span class="text-blue-100">Confirmar Contrasenia:</span>
            <br>
            <input type="password" autocomplete="off" name="password_confirmation" class="border border-2 rounded-md bg-fuchsia-100 border-sky-400 outline-none">
        </label>
        @error('password_confirmation')
            <p class="text-red-500">{{$message}}</p>
        @enderror
        
        <button type="submit" class="bg-emerald-800 border rounded p-2 font-bold text-white  hover:bg-green-300 duration-200" type="submit"> add </button>
        <a type="button" href="{{route('usuario.index')}}" class="bg-red-600 border rounded p-2 font-bold text-white  hover:bg-red-400 duration-200">cancel</a>


    </form>


</main>

@endsection