@extends('layout.master')

@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <form method="POST" action="/edit/{{ $anggota->id }} id="forminput">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="input2">Skor</label>
                                            <input type="text" class="form-control mb-2" value="{{ $anggota->skor }}"
                                                id="skor" placeholder="Skor" name="skor">

                                            @if ($errors->has('skor'))
                                                <div class="alert alert-danger">{{ $errors->first('skor') }}</div>
                                            @endif

                                            <a href='/' class="btn btn-sm btn-danger">Cancel</a>

                                            <input type="submit" class="btn btn-sm btn-success ml-auto floa-right"
                                                name="submit" value="Edit">
                                        </div>
                                    </form>
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
