<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Http\Requests\RecordStoreRequest;
use App\Http\Requests\RecordUpdateRequest;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public function record(RecordRequest $request)
    {
        $deleted = $request->validated('deleted');
        $type = $request->validated('type');
        $orderBy = $request->validated('order_by');
        $offset = $request->validated('offset');
        $limit = $request->validated('limit');

        $query = DB::table('registros');

        if ($deleted !== null) {
            $query->where('deleted', $deleted);
        }

        if ($type !== null) {
            $query->where('type', $type);
        }

        if ($orderBy !== null) {
            $query->orderBy($orderBy);
        }

        if ($limit !== null) {
            $query->limit($limit);

            if ($offset !== null) {
                $query->offset($offset);
            }
        }

        $registros = $query->get();

        return response()->json($registros);
    }

    public function store(RecordStoreRequest $request)
    {
        $input = $request->validated();
        Record::create($input);
        return response()->json(['message' => 'Registro criado com sucesso'], 201);
    }

    public function show(Record $record)
    {
        if ($record) {
            return response()->json($record);
        } else {
            return response()->json(['message' => 'Registro não encontrado'], 404);
        }
    }

    public function update(RecordUpdateRequest $request, Record $record)
    {
        $input = $request->validated();
        $record->fill($input);
        $record->save();

        return response()->json(['message' => 'Registro atualizado com sucesso']);
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return response()->json(['message' => 'Registro removido com sucesso']);
    }
}
