<?php

use App\Models\Post;
use App\Models\User;

it('allows an authenticated user to add a comment to a post', function () {
    $author = User::factory()->create();
    $post = Post::factory()->for($author)->create();

    $commenter = User::factory()->create();

    $this->actingAs($commenter)
        ->post(route('comment.store', $post), [
            'body' => 'Great post!'
        ])->assertRedirect();

    $this->assertDatabaseHas('comments', [
        'body' => 'Great post!',
        'user_id' => $commenter->id,
        'post_id' => $post->id,
    ]);
});

it('requires authentication to comment', function () {
    $author = User::factory()->create();
    $post = Post::factory()->for($author)->create();

    $this->post(route('comment.store', $post), [
        'body' => 'Should fail',
    ])->assertRedirect(route('login'));
});

it('validates comment body is required', function () {
    $author = User::factory()->create();
    $post = Post::factory()->for($author)->create();
    $commenter = User::factory()->create();

    $this->actingAs($commenter)
        ->post(route('comment.store', $post), [
            'body' => '',
        ])
        ->assertRedirect()
        ->assertSessionHasErrors('body');
});
