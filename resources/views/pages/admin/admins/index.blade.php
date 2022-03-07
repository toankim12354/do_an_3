@extends('layouts.admin.app')
@section('pageName', 'MOI')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="admin_table">
                        <thead>
                            <tr>
                                <td></td>
                                <td>NAME</td>
                                <td>DOB</td>
                                <td>GENDER</td>
                                <td>EMAIL</td>
                                <td>ADDRESS</td>
                                <td>PHONE</td>
                                <td>ACTION</td>
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
                let table = $('#admin_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('get_datatables') !!}',
                    columns: [
                        { data: 'DT_RowIndex'},
                        { data: 'name', name: 'id' },
                        { data: 'dob', name: 'dob' },
                        { data: 'gender', name: 'gender' },
                        { data: 'email', name: 'email' },
                        { data: 'address', name: 'address' },
                        { data: 'phone', name: 'phone' },
                        { data: 'action', name: 'action'}
                    ]
                });
            });
        </script>
    @endpush
@endsection