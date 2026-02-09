<?php

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

it('shows only posts with the given tag', function () {
    $tag = Tag::factory()->create(['name' => 'laravel']);

    $taggedPost = Post::factory()->for(User::factory())->create(['title' => 'Tagged Post']);
    $untaggedPost = Post::factory()->for(User::factory())->create(['title' => 'Other Post']);

    $taggedPost->tags()->attach($tag);

    $this->get(route('tag', $tag))
        ->assertOk()
        ->assertSee('Tagged Post')
        ->assertDontSee('Other Post');
});
