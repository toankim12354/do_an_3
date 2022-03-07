<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Requests\TeacherStore;
use App\Http\Requests\TeacherUpdate;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.teachers.index'); 
    }
    public function getDataTables1(Request $request)
    {
        // dd($request);
        return DataTables::of(teacher::all())
            ->addIndexColumn()
            ->addColumn('action', function($teacher) {
                return '
                    <div class="btn-group">
                        <a class="btn btn-primary" href="' . route('teacher-manager.edit', $teacher). '">
                            EDIT
                        </a>
                        <form method="post" action="' .route('teacher-manager.destroy',$teacher). '">
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
        //
        return view('pages.admin.teachers.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherStore $request)
    {
        //
        $validated = $request->validated();
         $validated['password'] = Hash::make($validated['password']);
         try {
            Teacher::create($validated);
            
             return redirect()->route('Teacher-manager.index')->with('error', 'tao thanh cong');;
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
    public function edit(Teacher $teacher_manager)
    {
        return view('pages.admin.teachers.edit')->with('teacher_manager', $teacher_manager);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdate $request , Teacher $teacher_manager )
    {
        $validated = $request->validated();
       
        try {
        
            $teacher_manager->update($validated);
        
       } catch (\Exception $e) {
        
           return redirect()->back()->with('error', $e->getMessage());
       }
       return redirect()->route('teacher-manager.index')->with('error', 'tao thanh cong');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher_manager )
    {
        //
        $teacher_manager->delete();
        return redirect()->route('teacher-manager.index')->with('error', 'tao thanh cong');
    }
}
