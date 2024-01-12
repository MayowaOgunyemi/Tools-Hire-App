<?php

namespace App\Livewire\Tools;

use Carbon\Carbon;
use App\Models\Tool;
use Livewire\Component;
use App\Models\ToolsRental;
use Filament\Notifications\Notification;

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
        // dd(Carbon::parse($this->startDate)->diffInDays(Carbon::parse($this->endDate)));
        
    }

    public function createOrder(){
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ],[
            'endDate.after_or_equal' => 'Select a valid end date'
        ]);
        $newOrder = ToolsRental::create([
            'tool_id' => $this->tool->id,
            'start_date' => $this->startDate,
            'end_date' => $this->startDate,
            'no_of_days' => Carbon::parse($this->startDate)->diffInDays(Carbon::parse($this->endDate)),
        ]);
        
        if($newOrder){
            $this->reset(['startDate', 'endDate']);
            Notification::make()
            ->title('Order placed successfully')
            ->body('We have received your request, we will get back to you shortly.')
            ->success()
            ->send();
        }
    }
}
