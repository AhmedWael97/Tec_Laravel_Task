<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\TaskService;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private $service;
    public function __construct()
    {
        $this->service = new TaskService();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.index')->with('tasks', $this->service->fetchAll());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'start_in' => 'required|date|after:'.Date('d-m-Y'),
            'deadline' => 'required|date|after:start_in'
        ]);

        try {
            $this->service->store($request->all());

            return redirect()->route('tasks.index');
        } catch(Exception $e) {

            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($task)
    {
        return view('tasks.view')->with('task', $this->service->view($task));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($task)
    {
        return view('tasks.edit')->with('task', $this->service->view($task));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $task)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'start_in' => 'required|date|after:'.Date('d-m-Y'),
            'deadline' => 'required|date|after:start_in'
        ]);

        try {
            $this->service->update($request->except('_token', '_method'), $task);

            return redirect()->route('tasks.index');
        } catch(Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        try {
            $this->service->destroy($task);
            return redirect()->route('tasks.index');
        } catch (Exception $e) {

        }
    }
}
