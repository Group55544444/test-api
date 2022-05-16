<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use \App\Http\Requests\SchoolClassStoreRequest;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SchoolClass::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolClassStoreRequest $request)
    {
        $isSchoolClass = SchoolClass::query()->where('name', $request->json('name'))->get();
        if (!$isSchoolClass->isEmpty()) {
            return response()->json(['message' => 'Класс уже существует', 'code' => 404], 404);
        }
        $created_SchoolClass = SchoolClass::create($request->validated());
        if ($created_SchoolClass) {
            return $created_SchoolClass;
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
        return SchoolClass::query()->where('id', $id)->with(['students'])->firstOr();
    }

    public function academicPlan($id)
    {
        $schoolClass = SchoolClass::query()->where('id', $id)->firstOr();
        return $schoolClass->academicPlan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $SchoolClassId)
    {
        $SchoolClass = SchoolClass::query()->find($SchoolClassId);
        if (!$SchoolClass) {
            return response()->json(['message' => 'Нет такого класса', 'code' => 404], 404);

        }
        $SchoolClass->update($request->all());
        return $SchoolClass;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $SchoolClassId)
    {
        $SchoolClass = SchoolClass::query()->find($SchoolClassId);
        if (!$SchoolClass) {
            return response()->json(['message' => 'Нет такого класса', 'code' => 404], 404);

        }
        $SchoolClass->delete();
        return $SchoolClass;
    }


}
