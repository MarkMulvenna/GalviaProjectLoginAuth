@extends('layouts.app')
@section('content')
    <div class="m-auto w-4/5 py-16">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold"> Todos</h1>
        </div>
    </div>
    @if (\Illuminate\Support\Facades\Auth::user())
        <div class="pt-10">
            <a
                href="todos/create"
                class="border-b-2 pb-2 border-dotted italic text-blue-800 text-2xl">
                Add a todo &rarr;
            </a>
            <div class="py-6"></div>
            @foreach($todos as $todo)
                <div class="m-auto">
                    @if (isset(Auth::user()->id) && \Illuminate\Support\Facades\Auth::user()->id == $todo->user_id)
                        <div class="float-right">
                            <a
                                class="border-b-2 pb-2 border-dotted italic text-blue-800 text-xl"
                                href="todos/{{$todo->id}}/edit">
                                Edit &rarr;
                            </a>
                            <form action="todos/{{$todo->id}}" class="pt-4" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                    type="submit"
                                    class="border-b-2 pb-2 border-dotted italic text-red-600">
                                    Delete &rarr;
                                </button>
                            </form>
                        </div>
                        <span class="uppercase text-blue-800 font-bold text-lg italic">
                            Title: {{$todo->title}}
                        </span>
                        <h2 class="text-black text-2xl">
                            Task: {{$todo->task}}
                        </h2>
                        <h2 class="text-black text-sm">
                            Due Date: {{$todo->dueDate}}
                        </h2>

                        <hr class="mt-4 mb-8">

                </div>
                @endif
            @endforeach

        </div>
    @else
        <p class="py-12 italic">
            Please login to add records.
        </p>
    @endif

