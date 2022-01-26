@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Список аудиофайлов для медитации
                        </h4>
                        <a href="{{ route('admin.music.add') }}" class="btn btn-success">Добавить аудиофайл</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Русское название
                                    </th>
                                    <th>
                                        Английское название
                                    </th>
                                    <th>
                                        Дата загрузки
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($music as $sound)
                                    <tr>
                                        <td>
                                            {{ $sound->ru_name }}
                                        </td>
                                        <td>
                                            {{ $sound->en_name }}
                                        </td>
                                        <td>
                                            {{ $sound->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $music->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
