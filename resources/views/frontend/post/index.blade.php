@extends('layouts.frontend')


@section('content')
<link rel="" href="htpps://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<div class="container">
    <div class="row justify-content center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h5 class="card-title">Employee Passport Biodata</h5>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('frontend.post.create') }}" title="Upload Passport"> 
                                <i class="material-icons">+</i> Upload Passport
                            </a>  
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered datatable" id="table_3">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee</th>
                                        <th>Passport Number</th>
                                        <th>Passport Type</th>
                                        <th>Issue Date</th>
                                        <th>Expiry Date</th>
                                        <!-- <th>Passport Photo</th> -->
                                        <!-- <th>Comment</th> -->
                                        <th>Creat At</th>
                                        <th>Update At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $u = 1; @endphp
                                    @foreach($posts as $key => $row)
                                    <tr>
                                        <td>{{$u++}}</td>
                                        <td>{{$row->employee}}</td>
                                        <td>{{$row->passport_num}}</td>
                                        <td>{{$row->passport_type}}</td>
                                        <td>{{$row->issue_date}}</td>
                                        <td>{{$row->expiry_date}}</td>
                                        <!-- <td>
                                            <a href="post/{{ $row->id }}">
                                                 <img src="{{ asset('storage/images/'.$row->image) }}" class="card-img-top img-fluid" width="-10" height="-10">
                                            </a>
                                        </td> -->
                                        <!-- <td>{{$row->comment}}</td> -->
                                        <td class="text-center">{{ date("d F Y", strtotime($row['created_at'])) }}</td>
                                        <td class="text-center">{{date("d F Y", strtotime($row['update_at']))}}</td>
                                        <td>
                                            <a class="btn btn-xs btn-outline-dark" href="{{route('frontend.post.show', $row['id'])}}">View</a> 
                                            <a class="btn btn-xs btn-outline-dark" href="{{route('frontend.post.edit', $row['id'])}}">Edit</a>    
                                            <form action="{{ route('admin.post.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <!-- <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}"> -->
                                            </form>              
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#table_3').DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        text: 'csv',
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'print',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });
    </script>
    @parent
@endsection
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
