<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    private array $courses;

    public function __construct(){
        $this->courses = [
            [
            'id' => 1,
            'title' => 'Elso pelda title',
            'description' => 'Elso pelda description',
            'author' => 'Author egy',
            'url' => 'http://courseegy.hu',
            ],
            [
            'id' => 2,
            'title' => 'Masodik pelda title',
            'description' => 'Masodik pelda description',
            'author' => 'Author ketto',
            'url' => 'http://courseketto.hu',
            ],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Course::all(), Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            Course::find($id), Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
