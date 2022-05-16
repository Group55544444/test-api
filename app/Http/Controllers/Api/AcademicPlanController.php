<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcademicPlan;
use Illuminate\Http\Request;
use App\Models\SchoolClass;
use \App\Http\Requests\AcademicPlanStoreRequest;

class AcademicPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcademicPlanStoreRequest $request)
    {

        $created_AcademicPlan = AcademicPlan::create($request->all());
        if ($created_AcademicPlan) {
            return $created_AcademicPlan;
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
        return AcademicPlan::query()->where('id', $id)->with('schoolClass')->firstOr();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $AcademicPlanId)
    {
        $AcademicPlan = AcademicPlan::query()->find($AcademicPlanId);
        if (!$AcademicPlan) {
            return response()->json(['message' => 'Нет такого учебного плана', 'code' => 404], 404);

        }
        $AcademicPlan->update($request->all());
        return $AcademicPlan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
