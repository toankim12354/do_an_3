@extends('layouts.admin.app')
@section('pageName', 'MOI')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="student_table">
                        <thead>
                            <tr>
                                <td>ma sv</td>
                                <td>NAME</td>
                                <td>DOB</td>
                                <td>GENDER</td>
                                <td>ADDRESS</td>
                                <td>EMAIL</td>
                                <td>PHONE</td>
                                <td>lop</td>
                                <td>ACTION</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(function() {
                console.log($);
                let table = $('#student_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('student_get_datatables') !!}',
                    columns: [
                        { data: 'DT_RowIndex'},
                        { data: 'code', name: 'code' },
                        { data: 'name', name: 'name' },
                        { data: 'dob', name: 'dob' },
                        { data: 'gender', name: 'gender' },
                        { data: 'address', name: 'address' },
                        { data: 'email', name: 'email' },
                       
                        { data: 'phone', name: 'phone' },
                        { data: 'id_lop', name: 'id_lop' },
                        { data: 'action', name: 'action'}
                    ]
                });
            });
        </script>
    @endpush
@endsection