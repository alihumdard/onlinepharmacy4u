@extends('admin.layouts.default')
@section('title', 'SOPs Data')
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

        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            visibility: hidden;
        }
    </style>

    <div class="pagetitle">
        <h1><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary-outline fw-bold "><i class="bi bi-arrow-left"></i> Back</a> | Main Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Main Categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header mt-3" id="tbl_button" style="border: 0 !important; border-color: transparent !important;">
                    </div>
                    <div class="card-body">
                        <table id="tbl_data" class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">#</th>
                                    <th style="vertical-align: middle; text-align: center;">Name</th>
                                    <th style="vertical-align: middle; text-align: center;">File URL</th>
                                    <th style="vertical-align: middle; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">1</th>
                                    <td style="vertical-align: middle; text-align: center;">1</td>
                                    <td style="vertical-align: middle; text-align: center; font-weight: bold;">1</td>
                              
                                    <td style="vertical-align: middle; text-align: center;">
                                    <a target="_blank" href="" class="preview" style="cursor: pointer; font-size:larger;" title="Preview" data-id="2752" data-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                                        <a class="edit" style="cursor: pointer;" title="Edit" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="delete" style="cursor: pointer;" title="Delete" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">1</th>
                                    <td style="vertical-align: middle; text-align: center;">1</td>
                                    <td style="vertical-align: middle; text-align: center; font-weight: bold;">1</td>
                               
                                    <td style="vertical-align: middle; text-align: center;">
                                    <a target="_blank" href="" class="preview" style="cursor: pointer; font-size:larger;" title="Preview" data-id="2752" data-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                                        <a class="edit" style="cursor: pointer;" title="Edit" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="delete" style="cursor: pointer;" title="Delete" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">1</th>
                                    <td style="vertical-align: middle; text-align: center;">1</td>
                                    <td style="vertical-align: middle; text-align: center; font-weight: bold;">1</td>
                                
                                    <td style="vertical-align: middle; text-align: center;">
                                    <a target="_blank" href="" class="preview" style="cursor: pointer; font-size:larger;" title="Preview" data-id="2752" data-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                                        <a class="edit" style="cursor: pointer;" title="Edit" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="delete" style="cursor: pointer;" title="Delete" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">1</th>
                                    <td style="vertical-align: middle; text-align: center;">1</td>
                                    <td style="vertical-align: middle; text-align: center; font-weight: bold;">1</td>
                            
                                    <td style="vertical-align: middle; text-align: center;">
                                    <a target="_blank" href="" class="preview" style="cursor: pointer; font-size:larger;" title="Preview" data-id="2752" data-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                                        <a class="edit" style="cursor: pointer;" title="Edit" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="delete" style="cursor: pointer;" title="Delete" data-id="" data-toggle="tooltip">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
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
