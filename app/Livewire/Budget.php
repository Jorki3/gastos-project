<?php

namespace App\Livewire;

use App\Enums\Category;
use App\Models\Expense;
use App\Models\UserFinancial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Budget extends Component
{
    public UserFinancial $userFinancial;

    public $labels;
    public $data;
    public $bgColors;

    public function mount()
    {
        $this->read();
    }

    public function read()
    {
        $this->labels  = array_values(Category::asArray());
        $user = Auth::user()->id;

        $ahorro = Expense::where('category', 1)->where('user_id', $user)->sum('cost');
        $comida = Expense::where('category', 2)->where('user_id', $user)->sum('cost');
        $casa = Expense::where('category', 3)->where('user_id', $user)->sum('cost');
        $gastos = Expense::where('category', 4)->where('user_id', $user)->sum('cost');
        $ocio = Expense::where('category', 5)->where('user_id', $user)->sum('cost');
        $salud = Expense::where('category', 6)->where('user_id', $user)->sum('cost');
        $suscripciones = Expense::where('category', 7)->where('user_id', $user)->sum('cost');

        $this->data = array_values([
            $ahorro,
            $comida,
            $casa,
            $gastos,
            $ocio,
            $salud,
            $suscripciones,
        ]);

        $this->bgColors = array_values([
            'rgba(76, 175, 80, 1)',
            'rgba(255, 152, 0, 1)',
            'rgba(121, 85, 72, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(33, 150, 243, 1)',
            'rgba(0, 188, 212, 1)',
            'rgba(255, 64, 129, 1)',
        ]);
    }

    public function render()
    {
        return view('livewire.budget');
    }
}
