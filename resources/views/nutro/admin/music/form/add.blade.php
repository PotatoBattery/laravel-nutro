@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Добавление нового аудиофайла
                        </h4>
                    </div>
                    <form action="{{route('admin.music.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="custom-file mb-3">
                                <input type="file" name="file" id="uploadFile" class="custom-file-input @error('file') is-invalid @enderror">
                                <label for="uploadFile" class="custom-file-label">Select file</label>
                            </div>
                            @error('file')
                                <div class="alert alert-danger" style="text-align: center; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <input type="text" class="form-control @error('ruName') is-invalid @enderror" name="ruName" placeholder="Укажите название аудифайла на русском языке">
                            </div>
                            @error('ruName')
                                <div class="alert alert-danger " style="text-align: center; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <input type="text" class="form-control @error('enName') is-invalid @enderror" name="enName" placeholder="Укажите название файла на английском языке">
                            </div>
                            @error('enName')
                                <div class="alert alert-danger" style="text-align: center; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
