<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Criar usuário
    public function store(Request $request)
    {
        try {
            // Validação explícita
            $validated = Validator::make($request->all(), User::$rules);

            if ($validated->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validated->errors(),
                ], 422);
            }

            // Criação do usuário
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password, 
                'cpf' => $request->cpf,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Usuário criado com sucesso!',
                'data' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar usuário.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Listar todos os usuários
    public function index()
    {
        try {
            $users = User::all();
            return response()->json([
                'success' => true,
                'data' => $users
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar usuários.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Mostrar usuário específico
    public function show($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuário não encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar usuário.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Atualizar usuário
    public function update(Request $request, $id)
{
    try {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuário não encontrado'
            ], 404);
        }

       
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, 
            'cpf' => $request->cpf,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Usuário atualizado com sucesso!',
            'data' => $user
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erro ao atualizar usuário.',
            'error' => $e->getMessage()
        ], 500);
    }
}


    // Excluir usuário
    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuário não encontrado'
                ], 404);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Usuário excluído com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao excluir usuário.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
