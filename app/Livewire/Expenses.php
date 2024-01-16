<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\UserFinancial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Expenses extends Component
{
    public UserFinancial $userFinancial;

    public function read()
    {
        return Expense::where('user_id', Auth::user()->id)->get();
    }

    public function delete(Expense $expense)
    {
        $this->userFinancial->update([
            'expense' => $this->userFinancial->expense - $expense->cost
        ]);

        $expense->delete();

        return $this->redirect('/dashboard');
    }

    public function mount(UserFinancial $userFinancial)
    {
        $this->userFinancial = $userFinancial;
    }

    public function render()
    {
        return view('livewire.expenses', [
            'expenses' => $this->read()
        ]);
    }
}
