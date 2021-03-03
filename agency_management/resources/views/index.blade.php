<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách đại lý</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <style>
        .search-path {
            float: right;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <h1 style="text-align: center">Danh sách đại lý phân phối</h1>
    <a class="btn btn-success" href="{{route('create')}}">Thêm mới</a>
    <div class="search-path">
        <form action="{{route('search')}}" method="get">
            @csrf
            <input type="text" name="search" placeholder="Nhập nội dung tìm kiếm">
            <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <table class="table table-bordered">
        <thead style="background-color: skyblue">
        <tr>
            <th style="text-align: center">Mã số đại lý</th>
            <th>Tên đại lý</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Tên người quản lý</th>
            <th>Trạng thái</th>
            <th>Chức năng</th>
        </tr>
        </thead>
        <tbody>
        @foreach($agencies as $agency)
            <tr>
                <td style="text-align: center">{{ $agency->agency_id }}</td>
                <td>{{ $agency->name }}</td>
                <td>{{ $agency->phone }}</td>
                <td>{{ $agency->email }}</td>
                <td>{{ $agency->address }}</td>
                <td>{{ $agency->manager }}</td>
                <td style="text-align: center">{{ $agency->status }}</td>
                <td style="text-align: center">
                    <a class="btn btn-success" href="{{route('edit',$agency->id)}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-success" onclick="return confirm('Do you want to delete this agency?')" href="{{route('delete',$agency->id)}}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
