<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class AddReviewForm extends Component
{
    public $tool;
    public $rating;
    public $performanceRating;
    public $customerServiceRating;
    public $supportRating;
    public $afterSalesSupportRating;
    public $miscellaneousRating;
    public $comment, $fddffdd;

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.add-review-form');
    }

    public function setRating($rating,$component)
{
    $this->$component = $rating;
}

    public function submitReview()
    {
        // dd($this);
        $validatedData = $this->validate([
            // 'rating' => 'required|integer|min:1|max:5',
            'performanceRating' => 'required|integer|min:1|max:5',
            'customerServiceRating' => 'required|integer|min:1|max:5',
            'supportRating' => 'required|integer|min:1|max:5',
            'afterSalesSupportRating' => 'required|integer|min:1|max:5',
            // 'miscellaneousRating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = new Review([
            'user_id' => auth()->id(),
            'tool_id' => $this->tool->id,
            'rating' => 0,
            'performance_rating' => $this->performanceRating,
            'customer_service_rating' => $this->customerServiceRating,
            'support_rating' => $this->supportRating,
            'after_sales_support_rating' => $this->afterSalesSupportRating,
            'miscellaneous_rating' => 0,
            'comment' => $this->comment ?? 'N/A',
            // 'is_approved' => false,
        ]);

        if($review->save()){
            // dd('true');
        }

        // Clear form fields after submission
        $this->reset(['rating', 'performanceRating', 'customerServiceRating', 'supportRating', 'afterSalesSupportRating', 'miscellaneousRating', 'comment']);

        // Emit an event to notify parent component or refresh the page
        $this->dispatch('refresh');
    }
}
