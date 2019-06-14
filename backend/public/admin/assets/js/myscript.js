$(document).ready(function () {
	$('#addbutton').on('click', function () {
		$('#popup-form-add').toggleClass('hidden');
		$('.darktheme').toggleClass('active');
		$('#add-form').removeAttr('novalidate');
	});

	$('#cancelAdd').on('click', function () {
		$('#popup-form-add').addClass('hidden');
		$('.darktheme').removeClass('active');
		$('#add-form').attr('novalidate', 'true');
	});
})

$(document).ready(function () {

	jQuery.extend(jQuery.validator.messages, {
		required: "Trường này bắt buộc nhập.",
		remote: "Please fix this field.",
		email: "Vui lòng nhập đúng định dạng email.",
		url: "Please enter a valid URL.",
		date: "Please enter a valid date.",
		dateISO: "Please enter a valid date (ISO).",
		number: "Vui lòng chỉ nhập số cho trường này.",
		digits: "Please enter only digits.",
		creditcard: "Please enter a valid credit card number.",
		equalTo: "Please enter the same value again.",
		accept: "Please enter a value with a valid extension.",
		maxlength: jQuery.validator.format("Vui lòng nhập ít hơn hoặc bằng {0} kí tự."),
		minlength: jQuery.validator.format("Vui lòng nhập nhiều hơn hoặc bằng {0} kí tự."),
		rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		max: jQuery.validator.format("Số lượng trong kho chỉ còn {0}."),
		min: jQuery.validator.format("Số lượng phải lớn hơn hoặc bằng {0}.")
	});

	$('#demoNotify').click(function () {
		$.notify({
			title: "Update Complete : ",
			message: "Something cool is just updated!",
			icon: 'fa fa-check'
		}, {
				type: "info"
			});
	});

	$('#submitAdd').on('click', function () {
		$form = $('#add-form');

		//$form.submit();

		if ($form.valid()) {

			var datas = new FormData($form[0]);

			$.ajax({
				url: $form.attr('action'),
				enctype: 'multipart/form-data',
				processData: false,
				contentType: false,
				cache: false,
				type: $form.attr('method'),
				data: datas,
				success: function (data) {
					swal("Đã thêm!", "Đối tượng đã được thêm.", "success")
						.then((value) => {
							console.log('Submission was successful.');
							location.reload();
						});
				},
				error: function (data) {
					swal("Bị lỗi", "Đối tượng này đã bị lỗi :)", "error");
					console.log('An error occurred.');
				}
			});
		}
		else {
			swal("Lỗi", "Bạn điền Form chưa đầy đủ :(", "error");
		}

	});

	$('#btnDel').click(function () {
		var numberOfChecked = $('input[name*="selected"]:checked').length;
		console.log(numberOfChecked);
		if (numberOfChecked > 0) {
			swal({
				title: "Bạn có muốn xóa?",
				text: "Sau khi xóa, bạn sẽ không thể khôi phục đối tượng này!",
				icon: "warning",
				buttons: ["Không, giữ nó lại!", "Vâng, tôi chấp nhận!"],
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: $('#formdata').attr('action'),
						type: $('#formdata').attr('method'),
						data: $('#formdata').serialize(),
						success: function (data) {
							swal("Đã xóa!", "Đối tượng đã được xóa.", "success");
							console.log('Submission was successful.');
							location.reload();
						}
					});
				}
				else {
					swal("Đã hủy", "Đối tượng vẫn được giữ lại :)", "error");
				}
			});
		}
		else {
			swal("Thông báo", "Không có đối tượng nào để xóa :)", "error");
		}

	});

	$('.button-edit').click(function () {
		swal({
			title: "Bạn có muốn sửa?",
			text: "Bạn sẽ thay đổi dữ liệu của đối tượng này!",
			icon: "warning",
			buttons: ["Không, hủy nó đi!", "Vâng, tôi chấp nhận!"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				swal("Đã sửa!", "Đối tượng đã được chỉnh sửa.", "success");
			} else {
				swal("Đã hủy", "Đối tượng vẫn được giữ lại :)", "error");
			}
		});
	});
});
$(document).ready(function () {
	$(".remove-sorting").removeAttr("aria-label");
	$(".remove-sorting").removeAttr("aria-controls");
	$(".remove-sorting").removeAttr("aria-sort");
	$(".remove-sorting").removeClass("sorting_asc");
	$(".remove-sorting").removeClass("sorting_desc");
	$(".remove-sorting").removeClass("sorting");
	$(".orderby").click(function () {
		console.log("click");
		$(".remove-sorting").removeAttr("aria-label");
		$(".remove-sorting").removeAttr("aria-controls");
		$(".remove-sorting").removeAttr("aria-sort");
		$(".remove-sorting").removeClass("sorting_asc");
		$(".remove-sorting").removeAttr("aria-label");
		$(".remove-sorting").removeClass("sorting_desc");
		$(".remove-sorting").removeClass("sorting");
	});
});

function notifySuccess(title, message) {
	$.notify({
		title: title,
		message: message,
		icon: 'fa fa-check mr-1'
	},
		{
			type: "success",
			placement: {
				from: "top",
				align: "center"
			},
		});
}

function notifyInfo(title, message) {
	$.notify({
		title: title,
		message: message,
		icon: 'fa fa-info-circle mr-1'
	},
		{
			type: "info",
			placement: {
				from: "top",
				align: "center"
			},
		});
}

function notifyWarning(title, message) {
	$.notify({
		title: title,
		message: message,
		icon: 'fa fa-exclamation mr-1'
	},
		{
			type: "warning",
			placement: {
				from: "top",
				align: "center"
			},
		});
}

function notifyDanger(title, message) {
	$.notify({
		title: title,
		message: message,
		icon: 'fa fa-times mr-1',
	},
		{
			type: "danger",
			placement: {
				from: "top",
				align: "center"
			},
		});
}

function isNumber(value) {
	return /^\d+$/.test(value);
}