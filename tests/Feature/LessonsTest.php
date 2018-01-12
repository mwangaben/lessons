<?php

namespace Tests\Feature;

use App\Lesson;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LessonsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function unauthenticated_users_are_not_allowed_to_create_a_lesson()
    {
        $lesson = make(Lesson::class);
        $this->withExceptionHandling();

        $this->post('lessons', $lesson->toArray())
            ->assertRedirect('/login');
    }

    /** @test **/
    public function it_authorizes_user_can_record_a_lesson()
    {
        $this->signIn();

        $lesson = make(Lesson::class, ['user_id' => auth()->id()]);
        $this->post('lessons', $lesson->toArray());

        $this->assertDatabaseHas('lessons', [
            'user_id' => auth()->id(),
            'title'   => $lesson->title,
            'body'    => $lesson->body,
        ]);

    }

    /** @test **/
    public function title_can_not_be_blank()
    {
        $this->makeLesson(['title' => null])
            ->assertSessionHas('errors');
    }

    /** @test **/
    public function it_body_can_not_be_blank()
    {
        $this->makeLesson(['body' => null])
            ->assertSessionHas('errors');
    }

    /**
     * @param $overrides
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function makeLesson($overrides)
    {
        $this->withExceptionHandling()->signIn();

        $lesson = make(Lesson::class, $overrides);

        return $this->post('lessons', $lesson->toArray());
    }

}
