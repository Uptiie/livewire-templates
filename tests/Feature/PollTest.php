<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PollTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function post_page_contains_comments_livewire_component()
    {
        $post = Post::create([
            'title' => 'My Second Post',
            'content' => 'Content here',
        ]);

        $this->get(route('post.show', $post))->assertSeeLivewire('comments-section');
    }
}
