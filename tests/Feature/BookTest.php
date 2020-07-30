<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $books = factory(Book::class,2)->create();

        $response = $this->getJson(route('books.index'));
        $response->assertOk()->assertJsonCount(2);
    }

    public function test_store()
    {
        $data = [
            'name' => 'test book',
        ];

        $response = $this->postJson('/api/books', $data);
        $response->assertStatus(201)->assertJson($data);

        $this->assertDatabaseHas('books', $data);
    }

    public function test_show()
    {
        $data = [
            'name' => 'test book',
        ];
        $book = factory(Book::class)->create($data);

        $response = $this->getJson(route('books.show', ['id' => $book->id]));
        $response->assertOk()->assertJson($data);
    }

    public function test_update()
    {
        $data = [
            'name' => 'test book',
        ];
        $book = factory(Book::class)->create($data);
        $this->assertDatabaseHas('books', $data);

        $updated_data = [
            'name' => 'update name',
        ];

        $response = $this->patchJson(route('books.update', [
            'id' => $book->id,
            'name' => 'update name',
        ]));
        $response->assertOk()->assertJson($updated_data);
        $this->assertDatabaseHas('books', $updated_data);
    }

    public function test_destroy()
    {
        $book = factory(Book::class)->create();

        $response= $this->deleteJson(route('books.destory', $book->id));
        $response->assertOk();

        $this->assertDeleted($book);
    }
}
