<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Defendant;
use App\Models\Option;
use App\Models\Option_answer;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:50'],
            'category_id' => ['nullable', 'string', 'max:50'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = $validated['limit'] ?? 10;

        $query = Survey::query();
        if ($category_id = $validated['category_id'] ?? null) {
            if ($category_id == 1) {
                $query->where('path', 'like', "%");
            }
            if ($category_id == 2) {
                $query->where('path', '=', null);
            }
        }

        $surveys = $query->paginate($limit);


        return view('survey.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $text = $request->input('text');
        $checkbox = $request->input('checkbox');
        $radio = $request->input('radio');
        $survey_id = $request->input('id');

        $uri = $request->server('HTTP_REFERER');

        url()->previous();
        dd($request->all());
        // defendants
        $request->user('id');

        Defendant::query()->create([
            'user_id' => $validated['email'],
            'surveys_id' => bcrypt($validated['password']),
        ]);
        //answers
        $query = Answer::query();

        $query->where('path', 'like', "%");
        Answer::query()->create([
            'defendants_id' => $validated['name'],
            'question_id' => $validated['email'],
            'text' => bcrypt($validated['password']),
        ]);
        //options_answers

        Option_answer::query()->create([
            'answes_id' => $validated['name'],
            'options_id' => $validated['email'],
        ]);

        foreach ($text as $key => $item) {
            dd($key, $item[0]);
        }

        Option_answer::query();


        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => [
                'required', 'string', 'max:50', 'email', 'unique:users'
            ],
            'password' => [
                'required', 'string', 'min:7', 'max:50', 'confirmed'
            ],
            'agreement' => ['accepted'],
        ]);


        Survey::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $questions = Question::all()
            ->where('surveys_id', $id);

        $query = Option::all();
        foreach ($questions as $question) {
            $query->where('questions_id', $question->id);
        }

        $options = $query;

        return view('survey.show',
            compact('questions', 'options', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
