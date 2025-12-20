<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = [
            
                ['id' => 1, 'text' => 'This is the first comment.'],
                ['id' => 2, 'text' => 'This is the second comment.'],

        ];

        return response()->json([
            'status' => 'success',
            'comments' => $data,
        ], 200);
    }

}
