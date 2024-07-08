@extends('admin.layouts.default')
@section('title', 'P.Med General Questions')
@section('content')

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
        </style>

        <div class="pagetitle">
            <h1><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary-outline fw-bold "><i
                        class="bi bi-arrow-left"></i> Back</a> | P.Med General Questions</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">P.Med General Questions</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header mt-3" id="tbl_buttons"
                            style="border: 0 !important; border-color: transparent !important;">
                            <button type="button" class="btn btn-primary" id="createQuestionButton" style="color: black;">
                                Create P.Med General Questions
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="tbl_data" class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="vertical-align: middle; text-align: center;">#</th>
                                        {{-- <th style="vertical-align: middle; text-align: center;">Q.Order No</th> --}}
                                        <th style="vertical-align: middle; text-align: center;">Title</th>
                                        <th style="vertical-align: middle; text-align: center;">Answer Type</th>
                                        <th style="vertical-align: middle; text-align: center;">Type</th>

                                        <th style="vertical-align: middle; text-align: center;">Status</th>
                                        <th style="vertical-align: middle; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($questions as $key => $value)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;"> {{ ++$key }}
                                            </td>
                                            <td style="vertical-align: middle; text-align: center; ">
                                                {{ $value['order'] ?? '' }}</td>
                                            <td style="vertical-align: middle; text-align: center; width:30% !important; ">
                                                {{ $value['title'] ?? '' }}</td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ $value['anwser_set'] == 'mt_choice' ? 'Multiple Choice' : ($value['anwser_set'] == 'yes_no' ? 'True/Fasle' : ($value['anwser_set'] == 'openbox' ? 'Input Reply' : '')) }}
                                            </td>
                                            <td style="vertical-align: middle; text-align: center; ">
                                                {{ $value['type'] == 'dependent' ? 'Dependent Q' : 'Not Dependent' }}</td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                <div class="form-check form-switch d-flex justify-content-center ">
                                                    <input class="form-check-input" style="width: 3.3rem; height: 1.3rem;"
                                                        type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                                        checked />
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <a class="edit" style="cursor: pointer;" title="Edit"
                                                    data-id="{{ $value['id'] }}" data-toggle="tooltip">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a class="delete" style="cursor: pointer;" title="Delete"
                                                    data-id="{{ $value['id'] }}" data-toggle="tooltip">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                                <tbody id="sortable">
                                    @foreach ($questions as $key => $value)
                                        <tr data-id="{{ $value['id'] }}"> <!-- Add data-id attribute -->
                                            <td style="vertical-align: middle; text-align: center;">{{ ++$key }}</td>
                                            <td style="vertical-align: middle; text-align: center;" hidden>
                                                {{ $value['order'] ?? '' }}</td>
                                            <td style="vertical-align: middle; text-align: center; width:30% !important;">
                                                {{ $value['title'] ?? '' }}</td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ $value['anwser_set'] == 'mt_choice' ? 'Multiple Choice' : ($value['anwser_set'] == 'yes_no' ? 'True/False' : ($value['anwser_set'] == 'openbox' ? 'Input Reply' : '')) }}
                                            </td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ $value['type'] == 'dependent' ? 'Dependent Q' : 'Not Dependent' }}
                                            </td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <div class="form-check form-switch d-flex justify-content-center">
                                                    <input class="form-check-input" style="width: 3.3rem; height: 1.3rem;"
                                                        type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <a class="edit" style="cursor: pointer;" title="Edit"
                                                    data-id="{{ $value['id'] }}" data-toggle="tooltip">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a class="delete" style="cursor: pointer;" title="Delete"
                                                    data-id="{{ $value['id'] }}" data-toggle="tooltip">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
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
    <form id="edit_form" action="{{ route('Add.P.Med.Questions') }}" method="post">
        @csrf
        <input id="edit_form_id_input" type="hidden" value="" name="id">
    </form>
    <!-- End #main -->
    <form id="delete_form" action="{{ route('Delete.P.Med.Question') }}" method="post">
        @csrf
        <input id="delete_form_id_input" type="hidden" value="" name="id">
    </form>

@stop

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('createQuestionButton').addEventListener('click', function() {
                window.location.href = '{{ route('Add.P.Med.Questions') }}';
            });
        });
    </script>
    <script>
        $(function() {
            $("#tbl_data").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
                "ordering": false,
                "info": true,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                "buttons": [{
                        extend: 'pdf',
                        text: 'Donwload PDF ',
                        className: 'btn-blue',
                    },
                    // {
                    //     extend: 'excel',
                    //     text: 'Donwload Excel ',
                    //     className: 'btn-blue',
                    // },

                    {
                        extend: 'print',
                        text: 'Print Out',
                        className: 'btn-blue',
                    }
                ]
            }).buttons().container();
        });
        $(document).ready(function() {

            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $('#edit_form_id_input').val(id);
                $('#edit_form').submit();
            });

            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                $('#delete_form_id_input').val(id);
                $('#delete_form').submit();
            });
        });


        // Make the table rows sortable
        $("#sortable").sortable({
            update: function(event, ui) {
                var order = $(this).sortable('toArray', {
                    attribute: 'data-id'
                });


                $.ajax({
                    url: '{{ route('Update.Question.Order') }}',
                    method: 'POST',
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Order updated successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating order:', error);
                    }
                });
            }
        }).disableSelection();



    </script>
@endPushOnce
