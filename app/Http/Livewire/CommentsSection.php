<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Post;

class CommentsSection extends Component
{
    public $post;
    public $comment;
    public $successMessage;

    /** @var string[]
     * using the $rules method allows us to automatically apply validation to any method.
     * Apply these rules using the $this->validate() method.
     */
    protected $rules = [
        'comment' => 'required|min:4',
        'post' => 'required',
    ];

    public function postComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'username' => 'Guest',
            'content' => $this->request->comment,
        ]);

        $this->successMessage = 'Comment was posted!';
    }

    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function render()
    {
        return view('livewire.comments-section');
    }
}
