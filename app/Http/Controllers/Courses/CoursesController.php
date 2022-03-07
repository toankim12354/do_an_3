<?php

namespace App\Http\Controllers\Courses;


use App\Models\Major;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStore;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\CourseUpdate;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.admin.course.index');

    }

    public function getDataTables(Request $request)
    {
        // dd($request);
        return DataTables::of(Course::all())
            ->addIndexColumn()
            ->editColumn('ID_majors', function($course) {
                return $course->major->Ten;
            })
            ->addColumn('action', function($course) {
                return '
                    <div class="btn-group">
                        <a class="btn btn-primary" href="' . route('course-manager.edit', $course). '">
                            EDIT
                        </a>
                        <form method="post" action="' .route('course-manager.destroy',$course). '">
                        <input name="_token" type="hidden" value="' . csrf_token(). '"/>
                        <input name="_method" type="hidden" value="delete"/>
                 
                          <button class="btn btn-danger"
                        
                              <i class="fa fa-times text-danger "> REMOVE</i></a>
                          </button>
                    </form>
                       
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $Major = Major::all();
         
        return view('pages.admin.course.create')->with('Major',$Major);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStore $request)
    {
        //
        $validated = $request->validated();
       
        try {
           Course::create($validated);
           
            return redirect()->route('course-manager.index')->with('error', 'tao thanh cong');;
       } catch (\Exception $e) {
           return redirect()->back()->with('error', $e->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $Course_manager)
    {
        //
        $Major = Major::all();
        return view('pages.admin.course.edit',['Major' => $Major])->with('course_manager',$Course_manager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdate $request, Course $Course_manager)
    {
        $validated = $request->validated();
       
        try {
        
            $Course_manager->update($validated);
        
       } catch (\Exception $e) {
        
           return redirect()->back()->with('error', $e->getMessage());
       }
       return redirect()->route('course-manager.index')->with('error', 'tao thanh cong');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $Course_manager)
    {
        //
        $Course_manager->delete();
        return redirect()->route('course-manager.index')->with('error', 'tao thanh cong');
    }
}
