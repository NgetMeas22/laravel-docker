<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $courses = Course::all();
            return response()->json($courses, 200);
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ], 500);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|string|max:200',
            // "price" => 'required|numeric|min:1'
        ]);
        try {
            $course = Course::create([
                'name' => $request->name,
                // 'price'=> $request->price
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Created successfully",
                "course" => $course
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error",
                "message" => $th->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(Request $request, Course $course)
    {
        //
    }

}
