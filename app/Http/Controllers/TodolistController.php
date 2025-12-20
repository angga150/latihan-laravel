<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Exception;

class TodolistController extends Controller
{
    public function index()
    {
        $todolists = Todolist::latest()->get(['id', 'title', 'description', 'is_completed']);
        return response()->json([
            'status' => 'success',
            'todolists' => $todolists,
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'is_completed' => 'required|in:0,1',
        ]);

        try {
            $todolist = Todolist::create($validatedData);

            return response()->json([
                'status' => 'success',
                'todolist' => $todolist,
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create todolist',
            ], 500);
        }
    }   

    public function show(string $id)
    {
        $todolist = Todolist::find($id);

        if (!$todolist) {
            return response()->json([
                'status' => 'error',
                'message' => 'Todolist not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'todolist' => $todolist->only(['id', 'title', 'description', 'is_completed']),
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|min:3|max:255',
            'description' => 'sometimes|required|min:3|max:255',
            'is_completed' => 'sometimes|required|in:0,1',
        ]);
        
        $todolist = Todolist::find($id);
        if (!$todolist) {
            return response()->json([
                'status' => 'error',
                'message' => 'Todolist not found',
            ], 404);
        }

        try {
            $todolist->update($validatedData);

            return response()->json([
                'status' => 'success',
                'todolist' => $todolist,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update todolist',
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        $todolist = Todolist::find($id);

        if (!$todolist) {
            return response()->json([
                'status' => 'error',
                'message' => 'Todolist not found',
            ], 404);
        }

        try {
            $todolist->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Todolist deleted successfully',
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete todolist',
            ], 500);
        }
    }
}
