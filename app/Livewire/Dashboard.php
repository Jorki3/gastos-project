<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\UserFinancial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $isOpenBudget = false;
    public $isOpenExpense = false;

    public $expense;

    public function toggleBudgetForm()
    {
        $this->isOpenBudget = !$this->isOpenBudget;
    }

    public function toggleExpenseForm(Expense $expense = null)
    {
        $this->expense = $expense;
        $this->isOpenExpense = !$this->isOpenExpense;
    }

    public function read()
    {
        return UserFinancial::firstWhere('user_id', Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'userFinancial' => $this->read()
        ]);
    }
}
