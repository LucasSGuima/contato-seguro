<?php

namespace Tests\Feature;

use App\Http\Requests\RecordRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecordControllerExceptionTest extends TestCase
{
    use RefreshDatabase;

    public function testDeletedValidation(): void
    {
        $request = new RecordRequest();
        $validator = $this->app['validator']->make(['deleted' => '2'], $request->rules(), $request->messages());

        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo deleted deve ser 0 ou 1.', $validator->messages()->first('deleted'));
    }

    public function testTypeValidation(): void
    {
        $request = new RecordRequest();
        $validator = $this->app['validator']->make(['type' => 'invalid_type'], $request->rules(), $request->messages());

        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo type deve ser duvida, problema ou sugestao.', $validator->messages()->first('type'));
    }

    public function testOrderByValidation(): void
    {
        $request = new RecordRequest();
        $validator = $this->app['validator']->make(['order_by' => 'invalid_column'], $request->rules(), $request->messages());

        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo order_by deve ter um valor válido (id, type, message, is_identified, whistleblower_name, whistleblower_birth, created_at, deleted).', $validator->messages()->first('order_by'));
    }

    public function testOffsetValidation(): void
    {
        $request = new RecordRequest();
        $validator = $this->app['validator']->make(['offset' => 'invalid_offset'], $request->rules(), $request->messages());

        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo offset deve ser um valor numérico.', $validator->messages()->first('offset'));
    }

    public function testLimitValidation(): void
    {
        $request = new RecordRequest();
        $validator = $this->app['validator']->make(['offset' => 1, 'limit' => 'invalid_limit'], $request->rules(), $request->messages());

        $this->assertTrue($validator->fails());
        $this->assertEquals('O campo limit deve ser um valor numérico.', $validator->messages()->first('limit'));
    }

    public function testLimitRequiredValidation(): void
    {
        $response = $this->getJson('/api/registros?offset=1');

        $response->assertStatus(422);
        $response->assertJson(['message' => 'Se o campo offset estiver preenchido, é necessário também preencher o campo limit.']);
    }
}
