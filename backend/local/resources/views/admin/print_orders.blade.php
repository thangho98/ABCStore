@extends('admin.layout.master')
@section('title','In Hóa Đơn')
@section('main')
<!-- Main Container -->
<main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        In Hóa Đơn <small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Bán hàng</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Hóa đơn</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Basic -->
            <div class="block">
                <div class="block-header">
                </div>
                <div class="block-content block-content-full">
                    <section class="invoice">
                        <div class="row mb-4 header-print">
                            <div class="col-md-3">
                                <h2 class="page-header abcstore-title"><i class="fa fa-store"></i> ABC
                                    Store</h2>
                                <div class="abcstore-infor">
                                    <b>CỬA HÀNG KINH DOANH TBDĐ ABC STORE</b> <br>
                                    <address>
                                        Linh Trung, Thủ Đức, Tp.HCM
                                        <br>SĐT: 0123456789
                                        <br>Email: abcstore@gmail.com</address>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <h1 class="text-danger hoadon-title">HÓA ĐƠN MUA HÀNG</h1>
                            </div>
                            <div class="col-md-2 offset-1">
                                <h5 class="text-left text-primary hoadon-date">
                                    <span>Mẫu số: #007612</span>
                                    <br> Ngày mua: <span>{{ date("d/m/Y",strtotime($orders->order_date))}}</span>
                                    <br>Số hóa đơn: <span>{{$orders->order_id}}</span> <br>
                                </h5>

                            </div>
                        </div>
                        <div class="row invoice-info mb-3">

                                <div class="col-2"><strong>
                                        Họ tên khách hàng: <br>
                                        Email: <br>
                                        Số điện thoại: <br>
                                        Hình thức thanh toán:
                                    </strong>
                                </div>
                                <div class="col-10">
                                    <span>{{$orders->cus_name}}</span>
                                    <br><span>{{$orders->cus_email}}</span>
                                    <br><span>{{$orders->cus_phone}}</span>
                                    <br><span>Tiền mặt</span>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">STT</th>
                                            <th class="text-center">Tên hàng hóa</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Đơn giá</th>
                                            <th class="text-center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3"></th>
                                            <th colspan="2" class="text-center">Tổng cộng</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Số lượng: </th>
                                            <th colspan="2" class="text-center text-danger">{{$orders->order_total_prod}}</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Thành tiền: </th>
                                            <th colspan="2" class="text-center text-danger">{{number_format($orders->order_total_price,0,',','.')}} VNĐ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($list_ordersdetail as $item)
                                        <tr>
                                            <td class="text-center text-primary">{{$i}}</td>
                                            <td class="text-center text-primary">{{$item->prod_name}} {{$item->propt_ram}} gb {{$item->propt_rom}} {{$item->propt_color}}</td>
                                            <td class="text-center text-primary">{{$item->orddt_quantity}}</td>
                                            <td class="text-center text-primary">{{number_format($item->orddt_promotion_price,0,',','.')}} VNĐ</td>
                                            <td class="text-center text-primary">{{number_format($item->orddt_total,0,',','.')}} VNĐ</td>
                                            @php
                                                $i++;
                                            @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                            </div>
                            <div class="col-4 text-right">
                                <strong>Người mua hàng</strong><br>
                                <small><b>(Ký, ghi rõ họ tên)</b></small>
                                <br><br><br><br><br>
                                <strong>{{$orders->cus_name}}</strong>
                            </div>
                            <div class="col-4 text-right">
                                <strong>Người bán hàng</strong><br>
                                <small><b>(Ký, ghi rõ họ tên)</b></small>
                                <br><br><br><br><br>
                                <strong><span class="mr-5">{{$orders->empl_id}}</span>{{$orders->empl_name}}</strong>
                            </div>
                        </div>
                        <div class="row d-print-none mt-5 tile-footer">
                            <div class="col-12 text-right"><a class="btn btn-primary"
                                    href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i>
                                    Print</a></div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END Basic -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
@section('scriptjs')

@endsection