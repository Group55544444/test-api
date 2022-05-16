<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \App\Http\Requests\StudentStoreRequest;

class StudentController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {

        $isStudent = Student::query()->where('email', $request->json('email'))->get();
        if (!$isStudent->isEmpty()) {
            Log::info(__LINE__);
            return response()->json(['message' => 'Контакт уже существует', 'code' => 404], 404);
        }

        $created_student = Student::create($request->validated());

        if ($created_student) {

            return $created_student;
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

        $student = Student::query()->where('id', $id)->with(['schoolClass', 'listenedLecture'])->first();


        return $student;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentId)
    {


        $student = Student::query()->find($studentId);

        if (!$student) {
            return response()->json(['message' => 'Нет такого студента', 'code' => 404], 404);

        }
        $student->update($request->all());
        return $student;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request  $studentId)
    {
        $student = Student::query()->find($studentId);
        if (!$student) {
            return response()->json(['message' => 'Нет такого студента', 'code' => 404], 404);

        }
        $student->delete();
        return $student;

    }


}
