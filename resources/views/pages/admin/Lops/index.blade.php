@extends('layouts.admin.app')
@section('pageName', 'MOI')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="lop_table" style ="width: 500px">
                        <thead>
                            <tr>
                                <td  ></td>
                                <td  >Tên </td>
                                <td>Khoa </td>
                                <td >ACTION</td>
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
                let table = $('#lop_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('lop_get_datatables') !!}',
                    columns: [
                        { data: 'DT_RowIndex'},
                        { data: 'Ten', name: 'Ten' },
                        { data: 'Khoa_id', name: 'Khoa_id' },
                        { data: 'action', name: 'action' },
                    ]
                });
            });
        </script>
    @endpush
@endsection