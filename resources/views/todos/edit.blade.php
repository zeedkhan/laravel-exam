@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b pb-4 border-gray-400">
    <h2 class="text-2x1">Edit or Update your todo</h2>
    <a href="{{route('todo.index')}}" class="text-blue-400 mx-3 cursor-pointer"><span class="fas fa-arrow-left"></span></a>
</div>
<x-alert />
<!-- Receive the name of url .../todos/{parameter}/update, our parameter is $todo->id put this varaiable inside the url -->
<!-- localhost:8000\todos\id\update -->
<h3 class="pt-5">Todo: <strong>{{$todo->title}}</strong></h3>
<div class="flex justify-center p-4">
    <form action="{{route('todo.update', $todo->id)}}" method="post">
        @csrf
        <!-- Add put method -->
        @method('put')
        <div><input type="text" name="title" class="py-2 px-2 border rounded" placeholder="title" value="{{$todo->title}}"></div>
        <div class="flex justify-center">
            <textarea type="text" name="description" class="p-2 border rounded m-5" placeholder="Description">{{$todo->description}}</textarea>
        </div>
        <div class="py-2">
            @livewire('edit-step', ['steps' => $todo->steps])
        </div>
        <input type="submit" value="Update" class="p-2 border rounded">
    </form>
</div>


@endsection