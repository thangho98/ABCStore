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
	$('#demoNotify').click(function () {
		$.notify({
			title: "Update Complete : ",
			message: "Something cool is just updated!",
			icon: 'fa fa-check'
		}, {
				type: "info"
			});
	});
	$('.button-del').click(function () {
		swal({
			title: "Bạn có muốn xóa?",
			text: "Sau khi xóa, bạn sẽ không thể khôi phục đối tượng này!",
			icon: "warning",
			buttons: ["Không, hủy nó đi!", "Vâng, tôi chấp nhận!"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				swal("Đã xóa!", "Đối tượng đã được xóa.", "success");
			} else {
				swal("Đã hủy", "Đối tượng vẫn được giữ lại :)", "error");
			}
		});
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

