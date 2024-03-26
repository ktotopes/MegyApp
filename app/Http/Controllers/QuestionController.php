<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    public function store(QuestionRequest $request)
    {
        $question = Question::create([
            ...$request->validated(),
        ]);

        return response()->json(new QuestionResource($question), 201);
    }
}
