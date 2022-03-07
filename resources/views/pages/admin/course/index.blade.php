@extends('layouts.admin.app')
@section('pageName', 'MOI')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="courser_table">
                        <thead>
                            <tr>
                                <td></td>
                                <td>id_majors</td>
                                <td>ten khao hoc</td>
                                <td>tg bd</td>
                                <td>tg kt</td>
                                <td>action</td>
                            </tr>
                        </thead>
                    </table>
                </div>1
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(function() {
                console.log($);
                let table = $('#courser_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('course_get_datatables') !!}',
                    columns: [
                        { data: 'DT_RowIndex'},
                        { data: 'ID_majors', name: 'ID_majors' },
                        { data: 'Ten_Khoa_Hoc', name: 'Ten_Khoa_Hoc' },
                        { data: 'Tg_Bd', name: 'Tg_Bd' },
                        { data: 'Tg_Kt', name: 'Tg_Kt' },
                        { data: 'action', name: 'action' },    
                    ]
                });
            });
        </script>
    @endpush
@endsection