<?php

namespace Tests\Feature;

use App\Models\Record;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecordControllerSuccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_record_function_with_all_valid_data_types()
    {
        Record::factory(15)->create();

        $response = $this->get('/api/registros?deleted=0&type=duvida&order_by=id&offset=0&limit=10');

        $response->assertStatus(200);

        // Verifica se os retornos foram deleted=0 e type=duvida
        foreach ($response->json() as $item) {
            $this->assertEquals(0, $item['deleted']);
            $this->assertEquals('duvida', $item['type']);
        }

        // Verifica se as ordens do ID estão ascendente
        $previousId = null;
        foreach ($response->json() as $item) {
            if ($previousId !== null) {
                $this->assertTrue($item['id'] > $previousId);
            }
            $previousId = $item['id'];
        }

        $this->assertLessThan(10, count($response->json()));
    }

    public function test_record_function_with_valid_deleted_type()
    {
        Record::factory(15)->create();
        $response = $this->get('/api/registros?deleted=0');
        $response->assertStatus(200);

        // Verifica se os retornos foram deleted=0
        foreach ($response->json() as $item) {
            $this->assertEquals(0, $item['deleted']);
        }
    }

    public function test_record_function_with_valid_type()
    {
        Record::factory(15)->create();
        $response = $this->get('/api/registros?type=sugestao');
        $response->assertStatus(200);

        // Verifica se os retornos foram type=sugestao
        foreach ($response->json() as $item) {
            $this->assertEquals('sugestao', $item['type']);
        }
    }

    public function test_record_function_with_valid_sorting_type()
    {
        Record::factory(15)->create();
        $response = $this->get('/api/registros?order_by=id');
        $response->assertStatus(200);

        // Verifica se as ordens do ID estão ascendente
        $previousId = null;
        foreach ($response->json() as $item) {
            if ($previousId !== null) {
                $this->assertTrue($item['id'] > $previousId);
            }
            $previousId = $item['id'];
        }
    }

    public function test_record_function_with_limit_type_and_valid_offset()
    {
        $response = $this->get('/api/registros?offset=5&limit=10');
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
    }

    public function test_record_creation_function_with_valid_data()
    {
        $data = [
            'type' => 'duvida',
            'message' => 'Teste',
            'is_identified' => 0,
            'whistleblower_name' => null,
            'whistleblower_birth' => null,
            'created_at' => '2021-06-30 18:47:23',
            'deleted' => 1
        ];

        $response = $this->postJson('/api/registros', $data);
        $response->assertStatus(201);
        $response->assertExactJson(['message' => 'Registro criado com sucesso']);
        $this->assertDatabaseHas('registros', $data);
    }

    public function test_function_to_show_record_with_valid_data()
    {
        Record::factory(1)->create();

        $response = $this->getJson('/api/registros/' . 1);
        $response->assertStatus(200);
        $response->assertJsonStructure(['id', 'type', 'message', 'is_identified', 'whistleblower_name', 'whistleblower_birth', 'created_at', 'deleted']);
        $response->assertJsonFragment(['id' => 1]);
    }

    public function test_the_registry_update_function_through_the_patch_method_with_valid_data()
    {
        $record = Record::factory()->create();

        $updatedData = [
            'type' => 'sugestao',
            'message' => 'Novo conteúdo da mensagem',
        ];

        $response = $this->patchJson('/api/registros/' . $record->id, $updatedData);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Registro atualizado com sucesso']);

        $updatedRecord = Record::find($record->id);
        $this->assertEquals('sugestao', $updatedRecord->type);
        $this->assertEquals('Novo conteúdo da mensagem', $updatedRecord->message);
    }

    public function test_the_registry_update_function_through_the_put_method_with_valid_data()
    {
        $record = Record::factory(1)->create();

        $updatedData = [
            'type' => 'sugestao',
            'message' => 'Novo conteúdo da mensagem',
            'is_identified' => 0,
            'whistleblower_name' => 'Novo nome',
            'whistleblower_birth' => '2000-01-01',
            'deleted' => 1,
        ];

        $response = $this->putJson('/api/registros/' . $record[0]['id'], $updatedData);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Registro atualizado com sucesso']);

        $updatedRecord = Record::find($record[0]['id']);
        $this->assertEquals('sugestao', $updatedRecord->type);
        $this->assertEquals('Novo conteúdo da mensagem', $updatedRecord->message);
        $this->assertEquals(0, $updatedRecord->is_identified);
        $this->assertEquals('Novo nome', $updatedRecord->whistleblower_name);
        $this->assertEquals('2000-01-01', $updatedRecord->whistleblower_birth);
        $this->assertEquals(1, $updatedRecord->deleted);
    }

    // Testar a função de excluir o registro através do método delete com dados válidos
    public function test_the_function_of_deleting_the_record_through_the_delete_method_with_valid_data()
    {
        $record = Record::factory(1)->create();

        $response = $this->deleteJson('/api/registros/' . $record[0]['id']);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Registro removido com sucesso']);

        $this->assertDatabaseMissing('registros', ['id' => $record[0]['id']]);
    }
}
