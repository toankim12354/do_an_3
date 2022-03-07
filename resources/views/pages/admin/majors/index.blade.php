@extends('layouts.admin.app')
@section('pageName', 'MOI')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="majors_table" style ="width: 500px">
                        <thead>
                            <tr>
                                <td  ></td>
                                <td  >Tên  Chuyên Ngành </td>
                               
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
                let table = $('#majors_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('get_datatables2') !!}',
                    columns: [
                        { data: 'DT_RowIndex'},
                        { data: 'Ten', name: 'id' },
                       
                        
                        { data: 'action', name: 'action'}
                    ]
                });
            });
        </script>
    @endpush
@endsection