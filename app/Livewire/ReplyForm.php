<?php

namespace App\Livewire;

use App\Models\Reply;
use App\Models\Review;
use Livewire\Component;

class ReplyForm extends Component
{
    protected $listeners = ['refresh' => '$refresh'];
    public $review, $content, $state = false;

    public function mount(Review $review){
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
        Reply::create([
            'review_id' => $this->review->id,
            'content' => $this->content,
        ]);
        $this->content = '';
        $this->state = !$this->state;
    }

    public function showReplyForm(){
        $this->state = !$this->state;
    }
}
