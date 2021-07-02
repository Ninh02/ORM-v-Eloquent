<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="col-12">
    <h1>Danh Sách Khách Hàng</h1>
</div>
<a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#cityModal">
    Lọc
</a>
<div class="col-6">

    <form class="navbar-form navbar-left" action="{{route('customers.search')}}" method="get">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="keyword">
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>

<table class="table table-success table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Birthday</th>
        <th scope="col">Address</th>
        <th scope="col">Email</th>
        <th scope="col">City_id</th>
        <th scope="col">Phone</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>


    @foreach($customers as $key => $customer)
    <tr>
        <th scope="row">{{++$key}}</th>
        <td>{{$customer->name}}</td>
        <td>{{$customer->birthday}}</td>
        <td>{{$customer->address}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->city_id}}</td>
        <td>{{$customer->phone}}</td>
        <td><a href="{{route('customers.edit',$customer->id)}}" class="btn btn-outline-primary">edit</a></td>
        <td><a href="{{route('customers.delete',$customer->id)}}" class="btn btn-outline-primary">Delete</a></td>
    </tr>
    @endforeach
    </tbody>
    <div class="modal fade" id="cityModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form action="{{ route('customers.filterByCity') }}" method="get">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Lọc theo khóa học -->
                        <div class="select-by-program">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh
                                    thành</label>
                                <div class="col-sm-7">
                                    <select class="custom-select w-100" name="city_id">
                                        <option value="">Chọn tỉnh thành</option>
                                        @foreach($cities as $city)
                                            @if(isset($cityFilter))
                                                @if($city->id == $cityFilter->id)
                                                    <option value="{{$city->id}}"
                                                            selected>{{ $city->name }}</option>
                                                @else
                                                    <option value="{{$city->id}}">{{ $city->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{$city->id}}">{{ $city->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <!--End-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</table>
<button class="btn btn-outline-primary"><a href="{{route('customers.create')}}" >Tao moi</a></button>
{{ $customers->appends(request()->query()) }}

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
