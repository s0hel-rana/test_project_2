@extends('admin.master')
@section('title')
BackEnd
@endsection
@section('content')
<div class="container-fluid px-4">
    {{-- popup start --}}
    <main>
        <div class="sidebar">
            <div class="sidebar-content">
              <div class="sidebar-container">
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/vector-3.webp" alt="sales">
                          <span>Sales</span>
                      </a>
                  </div>
                    <div class="sidebar-row">
                        <a href="">
                            <img src="{{asset('adminAsset')}}/assets/img/vector-4.jpg" alt="service">
                            <span>Service</span>
                        </a>
                    </div>
                    <div class="sidebar-row">
                        <a href="">
                            <img src="{{asset('adminAsset')}}/assets/img/return.jpg" alt="sales return">
                            <span>Sales Return</span>
                        </a>
                    </div>
                    <div class="sidebar-row">
                        <a href="">
                            <img src="{{asset('adminAsset')}}/assets/img/purchase.png" alt="Purchase">
                            <span>Purchase</span>
                        </a>
                    </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/sale-return.png" alt="Purchase Return">
                          <span>Purchase Return</span>
                      </a>
                  </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/product.png" alt="Add Product">
                          <span>Add Product</span>
                      </a>
                  </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/download.png" alt="Expenses">
                          <span>Expenses</span>
                      </a>
                  </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/download.png" alt="Cash Received">
                          <span>Cash Received</span>
                      </a>
                  </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/download.png" alt="Cash Payment">
                          <span>Cash Payment</span>
                      </a>
                  </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/download.png" alt="Cash Statement">
                          <span>Cash Statement</span>
                      </a>
                  </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/download.png" alt="Warranty Claim">
                          <span>Warranty Claim</span>
                      </a>
                  </div>
                  <div class="sidebar-row">
                      <a href="">
                          <img src="{{asset('adminAsset')}}/assets/img/download.png" alt="Inventory">
                          <span>Inventory</span>
                      </a>
                  </div>
              </div>
            </div>
        </div>
          <button id="toggle-sidebar"><i class="fa fa-bars"></i></button>
    </main>
    <script>
        const sidebar = document.querySelector(".sidebar");
        const toggleButton = document.querySelector("#toggle-sidebar");

        toggleButton.addEventListener("click", function() {
        sidebar.classList.toggle("open");
        });
    </script>
    {{-- popup end --}}

    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <div class="" style="margin-left: 28%; margin-bottom: -1%">
            <form action="{{route('admin.index')}}" method="GET">
                <div class="input-group mb-3" style="width: 450px;">
                    <input type="date" class="form-control" name="start_date" style="background: #EAA852;">
                    <input type="date" class="form-control" name="end_date" style="background: #EAA852;">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Category</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('category.index')}}">View Details</a>
                    <div class="small text-white"><span>{{$totalCategory}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Sub-Category</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('sub-category.index')}}">View Details</a>
                    <div class="small text-white"><span>{{$totalSub_Category}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Brand</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('brand.index')}}">View Details</a>
                    <div class="small text-white"><span>{{$totalBrand}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Product</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('product.index')}}">View Details</a>
                    <div class="small text-white"><span>{{$totalProduct}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- javascript -->
{{--aria chart script start--}}

<script type="text/javascript">
    // Area Chart Example
    var _yData = JSON.parse('{!! json_encode($dayName) !!}');
    var _xData = JSON.parse('{!! json_encode($price) !!}');
</script>

{{--aria chart script end--}}
@endsection
