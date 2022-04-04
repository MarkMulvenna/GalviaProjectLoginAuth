<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Integer;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $todos = ToDo::where('status', '=' , 0)->get();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $dueDate = $this->getDueDate($request);
        $todo = ToDo::create([
            'title' => $request->input('title'),
            'task' => $request->input('task'),
            'dueDate' => $dueDate,
            'user_id' => auth()->user()->id
        ]);
        $todo->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('todos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $todo = ToDo::find($id);

        return view('todos.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'title' => 'required',
           'task' => 'required'
        ]);
        if (ToDo::where('id', $id)->get('dueDate') != 'NULL')
        {
            $request->validate([
                'dueDate' => 'required',
            ]);
        }

        $dueDate = $this->getDueDate($request);
        $todo = ToDo::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'task' => $request->input('task'),
                'dueDate' => $dueDate
            ]);

        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $todo = ToDo::find($id);
        $todo->delete();
        return redirect('/todos');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getDueDate(Request $request): string
    {
        $hoursFormatted = $request->input('hours');
        if (strlen($hoursFormatted) < 2) {
            $hoursFormatted = 0 . $hoursFormatted;
        }
        if (($request->input('ampm') == 'pm') && $hoursFormatted != 12) {
            $hoursFormatted = $hoursFormatted + 12;
        }
        if (($hoursFormatted == 12) && $request->input('ampm') == 'am')
        {
            $hoursFormatted == 00;
        }
        $dueDate = $request->input('dueDate');
        $dueDate .= " ";
        $dueDate .= $hoursFormatted;
        $dueDate .= ':';
        $dueDate .= $request->input('minutes');
        $dueDate .= ':00';
        return $dueDate;
    }
}
