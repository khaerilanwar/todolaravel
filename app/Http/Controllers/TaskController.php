<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new Task();
    }

    public function index(): View
    {
        $data = [
            "tasks" => $this->taskModel->where("status", 0)->get()
        ];

        return view('tasks', $data);
    }

    public function add(): View
    {
        return view('add');
    }

    public function detail(Task $task)
    {
        $data = [
            "task" => $task
        ];

        return view('detail', $data);
    }

    public function newTask(Request $request)
    {
        // Validasi data input
        $validateData = $request->validate(
            [
                'title' => 'required|min:5|max:255',
                'description' => 'required|min:8|',
                'deadline' => 'required|after:' . now()->addMinutes(10),
                'image' => 'mimes:jpeg,jpg,png,bmp|max:1024'
            ]
        );

        if ($request->hasFile('image')) {
            $path = $request->image->store("images", 'public');
            $validateData['image'] = $path;
        }

        $this->taskModel->create($validateData);

        return redirect("/tasks")->with("message", "Data berhasil ditambahkan!");
    }

    public function update(Request $request, Task $task)
    {
        // Validasi data input
        $validateData = $request->validate(
            [
                'title' => 'required|min:5|max:255',
                'description' => 'required|min:8|',
                'deadline' => 'required|after:' . now(),
                'image' => 'mimes:jpeg,jpg,png,bmp|max:1024'
            ]
        );

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($task['image']);
            $path = $request->image->store("images", 'public');
            $validateData['image'] = $path;
        }

        $task->update($validateData);

        return redirect("/tasks")->with("message", "Data berhasil diperbarui!");
    }

    public function edit(Task $task): View
    {
        $data = [
            "task" => $task
        ];

        return view('edit', $data);
    }

    public function deleteTask(Task $task)
    {
        if ($task['image']) {
            Storage::disk('public')->delete($task['image']);
        }
        $task->delete();
        return redirect("/tasks")->with("message", "Tugas berhasil dihapus!");
    }

    public function history()
    {
        $data = [
            "histories" => $this->taskModel->where("status", 1)->get()
        ];

        return view('history', $data);
    }

    public function updateStatus(Task $task)
    {
        $task->update([
            "status" => 1
        ]);

        return redirect('/tasks')->with('message', 'Tugas selesai dikerjakan!');
    }
}
