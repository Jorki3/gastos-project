<?php

namespace App\Livewire\Forms;

use App\Models\Expense;
use App\Models\UserFinancial;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ExpenseForm extends Form
{
    public ?UserFinancial $userFinancial;
    public ?Expense $expense;

    public $name;
    public $cost;
    public $category;

    public $method = 'save';

    public function set(UserFinancial $userFinancial, Expense $expense = null)
    {
        $this->userFinancial = $userFinancial;


        if ($expense->id == null) {
            return;
        }

        $this->expense = $expense;
        $this->name = $expense->name;
        $this->cost = $expense->cost;
        $this->category = $expense->category;

        $this->method = 'edit';
    }


    public function store()
    {
        $expense = Expense::create(
            [
                'user_id' => Auth::user()->id,
                'name' => $this->name,
                'cost' => $this->cost,
                'category' => $this->category
            ]
        );

        $this->userFinancial->update([
            'expense' => $this->userFinancial->expense + $expense->cost
        ]);
    }

    public function update()
    {
        $this->expense->update(
            [
                'name' => $this->name,
                'cost' => $this->cost,
                'category' => $this->category
            ]
        );
    }
}
