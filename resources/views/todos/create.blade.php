@extends('todos.layout')

@section('content')


<div class="flex justify-center border-gray-500">
    <h2 class="text-3xl mt-1">All your Todos</h2>
    <a href="{{route('todo.index')}}" class="text-blue-400 mx-0 p-1 p-3 cursor-pointer hover:text-black"><span class="fas fa-arrow-left"></span></a>
</div>

<x-alert />
<form action="{{route('todo.store')}}" method="post" class="py-5 focus-within:text-black">

    @csrf
    <div><input type="text" name="title" class="py-2 px-2 border rounded" placeholder="Title">
    </div>
    <div class="flex justify-center">
        <textarea type="text" name="description" class="p-2 border rounded m-5" placeholder="Description"></textarea>
    </div>

    <div class="py-2">
        @livewire('step')
    </div>
    <div class="py-1">
        <input type="submit" value="Create" class="p-2 border rounded bg-white cursor-pointer hover:bg-red-100 text-black">
    </div>

</form>


@endsection