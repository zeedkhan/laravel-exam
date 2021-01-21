@extends('todos.layout')

@section('content')

<div class="flex justify-center border-b pb-4 border-gray-400 ml-5">
    <h2 class="text-2x1"><strong> Your Todo</strong></h2>
    <a href="{{route('todo.index')}}" class="text-blue-400 mx-3 cursor-pointer hover:text-black"><span class="fas fa-arrow-left"></span></a>
</div>
<x-alert />
<h3 class="p-5">Todo Title: <strong>{{$todo->title}}</strong></h3>
@if($todo->steps->count() > 0)
<div class="border-gray-400">
    <p class="pb-5 pt-1 underline md:underline">Step for this todo</p>
    @foreach($todo->steps as $step)
    <p class="mt-2">{{$step->name}}</p>
    @endforeach
</div>
@endif
@endsection