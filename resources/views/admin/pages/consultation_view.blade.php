@extends('admin.layouts.default')
@section('title', 'Order_Consutations')
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
    </style>

    <div class="pagetitle">
        <h1>Order Consultations</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Order Consultations<< /li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header mt-3" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                    </div>
                    <div class="card-body">
                        <table id="tbl_data" class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">Question_id</th>
                                    <th>Title</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                    <td class=" fw-bold text-center" style="vertical-align: middle; text-align: center; background-color:aquamarine !important; "> Costumer Body Profile </td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>#3434</td>
                                    <td class=" fw-bold text-center" style="vertical-align: middle; text-align: center;"> Costumer Gender </td>
                                    <td>{{ $body_profile['gender']}} </td>
                                </tr>
                                <tr>
                                    <td>#3434</td>
                                    <td class=" fw-bold text-center" style="vertical-align: middle; text-align: center;"> Costumer Age </td>
                                    <td>{{ $body_profile['age']}} </td>
                                </tr>
                                <tr>
                                    <td>#3434</td>
                                    <td class=" fw-bold text-center" style="vertical-align: middle; text-align: center;"> Costumer DOB </td>
                                    <td>{{ $body_profile->user->dob}} </td>
                                </tr>
                                <tr>
                                    <td>#3434</td>
                                    <td class=" fw-bold text-center" style="vertical-align: middle; text-align: center;"> Costumer BMI's </td>
                                    <td>{{ $body_profile['bmi']}} </td>
                                </tr>

                                <tr>
                                    <td> </td>
                                    <td class=" fw-bold text-center" style="vertical-align: middle; text-align: center; background-color:aquamarine !important; "> Product Constulation </td>
                                    <td> </td>
                                </tr>
                                @foreach($prodcut_consult as $key => $val)
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">#3434{{$val['id']}}</td>
                                    <td>{{$val['title']}}</td>
                                    <td>
                                        @if (Str::startsWith($val['answer'], 'consultation/product/'))
                                        <a class="fw-bold btn-link" href="{{ asset('storage/'.$val['answer']) }}" download>See File</a>
                                        @else
                                        <p>{{ $val['answer'] }}</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td> </td>
                                    <td class=" fw-bold text-center" style="vertical-align: middle; text-align: center; background-color:aquamarine !important; "> User Constulation </td>
                                    <td> </td>
                                </tr>
                                @foreach($user_consult as $ind => $value)
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">#3434{{$value['id']}}</td>
                                    <td>{{$value['title']}}</td>
                                    <td>
                                        @if (Str::startsWith($value['answer'], 'consultation/product/'))
                                        <a class="fw-bold btn-link" href="{{ asset('storage/'.$value['answer']) }}" download>See File</a>
                                        @else
                                        <p>{{ $value['answer'] }}</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card mt-4">
                            <div class="card-body d-flex justify-content-center align-items-center py-3">
                                <button class="btn btn-success rounded-pill px-5 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#doctor_remarks">
                                    <i class="bi bi-arrow-right-circle"></i> Proceed Next
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->
<div class="modal fade" id="doctor_remarks" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title fw-bold text-white">HealthCare Professional Feedback</h5>
                <button type="button" class="btn-close fw-bold text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_hcp_remarks"  class="row g-3 mt-1 needs-validation"  novalidate action="{{route('admin.changeStatus')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" required  value="{{$order['id']}}">
                    <div class="col-12">
                        <label for="status" class="form-label fw-bold">Order Status :</label>
                        <select id="status" name="status" class="form-select" required >
                            <option value="" selected>Choose...</option>
                            <option value="Approved">Approved</option>
                            <option value="Not_Approved">Not Approved</option>
                        </select>
                        <div class="invalid-feedback">Please select status!</div>
                    </div>

                    <div class="col-12">
                        <label for="hcp_remarks" class="form-label fw-bold">Health Care Professional Notes: </label>
                        <textarea name="hcp_remarks" class="form-control" id="hcp_remarks" rows="4" placeholder="write here..." required ></textarea>
                        <div class="invalid-feedback">Please write Notes!</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button form="form_hcp_remarks" type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop

@pushOnce('scripts')
<script>
    $(function() {
        $("#tbl_data").DataTable({
            "paging": false,
            "responsive": false,
            "lengthChange": false,
            "autoWidth": true,
            "searching": true,
            "ordering": false,
            "info": false,
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
        }).buttons().container().appendTo('#tbl_buttons');
    });
</script>
@endPushOnce