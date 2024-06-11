<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;

class TodoList extends Component
{
    use WithPagination;

    #[Validate('required|min:3|max:50')]
    public $name;
    #[Url()]
    //#[Url(as : 's', history :true, keep: true)]
    public $search;
    public $editingTodoId;
    #[Rule('required|min:3|max:50')]
    public $editingTodoName;

    public function create()
    {

        $validated = $this->validateOnly('name');
        Todo::create($validated);
        $this->reset('name');
        request()->session()->flash('success', 'Created');
    }

    public function delete($todoId)
    {
        Todo::find($todoId)->delete();
    }
    public function cancelEdit()
    {
        $this->reset('editingTodoId', 'editingTodoName');
    }
    public function update()
    {
        $this->validateOnly('editingTodoName');
        Todo::find($this->editingTodoId)->update(
            [
                'name' => $this->editingTodoName,

            ]
        );
        $this->cancelEdit();
    }

    public function edit($todoId)
    {
        $this->editingTodoId = $todoId;
        $this->editingTodoName = Todo::find($todoId)->name;
    }

    #[Computed()]
    public function todos()
    {
        return Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(10);
    }

    #[On('user-created')]
    public function render()
    {
        //sleep(3);
        $todos = $this->todos;
        return view('livewire.todo-list', [
            'todos' => $todos
        ]);
    }
    public function placeholder()
    {
        return view('placeholder');
    }
}