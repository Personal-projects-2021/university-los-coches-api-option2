<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\Type;

class TypeIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        $types = Type::where('name','LIKE','%'.$this->search.'%')
                                ->latest('id')
                                ->paginate(10);

        return view('livewire.admin.type-index', compact('types'));
    }
}
