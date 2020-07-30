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

        $response = $this->get('/api/books');
        $response->assertOk()->assertJsonCount(2);
    }

    public function test_store()
    {
        $data = [
            'name' => 'test book',
        ];

        $response = $this->post('/api/books/store', $data);
        $response->assertStatus(201)->assertJson($data);

        $this->assertDatabaseHas('books', $data);
    }

    public function test_show()
    {
        $book = factory(Book::class)->create([
            'name' => 'test book',
        ]);

        $response = $this->get(route('books.show', ['id' => $book->id]));
        $response->assertOk()->assertJson([
            'name' => 'test book'
        ]);
    }

    public function test_update()
    {
        $book = factory(Book::class)->create([
            'name' => 'test book',
        ]);
        $this->assertDatabaseHas('books', ['name' => 'test book']);

        $response = $this->post(route('books.update', [
            'id' => $book->id,
            'name' => 'update name',
        ]));
        $response->assertOk()->assertJson(['name' => 'update name']);
        $this->assertDatabaseHas('books', ['name' => 'update name']);
    }

    public function test_destroy()
    {
        $book = factory(Book::class)->create();

        $response= $this->post(route('books.destory', $book->id));
        $response->assertOk();

        $this->assertDeleted($book);
    }
}
