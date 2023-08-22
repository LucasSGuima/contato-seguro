<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public function record(Request $request)
    {
        $deleted = $request->input('deleted', null);
        $type = $request->input('type', null);
        $orderBy = $request->input('order_by', null);
        $offset = $request->input('offset', null);
        $limit = $request->input('limit', null);

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:duvida,problema,sugestao',
            'message' => 'required|string',
            'is_identified' => 'required|boolean',
            'whistleblower_name' => 'nullable|string',
            'whistleblower_birth' => 'nullable|date',
            'created_at' => 'required|date',
            'deleted' => 'required|boolean',
        ]);

        $data['id'] = uniqid();

        $registro = DB::table('registros')->insert($data);

        return response()->json(['message' => 'Registro criado com sucesso'], 201);
    }

    public function show($id)
    {
        $registro = DB::table('registros')
                        ->where('id', $id)
                        ->first();

        if ($registro) {
            return response()->json($registro);
        } else {
            return response()->json(['message' => 'Registro não encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'type' => 'in:duvida,problema,sugestao',
            'message' => 'string',
            'is_identified' => 'boolean',
            'whistleblower_name' => 'nullable|string',
            'whistleblower_birth' => 'nullable|date',
            'created_at' => 'date',
            'deleted' => 'boolean',
        ]);

        DB::table('registros')->where('id', $id)->update($data);
        return response()->json(['message' => 'Registro atualizado com sucesso']);
    }

    public function destroy($id)
    {
        DB::table('registros')->where('id', $id)->delete();
        return response()->json(['message' => 'Registro removido com sucesso']);
    }

}
