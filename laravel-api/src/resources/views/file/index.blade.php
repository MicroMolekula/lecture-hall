<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Лекции</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Лекции</li>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.file.create') }}" class="btn btn-primary">Добавить</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Путь к файлу</th>
                                    <th>Описание</th>
                                    <th>Тип</th>
                                    <th>Добавил</th>
                                    <th>Дисциплина</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $file->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.file.show', $file->id) }}">{{ $file->title }} </a>
                                        </td>
                                        <td>{{ $file->subject->title }}</td>
                                        <td>
                                            @if($file->file)
                                                @php
                                                    $fileExtension = pathinfo($file->file, PATHINFO_EXTENSION);
                                                @endphp
                                                <a href="{{ asset('storage/' . $file->file) }}">Скачать файл формата {{ $fileExtension }}</a>
                                            @else
                                                <p>Файл отсутствует</p>
                                            @endif
                                        </td>
                                        <td>{{ $file->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

</body>
</html>

