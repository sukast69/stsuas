@extends('layout.master')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rentangan</th>
                                            <th>Frekuensi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $kelas; $i++)
                                            <tr>
                                                <th scope="row"> {{ $i + 1 }} </th>
                                                <td> {{ $data[$i] }}</td>
                                                <td> {{ $frekuensi[$i] }} </td>
                                            <tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-hover">
                                    <form method="post" action="/" id="forminput">
                                        <div class="form-group">
                                            <tbody>
                                                <tr>
                                                    <td scope="col"> <b>Total Skor:</b> </td>
                                                    <td> {{ $totalskor }}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col"> <b>Skor Maksimal:</b> </td>
                                                    <td> {{ $max }}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col"> <b>Skor Minimal:</b> </td>
                                                    <td> {{ $min }}</td>
                                                </tr>
                                                <td scope="col"> <b>Rata-Rata:</b> </td>
                                                <td> {{ $rata2 }}</td>
                                                </tr>
                                            </tbody>

                                        </div>

                                    </form>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
