<?php

namespace App\Livewire;

use App\Livewire\Forms\BudgetForm as FormsBudgetForm;
use App\Models\UserFinancial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BudgetForm extends Component
{
    public FormsBudgetForm $form;

    public function mount($userFinancial)
    {
        if ($userFinancial) {
            $this->form->setUserFinancial($userFinancial);
        }
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
        return view('livewire.budget-form');
    }
}
