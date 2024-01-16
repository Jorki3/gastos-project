<?php

namespace App\Livewire\Forms;

use App\Models\UserFinancial;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BudgetForm extends Form
{
    public ?UserFinancial $userFinancial;
    public $budget;

    public $method = 'save';

    public function setUserFinancial(UserFinancial $userFinancial)
    {
        $this->userFinancial = $userFinancial;
        $this->budget = $userFinancial->budget;
        $this->method = 'edit';
    }

    public function store()
    {
        UserFinancial::create(
            [
                'user_id' => Auth::user()->id,
                'budget' => $this->budget
            ]
        );
    }

    public function update()
    {
        $this->userFinancial->update(
            [
                'budget' => $this->budget
            ]
        );
    }
}
