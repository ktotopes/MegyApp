<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(QuestionRequest $request)
    {
        $question = Question::create([
            ...$request->validated(),
        ]);

        return response()->json([
            'message' => 'Question created successfully.',
            'question' => $question
        ]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }
}
