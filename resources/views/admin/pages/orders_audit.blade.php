@extends('admin.layouts.default')
@section('title', 'Orders Audit')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <style>
        .edit i {
            color: #4154F1;
            font-size: 20px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .delete i {
            color: #E34724;
            font-size: 20px;
            margin-left: 10px;
        }

        .card-body table tr {
            background-color: #E34724 !important;
        }

        /* Custom CSS for DataTables buttons */
        .btn-blue {
            background-color: blue !important;
            color: white !important;
            border: none !important;
            border-radius: 5px !important;
            margin-right: 5px;
            font-weight: bold;
        }

        .btn-blue:hover {
            background-color: darkblue !important;
        }

        .table-stripe tbody tr:nth-child(odd) {
            background-color: lightblue;
        }

        .table-stripe tbody tr:nth-child(even) {
            background-color: deepskyblue;
        }

        .select2-selection__rendered {
            line-height: 35px !important;
        }

        .select2-container .select2-selection--single {
            height: 40px !important;
        }

        .select2-selection__arrow {
            height: 40px !important;
        }

        .btn_theme {
            background: #03bd8d;
            border: #03bd8d 1px solid;
        }

        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            visibility: hidden;
        }
    </style>

    <div class="pagetitle">
        <h1><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary-outline fw-bold "><i class="bi bi-arrow-left"></i> Back</a> | Orders Audit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Orders Audit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header mt-3" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;"></div>
                    <div class="row mb-3 px-4">
                        <div class="col-md-3 text-center d-block">
                            <label for="startDate" class="form-label fw-bold">Start Date Time</label>
                            <input type="datetime-local" id="startDate" name="startDate" class="form-control py-2" max="{{date('Y-m-d\TH:i')}}">
                        </div>
                        <div class="col-md-3 text-center d-block">
                            <label for="endDate" class="form-label fw-bold">End Date Time</label>
                            <input type="datetime-local" id="endDate" name="endDate" class="form-control py-2" value="{{date('Y-m-d\TH:i')}}" max="{{date('Y-m-d\TH:i')}}">
                        </div>

                        <div class="col-md-3 d-block">
                            <label for="addresses" class="form-label fw-bold">Filter by Address</label>
                            <select id="addresses" class="form-select select2" data-placeholder="search address...">
                                <option value="All">All</option>
                                @foreach ($filters ?? [] as $key => $filter)
                                <option value="{{$filter['address']}}">{{ $filter['address'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 d-block">
                            <label for="postal_codes" class="form-label fw-bold">Filter by Postal Code</label>
                            <select id="postal_codes" class="form-select select2" data-placeholder="search postal code...">
                                <option value="All">All</option>
                                @foreach ($filters ?? [] as $key => $filter)
                                <option value="{{$filter['postal_code']}}">{{ $filter['postal_code'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mt-3 text-center d-block">
                            <label for="search" class="form-label fw-bold">Search From Table </label>
                            <input type="text" id="search" placeholder="Search here..." class="form-control py-2">
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tbl_data" class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Order No.</th>
                                    <th>Date-Time</th>
                                    <th>Customer Name</th>
                                    <th>Postal Code</th>
                                    <th>Address</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders ?? [] as $key => $val)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <a href="{{ route('admin.orderDetail',['id'=> base64_encode($val['id'])]) }}" class="text-primary mb-0 font-weight-semibold fw-bold" style="font-size: smaller; display:flex; ">
                                            #{{ $val['id'] }}
                                        </a>
                                    </td>
                                    <td>{{ isset($val['created_at']) ? date('Y-m-d h:i A', strtotime($val['created_at'])) : '' }}</td>
                                    <td>{{ $val['shipingdetails']['firstName'] .' '. $val['shipingdetails']['lastName']  ?? $val['user']['name']  }}</td>
                                    <td>{{$val['shipingdetails']['zip_code'] ?? ''}}</td>
                                    <td>{{$val['shipingdetails']['address'] ?? ''}}</td>
                                    <th> <button class="btn btn-success rounded-pill text-center"> {{$val['status'] ?? ''}} </button></th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>
    $(function() {
        $("#tbl_data").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 50,
            "buttons": [{
                    extend: 'pdf',
                    text: 'Download PDF ',
                    className: 'btn-blue',
                },
                {
                    extend: 'print',
                    text: 'Print Out',
                    className: 'btn-blue',
                }
            ],
            "columnDefs": [{
                "targets": 2,
                "type": "date"
            }]
        }).buttons().container().appendTo('#tbl_buttons');

        var table = $('#tbl_data').DataTable();
        $('#startDate, #endDate').change(function() {
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            table.draw();
        });

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#startDate').val();
                var max = $('#endDate').val();
                var date = data[2] || '';
                var startDate = new Date(min);
                var endDate = new Date(max);
                var currentDate = new Date(date);

                if ((min === "" || startDate <= currentDate) &&
                    (max === "" || currentDate <= endDate)) {
                    return true;
                }
                return false;
            }
        );
    });

    $(document).ready(function() {
        var tableApi = $('#tbl_data').DataTable();
        $('#addresses').on('change', function() {
            var category = $(this).val();
            if (category == 'All') {
                tableApi.column(5).search('').draw();
            } else {
                tableApi.column(5).search(category).draw();
            }
        });

        $('#postal_codes').on('change', function() {
            let type = $(this).val();
            if (type == 'All') {
                tableApi.column(4).search('').draw();
            } else {
                tableApi.column(4).search(type).draw();
            }
        });

        $('#search').on('input', function() {
            let text = $(this).val();
            if (text === '') {
                tableApi.search('').draw();
            } else {
                tableApi.search(text).draw();
            }
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            $('#edit_form_id_input').val(id);
            $('#edit_form').submit();
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');
            $('#edit_form_id_input').val(id);
            $('#edit_form').submit();
        });
    });
</script>
@endPushOnce