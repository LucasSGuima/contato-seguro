<?php

namespace Tests\Feature;

use App\Models\Record;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecordControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRecordFunctionWithValidData()
    {
        Record::factory(10)->create();

        $response = $this->get('/api/registros?deleted=0&type=duvida&order_by=id&offset=0&limit=10');

        $response->assertStatus(200);

        foreach ($response->json() as $item) {
            $this->assertEquals(0, $item['deleted']);
            $this->assertEquals('duvida', $item['type']);
        }
    }
}
