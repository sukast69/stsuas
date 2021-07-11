@extends('layout.master')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Yi</th>
                                            <th>Frekuensi</th>
                                            <th>Fkum</th>
                                            <th>Zi</th>
                                            <th>F(Zi)</th>
                                            <th>S(Zi)</th>
                                            <th>|F(Zi)-S(Zi)|</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $banyakData; $i++)

                                            <tr>
                                                <th> {{ $i + 1 }}</th>
                                                <td> {{ $frekuensi[0][$i]->skor }}</td>
                                                <td> {{ $frekuensi[0][$i]->frekuensi }}</td>
                                                <td> {{ $fkum2[$i] }}</td>
                                                <td> {{ $Zi[$i] }}</td>
                                                <td> {{ $fZi[$i] }}</td>
                                                <td> {{ $sZi[$i] }}</td>
                                                <td> {{ $lilliefors[$i] }}</td>
                                            </tr>
                                        @endfor
                                        <tr class="text-bold">
                                            <td>Total:</td>
                                            <td></td>
                                            <td>{{ $n }}</td>
                                            <td>{{ $n }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> {{ $totalLillie }}</td>
                                        </tr>
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
