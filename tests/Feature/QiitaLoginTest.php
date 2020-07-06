<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Auth;
use Socialite;
use Mockery;

class QiitaLoginTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Mockery::getConfiguration()->allowMockingNonExistentMethods(false);

        // モックを作成
        $this->user = Mockery::mock('Laravel\Socialite\Two\User');
        $this->user->shouldReceive('getId')
                    ->andReturn(uniqid())
                    ->shouldReceive('getName')
                    ->andReturn('Pseudo');

        $this->provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $this->provider->shouldReceive('user')->andReturn($this->user);
    }

    public static function tearDownAfterClass(): void
    {
        // Mockeryの設定をもとに戻す
        Mockery::getConfiguration()->allowMockingNonExistentMethods(true);
    }

    /**
     * @test
     */
    public function Qiitaの認証画面を表示できる()
    {
        $response = $this->get(route('qiitaLogin'));
        $response->assertStatus(302);

        $target = parse_url($response->headers->get('location'));
        // リダイレクト先のドメインの検証
        $this->assertEquals('qiita.com', $target['host']);

        // パラメータの検証
        $query = explode('&', $target['query']);
        $this->assertContains('redirect_uri='.urlencode(config('services.qiita.redirect')), $query);
        $this->assertContains('client_id='.config('services.qiita.client_id'), $query);
    }

    /**
     * @test
     */
    public function Qiitaアカウントでユーザー登録できる()
    {
        Socialite::shouldReceive('driver')->andReturn($this->provider);

        // $response = $this->get(route('qiitaCallback'));
        // $response->assertStatus(201)->assertJson(['name' => $this->user->getName()]);

        $this->get(route('qiitaCallback'))->assertStatus(302)->assertRedirect('/home');

        $this->assertDatabaseHas('users', [
            'provider_id' => $this->user->getId(),
            'provider_name' => 'qiita',
            'name' => $this->user->getName()
        ]);
        $this->assertAuthenticated();
    }
}
