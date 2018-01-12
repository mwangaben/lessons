<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Lesson;
use App\Channel;

class ChannelTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function a_channel_can_be_created_by_a_authorized_user()
    {
        $this->signIn();

        $channel = factory(Channel::class)->make();

        $this->post('/channels', $channel->toArray())->assertStatus(200);

        $this->assertDatabaseHas('channels', ['slug' => $channel->slug]);
    }

    /** @test **/
    public function channel_has_a_lesson()
    {
        $channel = factory(Channel::class)->create();

        $lesson = factory(Lesson::class)->create(['channel_id' => $channel->id]);
        $this->assertTrue($channel->lessons->contains($lesson));

        $this->assertDatabaseHas('lessons', [
            'channel_id' => $channel->id,
            'body' => $lesson->body,
            'title' => $lesson->title
        ]);
    }
}
