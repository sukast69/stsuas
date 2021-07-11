@extends('layout.master')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group">
                                    <a href="/exportmoment" class="btn btn-danger mt-2 mb-2 mr-3 btn-sm"> <i
                                            class="fas fa-file-download mr-2"></i>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-success mt-2 mb-2 btn-sm" data-toggle="modal"
                                        data-target="#korelasiModal"> <i class="fas fa-file-import mr-2"></i>
                                        Import
                                    </a>
                                    <div class="modal fade" id="korelasiModal" tabindex="-1" role="dialog"
                                        aria-labelledby="korelasiModal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        <i class="fas fa-info-circle mr-2"> </i> Import File
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/importmoment" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="file" name="file" required="required">

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Import</button>
                                                            @csrf

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="basic-datatables" class="display table  table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>X</th>
                                                <th>Y</th>
                                                <th>x</th>
                                                <th>y</th>
                                                <th>x^2</th>
                                                <th>y^2</th>
                                                <th>xy</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < $jumlahData; $i++)
                                                <tr>
                                                    <th>{{ $i + 1 }}</th>
                                                    <td>{{ $moments[$i]->x }}</td>
                                                    <td>{{ $moments[$i]->y }}</td>
                                                    <td>{{ $xKecil[$i] }}</td>
                                                    <td>{{ $yKecil[$i] }}</td>
                                                    <td>{{ $xKuadrat[$i] }}</td>
                                                    <td>{{ $yKuadrat[$i] }}</td>
                                                    <td>{{ $xKaliY[$i] }}</td>
                                                </tr>
                                            @endfor
                                            <tr>
                                                <th> Jumlah: </th>
                                                <th> {{ $sumX }}</th>
                                                <th> {{ $sumY }} </th>
                                                <th></th>
                                                <th></th>
                                                <th> {{ $sumXKuadrat }}</th>
                                                <th> {{ $sumYKuadrat }}</th>
                                                <th> {{ $sumXY }}</th>
                                            </tr>
                                            <tr>
                                                <th>Rata-Rata: </th>
                                                <th> {{ number_format($rata2X, 2) }}</th>
                                                <th> {{ number_format($rata2Y, 2) }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table text-left">
                                        <tr>
                                            <td> <b> Nilai Korelasi Point Moment : </b> &nbsp
                                                {{ $korelasimoment }} </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
