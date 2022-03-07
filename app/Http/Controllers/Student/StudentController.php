<?php

namespace App\Http\Controllers\Student;
use App\Http\Requests\StudenStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lop;

use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Yajra\DataTables\Facades\DataTables;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('pages.admin.students.index');
    }

    public function getDataTables(Request $request)
    {

        return DataTables::of(Student::all())
            ->addIndexColumn()
            ->editColumn('id_lop', function($Student) {
                return $Student->lop->Ten;
            })
            ->addColumn('action', function($student) {
                return '
                    <div class="btn-group">
                        <a class="btn btn-primary" href="' . route('student-manager.edit', $student). '">
                            EDIT
                        </a>
                        <form method="post" action="' .route('student-manager.destroy',$student). '">
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
        $Lop = Lop::all();
        return view('pages.admin.students.create')->with('Lop',$Lop);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudenStore $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        try {
           Student::create($validated);
           
            return redirect()->route('student-manager.index')->with('error', 'tao thanh cong');
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
    public function edit($id)
    {
        //
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
