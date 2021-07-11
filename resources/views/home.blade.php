@extends('layout.master')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table  table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">
                                                    {{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}
                                                </th>
                                                <td>{{ $user->skor }}</td>
                                                <td>
                                                    <form name="delete" action="/delete/{{ $user->id }}" method="POST">
                                                        <a href='/edit/{{ $user->id }}' class="btn btn-warning btn-sm ">
                                                            <i class="fas fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm "> <i
                                                                class="far fa-trash-alt "></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4 col-12 d-flex justify-content-center">
                                    {{ $users->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <form method="post" action="/" id="forminput">
                                        <div class="form-group">
                                            <label for="input2">Skor</label>
                                            <input type="number" class="form-control mb-2" placeholder="Masukkan Skor"
                                                name="skor" value="{{ old('skor') }}">

                                            @if ($errors->has('skor'))
                                                <div class="alert alert-danger">{{ $errors->first('skor') }}</div>
                                            @endif

                                            @if ($errors->has('file'))
                                                <div class="alert alert-danger">{{ $errors->first('file') }}</div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger">{{ session('error') }} </div>
                                            @endif

                                            <input type="submit" class="btn btn-primary btn-sm mt-2 mr-3 " name="submit"
                                                value="Input">

                                            @csrf

                                            @if (session('status'))
                                                <p></p>
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                    <div class="form-group">
                                        <a href="/export" class="btn btn-danger mt-2  mr-3 btn-sm"> <i
                                                class="fas fa-file-download ml-2 mr-2"></i> Export</a>
                                        <a href="#" class="btn btn-success mt-2 btn-sm" data-toggle="modal"
                                            data-target="#exampleModal"> <i class="fas fa-file-import mr-2"></i>Import<a>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> <i
                                                                        class="fas fa-info-circle mr-2"> </i> Import File
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/import" method="POST"
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table  table-hover">
                                    <thead>
                                        <tr>
                                            <th>Skor</th>
                                            <th>Frekuensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($frekuensi as $skor)

                                            <tr>
                                                <td> {{ $skor->skor }} </td>
                                                <td> {{ $skor->frekuensi }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td scope="col"> <b>Total Frekuensi:</b> </td>
                                            <td> {{ $totalfrekuensi }}</td>
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
