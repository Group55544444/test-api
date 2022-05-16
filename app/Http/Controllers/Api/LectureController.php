<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\ListenedClass;
use Illuminate\Http\Request;
use \App\Http\Requests\LectureStoreRequest;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lecture::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectureStoreRequest $request)
    {
        $isLecture = Lecture::query()->where('description', $request->json('description'))->get();
        if (!$isLecture->isEmpty()) {
            return response()->json(['message' => 'Лекция уже существует', 'code' => 404], 404);
        }
        $created_lecture = Lecture::create($request->validated());
        if ($created_lecture) {
            return $created_lecture;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Lecture = Lecture::query()->where('id', $id)->with('listenedClass')->first();

        return $Lecture;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lectureId)
    {
        $lecture = Lecture::query()->find($lectureId);
        if (!$lecture) {
            return response()->json(['message' => 'Нет такой лекции', 'code' => 404], 404);

        }
        $lecture->update($request->all());
        return $lecture;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $lectureId)
    {
        $lecture = Lecture::query()->find($lectureId);
        if (!$lecture) {
            return response()->json(['message' => 'Нет такой лекции', 'code' => 404], 404);

        }
        $lecture->delete();
        return $lecture;
    }
}
