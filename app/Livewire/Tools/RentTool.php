<?php

namespace App\Livewire\Tools;

use Carbon\Carbon;
use App\Models\Tool;
use Livewire\Component;

class RentTool extends Component
{
    public $tool, $startDate, $endDate;

    public function mount(Tool $tool){
        $this->tool = $tool;
    }

    public function render()
    {
        return view('livewire.tools.rent-tool', [
            'tool' => $this->tool
        ]);
    }

    public function updatedStartDate($date){
        // dd($date);
    }
   
    public function updatedEndDate($date){
        dd(Carbon::parse($this->startDate)->diffInDays(Carbon::parse($this->endDate)));
        if($this->endDate < $this->startDate){
            dd('invalid');
        }
        dd('valid');
        dd($date);
    }

    public function createOrder(){
        // 
    }
}
