<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QiitaLoginTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->providerName = 'qiita';
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
        $this->get(route('qiitaCallback'))->assertStatus(302);
    }
}
