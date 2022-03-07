<?php

namespace App\Http\Controllers\Majors;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorsStore;
use App\Models\Major;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.admin.majors.index');
    }
    public function getDataTables2(Request $request)
    {
        // dd($request);
        return DataTables::of(Major::all())
            ->addIndexColumn()
            ->addColumn('action', function($majors) {
                return '
                    <div class="btn-group">
                        <a class="btn btn-primary" href="' . route('majors-manager.edit', $majors). '">
                            EDIT
                        </a>
                        <form method="post" action="' .route('majors-manager.destroy',$majors). '">
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
        return view('pages.admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MajorsStore $request)
    {
        $validated = $request->validated();
        try {
            Major::create($validated);
           
             return redirect()->route('majors-manager.index')->with('error', 'tao thanh cong');;
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
    public function edit(Major $majors_manager)
    {
        //
        return view('pages.admin.majors.edit')->with('majors_manager', $majors_manager);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Major $majors_manager)
    {
        $validated = $request->validate([
            'Ten' => 'required',
        ]);
        try {
        
            $majors_manager->update($validated);
        
       } catch (\Exception $e) {
        
           return redirect()->back()->with('error', $e->getMessage());
       }
       return redirect()->route('majors-manager.index')->with('error', ' fix successful');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $majors_manager)
    {
        //
        $majors_manager->delete();
        return redirect()->route('majors-manager.index')->with('error', ' delete successful');

    }
}
