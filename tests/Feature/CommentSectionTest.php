<?php

namespace Tests\Feature;

use App\Http\Livewire\CommentsSection;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CommentSectionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function main_page_contains_posts()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        $this->get('/')->assertSee('My first post');
    }

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

    /**
     * @test
     */
    public function valid_comment_can_be_posted()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here',
        ]);

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->set('comment', 'This is my comment')
            ->call('postComment')
            ->assertSee('Comment was posted')
            ->assertSee('This is my comment');
    }
}
