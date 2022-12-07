    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">داشبورد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ لیست کاربران</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
                </div>
                <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
                </div>
                <div class="mb-3 mb-xl-0">
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-primary">20 مهر 1399</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">منوی کشویی</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                            <a class="dropdown-item" href="#">1399 </a>
                            <a class="dropdown-item" href="#">1398 </a>
                            <a class="dropdown-item" href="#">1397 </a>
                            <a class="dropdown-item" href="#">1396</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
        <!--Row-->
        <div class="row row-sm">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">لیست سفارشات</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('panel.sections.errors')
                        <div class="table-responsive border-top userlist-table">
                            <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>نام کاربر</span></th>
                                    <th class="wd-lg-20p"><span>مبلغ کل سفارش</span></th>
                                    <th class="wd-lg-20p"><span>آدرس ارسال</span></th>
                                    <th class="wd-lg-20p"><span>تغییر وضعیت</span></th>
                                    <th class="wd-lg-20p">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{ $order->user['name'] }}</td>

                                        @php($price = 0)
                                        @forelse($order->orderfoods as $foods)
                                            @php($price = $price+($foods['price']*$foods['count']))
                                        @empty
                                        @endforelse

                                        <td>{{ number_format($price,0,'',',') }} ریال</td>
                                        <td>{{ $order->address->address }}</td>
                                        <td>
                                            <p class="px-2 py-2 text-center rounded mb-0" style="background-color: {{ $order->orderstatus['bgcolor'] }};color: white;">{{ $order->orderstatus['title'] }}</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.orderfoods.show',$order['id']) }}" class="btn btn-sm btn-success">
                                                <i class="las la-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $orders->appends(['sort' => 'id'])->links() }}
                    </div>
                </div>
            </div><!-- COL END -->
        </div>
        <!-- row closed  -->
    </div>

