<?php

use App\Models\Tag;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('creates a tag', function () {
    $this->actingAs($this->user)
        ->post(route('tags.store'), ['name' => 'Fresh'])
        ->assertRedirect(route('tags.index'));

    $this->assertDatabaseHas('tags', ['name' => 'Fresh']);
});

it('updates a tag', function () {
    $tag = Tag::factory()->create(['name' => 'Old']);

    $this->actingAs($this->user)
        ->put(route('tags.update', $tag), ['name' => 'New'])
        ->assertRedirect(route('tags.index'));

    $this->assertDatabaseHas('tags', ['id' => $tag->id, 'name' => 'New']);
});

it('deletes a tag', function () {
    $tag = Tag::factory()->create();

    $this->actingAs($this->user)
        ->delete(route('tags.destroy', $tag))
        ->assertRedirect(route('tags.index'));

    $this->assertDatabaseMissing('tags', ['id' => $tag->id]);
});
