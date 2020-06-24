$(document).ready(function () {
	// DATEPICKER
	$(".datepicker").datepicker({
		format: "dd-mm-yyyy",
	});

	$("#pasien").change(function () {
		var value = $("#pasien").val();
		if (value == "") {
			$("#nama").html("");
			$("#jk").html("");
			$("#lahir").html("");
			$("#alamat").html("");
			$("#kab").html("");
			$("#kec").html("");
			$("#kel").html("");
			$("#tlep").html("");
			$("#email").html("");
		} else {
			$.ajax({
				type: "POST",
				url: "",
				// url: "http://localhost/silab/dashboard/lab/",
				data: { id: value },
				dataType: "json",
				success: function (data) {
					$("#nama").html(data["nama"]);
					$("#jk").html(data["jk"]);
					$("#lahir").html(data["lahir"]);
					$("#alamat").html(data["alamat"]);
					$("#kab").html(data["kab"]);
					$("#kec").html(data["kec"]);
					$("#kel").html(data["kel"]);
					$("#tlep").html(data["tlep"]);
					$("#email").html(data["email"]);
				},
			});
		}
	});

	$(".edit").on("click", function () {
		const id = $(this).data("id");
		$("#exampleModalLabel").html("Edit Data Logistik");
		$(".modal-footer button[type=submit]").html("Simpan Perubahan");
		$.ajax({
			type: "POST",
			url: "",
			// url: "http://localhost/silab/dashboard/",
			data: { edit: id },
			dataType: "json",
			success: function (data) {
				$("#id").val(data["id"]);
				$("#no_lot").val(data["no_lot"]);
				$("#nama").val(data["nama"]);
				$("#merk").val(data["merk"]);
				$("#tanggal").val(data["tanggal"]);
				$("#jumlah").val(data["jumlah"]);
				$("#satuan").val(data["satuan"]);
				$("#harga").val(data["harga"]);
				$("#type_id").val(data["type_id"]);
			},
		});
	});

	$(".gunakan").on("click", function () {
		const id = $(this).data("id");
		const jml = $(this).data("jml");
		validasi(jml);
		$("#exampleModalLabel").html("Input Pemakaian Logistik");
		$(".modal-footer button[type=submit]").html("Simpan");
		$.ajax({
			type: "POST",
			url: "",
			// url: "http://localhost/silab/dashboard/",
			data: { gunakan: id },
			dataType: "json",
			success: function (data) {
				// console.log(data);
				$("#name").val(data["nama"]);
				$("#total").val(data["jumlah"]);
				$("#id_log").val(data["id"]);
				$("#tgl").val(moment().format("DD-MM-YYYY"));
			},
		});
	});
	function validasi(params) {
		// modalform validation
		$("#formgunakan").validate({
			rules: {
				jml: {
					required: true,
				},
				ket: {
					required: true,
				},
				tgl: {
					required: true,
				},
			},
			messages: {
				ket: {
					required: "Keterangan harus diisi!",
				},
				tgl: {
					required: "Tanggal harus diisi!",
				},
			},
		});
		$("#jml").rules("add", {
			range: [1, params],
			messages: {
				required: "Jumlah harus diisi!",
				range: "Melebihi jumlah stok => {1}",
			},
		});
	}

	$(".batal").click(function () {
		$("#formgunakan").validate().resetForm();
		$("#formgunakan")[0].reset();
		$("#modalform")[0].reset();
	});

	$(".tambah").on("click", function () {
		$("#exampleModalLabel").html("Tambah Data Logistik");
		$(".modal-footer button[type=submit]").html("Simpan");
		$("#tanggal").val(moment().format("DD-MM-YYYY"));
	});

	$(".hapus").on("click", function (e) {
		if (!confirm("Yakin menghapus?")) {
			e.preventDefault();
		}
	});

	// tabel sembunyi
	var table = $(".hehe").DataTable({
		columnDefs: [
			{
				targets: [8],
				visible: false,
			},
		],
	});

	// filter datatable
	$("#typelog").change(function () {
		table.column($(this).data("column")).search($(this).val()).draw();
	});

	$("#modalform").validate({
		rules: {
			nama: {
				required: true,
			},
			jumlah: {
				required: true,
			},
			satuan: {
				required: true,
			},
			harga: {
				required: true,
			},
		},
		messages: {
			nama: {
				required: "Nama harus diisi!",
			},
			jumlah: {
				required: "Jumlah harus diisi!",
			},
			satuan: {
				required: "Satuan harus diisi!",
			},
			harga: {
				required: "Harga harus diisi!",
			},
		},
	});
});
