@extends('todo.layout')

@section('content')
    <div class="flex justify-between border-b pb-4 p-4">
        <h1 class="text-2xl">Daily todo list</h1>

        <a href="{{route('todo.index')}}" class="text-gray-500 cursor-pointer">
            <span class="fas fa-arrow-alt-circle-left"/>
        </a>
    </div>

    <x-alert/>
    <form method="post" action="{{route('todo.store')}}" class="py-5">
        @csrf
        <div class="py-1">
            <input type="text" name="title" class="py-2 px-2 border rounded" placeholder="title">
        </div>

        <div class="py-1">
            <textarea name="description" cols="30" rows="10" class="p-2 rounded border" placeholder="description"></textarea>
        </div>

        <div class="py-2">            
            @livewire('step')
            
        </div>

        <div class="py-1">
            <input type="submit" value="Create" class="p-2 border bg-green-300 rounded-lg">
        </div>
    </form>

        

@endsection