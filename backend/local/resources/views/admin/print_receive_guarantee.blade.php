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
                                <a class="link-fx" href="">Nhận hóa đơn</a>
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
                                <h1 class="text-danger hoadon-title">PHIẾU GỬI BẢO HÀNH</h1>
                                <p> (Phần khách hàng giữ) <br>
                                    (For Customer)
                                </p>
                            </div>
                            <div class="col-md-2 offset-1">
                                <h5 class="text-left text-primary hoadon-date">
                                    <span>Mẫu số: #007612</span>
                                    <br> Ngày: <span>{{ date("d/m/Y",strtotime($guarantee->gtd_date_receive))}}</span>
                                    <br>Số phiếu: <span>{{$guarantee->gtd_id}}</span> <br>
                                </h5>

                            </div>
                        </div>
                        <div class="row invoice-info mb-3">
                            <div class="col-2"><strong>
                                    Họ tên khách hàng: <br>
                                    Email: <br>
                                    Số điện thoại: <br>
                                    Số hóa đơn: <br>
                                    Ngày mua:
                                </strong>
                            </div>
                            <div class="col-10">
                                <span>{{$guarantee->cus_name}}</span>
                                <br><span>{{$guarantee->cus_email}}</span>
                                <br><span>{{$guarantee->cus_phone}}</span>
                                <br><span>{{$guarantee->order_id}}</span>
                                <br><span>{{ date("d/m/Y",strtotime($guarantee->order_date))}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Tên hàng hóa</th>
                                            <th class="text-center">Số sê-ri</th>
                                            <th class="text-center">Màu sắc</th>
                                            <th class="text-center">RAM</th>
                                            <th class="text-center">ROM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-primary">{{$guarantee->prod_name}}</td>
                                            <td class="text-center text-primary">{{$guarantee->gtd_serial}}</td>
                                            <td class="text-center text-primary">{{$guarantee->propt_color}}</td>
                                            <td class="text-center text-primary">{{$guarantee->propt_ram}} GB</td>
                                            <td class="text-center text-primary">{{$guarantee->propt_rom}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <p><strong>Thông tin yêu cầu bảo hành:</strong></p>
                            </div>
                            <div class="col-9">
                                <textarea readonly rows="3" cols="80">{{$guarantee->gtd_required_content}}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                            </div>
                            <div class="col-4 text-right">
                                <strong>Khách hàng</strong><br>
                                <small><b>(Ký, ghi rõ họ tên)</b></small>
                                <br><br><br><br><br>
                                <strong>{{$guarantee->cus_name}}</strong>
                            </div>
                            <div class="col-4 text-right">
                                <strong>Nhân viên nhận</strong><br>
                                <small><b>(Ký, ghi rõ họ tên)</b></small>
                                <br><br><br><br><br>
                                <strong><span class="mr-5">{{$guarantee->empl_id}}</span>{{$guarantee->empl_name}}</strong>
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