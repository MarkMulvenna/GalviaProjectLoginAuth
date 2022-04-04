@extends('layouts.app')
@section('content')

    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/datepicker.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <body class="bg-gray-100">
    <div class="bg-gray-200">
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold text-blue-800">
                Create a new todo
            </h1>
        <h1 class="text-3xl py-5 bg-purple-400"> Add New Task </h1>
        </div>
        <div class="flex justify-center pt-10"?>
        <form action="/todos" method="POST">
            @csrf
            <h1 class="text-indigo-800 text-lg"> Add a title for task</h1>
            <input
            type="text"
            class="text-xl block shadow-5xl mb-10 p-2 w-100 italic placeholder-blue-400"
            name="title"
            placeholder="Title of task"
            >
            <h1 class="text-indigo-800 text-lg"> Add task details</h1>
        <input
            type="text"
            class="text-xl block shadow-5xl mb-10 p-2 w-100 italic placeholder-blue-400"
            name="task"
            placeholder="Task details"
        >
            <h1 class="text-indigo-800 text-lg"> Add a deadline for task (optional)</h1>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <input datepicker=""
                       datepicker-title="Enter Due Date"
                       datepicker-format="yyyy/mm/dd"
                       type="text"
                       name="dueDate"
                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                       placeholder="Select date">
            </div>
            <div class="mt-2 p-5 w-50 bg-white rounded-lg shadow-xl">
            <div class="flex">
                <select name="hours" class="bg-transparent text-xl appearance-none outline-none">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <span class="text-xl mr-3">:</span>
                <select name="minutes" class="bg-transparent text-xl appearance-none outline-none mr-4">
                    <option value="00">00</option>
                    <option value="30">15</option>
                    <option value="30">30</option>
                    <option value="30">45</option>
                </select>
                <select name="ampm" class="bg-transparent text-xl appearance-none outline-none">
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                </select>
            </div>
        </div>



            <button type="submit" class="bg-purple-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-extrabold align-middle">
            Submit
        </button>
            </form>

        </div>
    </div>
    </div>

    </body>
