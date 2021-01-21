@extends('todos.layout')

@section('content')

<div class="flex justify-center">
    <p class="text-2xl">All your Todos</p>
    <a href="{{route('todo.create')}}" class="mx-3 py-1 cursor-pointer text-blue-400 hover:text-black"><span class="fas fa-plus-circle"></span></a>
</div>
<ul class="mt-10">
    <x-alert />
    @forelse($todos as $todo)
    <li class="flex justify-between p-2 hover:bg-blue-100 rounded mt-1">
        <div>
            @include('todos.completeButton')
        </div>
        @if($todo->completed)
        <a href="{{route('todo.show', $todo->id)}}">
            <p class="line-through ml-14">
                {{$todo->title}}
            </p>
        </a>
        @else
        <a href="{{route('todo.show', $todo->id)}}">
            <p class="ml-14 cursor-pointer">{{$todo->title}}</p>
        </a>
        @endif
        <div>
            <a href="{{route('todo.edit', $todo->id)}}" class="text-black-500 rounded mx-5 py-1 px-3 cursor-pointer hover:text-blue-400">
                <span class="fas fa-edit"></span>
            </a>
            <span class="fas fa-trash cursor-pointer text-red-400 hover:text-red-600" onclick="event.preventDefault(); if(confirm('Are you sure to delete this todo?')) {
                document.getElementById('form-delete-{{$todo->id}}').submit()}">
            </span>
            <form action="{{route('todo.destroy', $todo->id)}}" method="post" id="{{'form-delete-'.$todo->id}}" style="display:none">
                @csrf
                @method('delete')
            </form>
        </div>
    </li>
    @empty
    <figure class="bg-red-500 text-white">
        <p>No list todos</p>
    </figure>
    @endforelse
</ul>


<!-- Working on 3:52:00 -->

@endsection