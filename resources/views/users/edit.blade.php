

@extends('layout')

@section('content')

<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24 mb-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        User edit form
    </h2>
    <p class="mb-4">Create an account to post your indoor facilities</p>
</header>

<form method="POST" action="/users/update/{{$users->id}}">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">
            Name
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"  value="{{$users->name}}"
        />

        @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>  
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"  value="{{$users->email}}"
        />
        <!-- Error Example -->
        @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>  
        @enderror
    </div>




    



    <div class="mb-6">
        <label for="role_id" class="inline-block text-lg mb-2"
            >Role</label
        >
       <select id="role_id" name="role_id">
        <option value="">Select Role</option>

      @foreach (\App\Enums\Role::cases() as $role)
    <option value="{{$role->value}}"
        {{old ('role_id',$users->role_id->value) == $role->value? 'selected' : ''}}
    >
        {{ucwords(str_replace('_',' ', \Illuminate\Support\Str::snake($role->name)))}}
    </option>
@endforeach
       </select>
    </div>

    <div class="mb-6">
        <button type="submit" 
            class="bg-red-500 text-white rounded py-2 px-4 hover:bg-black">
            Edit User Information
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
    </div>
   
</form>
</div>

@endsection
