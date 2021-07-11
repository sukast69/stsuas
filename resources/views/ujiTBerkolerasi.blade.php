@extends('layout.master')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table  table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="w-25">No</th>
                                            <th>X1</th>
                                            <th>X2</th>
                                            <th> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($ujiT as $t)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $t->x1 }}</td>
                                                <td>{{ $t->x2 }}</td>
                                                <td>
                                                    <form name="delete" action="/hapus/{{ $t->id }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"> <i
                                                                class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tr class="text-center">
                                        <th> Rata-Rata: </th>
                                        <th>{{ number_format($rata2x1, 2) }}</th>
                                        <th>{{ number_format($rata2x2, 2) }}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>Varians:</th>
                                        <th>{{ number_format($variansX1, 2) }}</th>
                                        <th>{{ number_format($variansX2, 2) }}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>Standar Deviasi:</th>
                                        <th>{{ $sdX1 }}</th>
                                        <th>{{ $sdX2 }}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>T Hitung: </th>
                                        <th> {{ $nilaiUjiT }}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>T Tabel: </th>
                                        <th> {{ $TTabel }}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>Status H0: </th>
                                        <th> {{ $status }}</th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <form method="post" action="/ujiTBerkolerasi" id="forminput">
                                        <div class="form-group">
                                            <label for="input2">Input X1</label>
                                            <input required type="text" class="form-control mb-2"
                                                placeholder="Masukkan Nilai X1" name="x1" value="{{ old('x1') }}">
                                            <label for="input2">Input X2</label>
                                            <input required type="text" class="form-control mb-2"
                                                placeholder="Masukkan Nilai X2" name="x2" value="{{ old('x2') }}">
                                            @if ($errors->has('x1'))
                                                <div class="alert alert-danger">{{ $errors->first('x1') }}</div>
                                            @endif

                                            @if ($errors->has('x2'))
                                                <div class="alert alert-danger">{{ $errors->first('x2') }}</div>
                                            @endif

                                            <input type="submit" class="btn btn-primary daftar-btn mt-4 btn-sm"
                                                name="submit" value="Input">
                                            @csrf
                                        </div>


                                        @if (session('status'))
                                            <p></p>
                                            <div class="alert alert-success">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                    </form>

                                    <div class="form-group">
                                        <a href="/exportujiT" class="btn btn-danger mt-2  mr-3 btn-sm"> <i
                                                class="fas fa-file-download ml-2 mr-2"></i> Export</a>
                                        <a href="#" class="btn btn-success mt-2 btn-sm" data-toggle="modal"
                                            data-target="#exampleModal"> <i class="fas fa-file-import mr-2"></i>Import<a>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Import File
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/ujiTBerkolerasiImport" method="POST"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="file" name="file" required="required">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm"> Import</button>
                                                                        @csrf

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
