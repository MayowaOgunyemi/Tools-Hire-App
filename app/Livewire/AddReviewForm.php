<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Filament\Notifications\Notification;

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
        $this->validate([
            'performanceRating' => 'required|integer|min:1|max:5',
            'customerServiceRating' => 'required|integer|min:1|max:5',
            'supportRating' => 'required|integer|min:1|max:5',
            'afterSalesSupportRating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = new Review([
            'user_id' => auth()->id(),
            'tool_id' => $this->tool->id,
            'performance_rating' => $this->performanceRating,
            'customer_service_rating' => $this->customerServiceRating,
            'support_rating' => $this->supportRating,
            'after_sales_support_rating' => $this->afterSalesSupportRating,
            'comment' => $this->comment ?? 'N/A',
        ]);

        if($review->save()){
        $this->reset(['rating', 'performanceRating', 'customerServiceRating', 'supportRating', 'afterSalesSupportRating', 'miscellaneousRating', 'comment']);

            Notification::make()
            ->title('Review added')
            ->body('We have received your review successfully.')
            ->success()
            ->send();

        return redirect(url('/').'/tool/'.$this->tool->slug);

        }
    }
}
