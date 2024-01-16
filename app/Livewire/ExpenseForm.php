<?php

namespace App\Livewire;

use App\Enums\Category;
use App\Livewire\Forms\ExpenseForm as FormsExpenseForm;
use App\Models\Expense;
use App\Models\UserFinancial;
use Livewire\Component;

class ExpenseForm extends Component
{
    public FormsExpenseForm $form;

    public function mount(UserFinancial $userFinancial, Expense $expense = null)
    {
        $this->form->set($userFinancial, $expense);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirect('/dashboard');
    }

    public function edit()
    {
        $this->form->update();

        return $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.expense-form', [
            'categories' => Category::asArray()
        ]);
    }
}
