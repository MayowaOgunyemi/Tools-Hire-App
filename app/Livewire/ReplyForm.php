<?php

namespace App\Livewire;

use App\Models\Reply;
use App\Models\Review;
use Livewire\Component;
use Filament\Notifications\Notification;

class ReplyForm extends Component
{
    protected $listeners = ['refresh' => '$refresh'];
    public $review, $content, $state = false;

    public function mount(Review $review)
    {
        $this->review = $review;
    }

    public function render()
    {
        return view('livewire.reply-form');
    }

    public function saveReply()
    {
        $this->validate([
            'content' => 'required|string',
        ]);
        $newReply = Reply::create([
            'review_id' => $this->review->id,
            'content' => $this->content,
        ]);
        if ($newReply) {
            $this->content = '';
            $this->state = !$this->state;
            Notification::make()
                ->title('Reply Submitted')
                // ->body('We have received your reply successfully.')
                ->success()
                ->send();
        }
    }

    public function showReplyForm()
    {
        $this->state = !$this->state;
    }
}
