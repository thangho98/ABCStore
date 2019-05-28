<div class="popup-form hidden" id="popup-form-add">
        <form action="{{asset('admin/guarantee/add')}}" id="add-form" method="POST" novalidate>
            <div class="form-row">
                <div class="form-group col-md-6"> 
                    <label>Hóa đơn <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputOrder" name="name" placeholder="Nhập và chọn hóa đơn"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label>Sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputProduct" name="product"
                        placeholder="Chọn sản phẩm" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Serial <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputSerial" name="serial"
                        placeholder="Chọn sản phẩm" required>
                </div>
                <div class="form-group col-md-10 ml-5">
                    <label class="d-block">Mô tả<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputContent" name="content" placeholder="Mô tả tình trạng thiết bị"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nhân viên nhận: <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="inputEmployee" placeholder="Nhập nhân viên" name="employee"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label>Ngày nhận: <span class="text-danger">*</span></label>
                    <input type="text" class="js-datepicker form-control" id="inputDateRecieve" name="dateRecieve"
                            data-week-start="1" data-autoclose="true" data-today-highlight="true"
                            data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                </div>
            </div>
            <div class="tile-footer-2">
                <button class="btn btn-primary" type="button" id="submitAdd">Thêm</button>
                <button class="btn btn-danger" type="button" id="cancelAdd">Hủy</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>