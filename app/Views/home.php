<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />

	<!-- STYLES -->

	<style {csp-style-nonce}>
		* {
			transition: background-color 300ms ease, color 300ms ease;
		}

		*:focus {
			background-color: rgba(221, 72, 20, .2);
			outline: none;
		}

		html,
		body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}

		header {
			background-color: rgba(247, 248, 249, 1);
			padding: .4rem 0 0;
		}

		.menu {
			padding: .4rem 2rem;
		}

		header ul {
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			list-style-type: none;
			margin: 0;
			overflow: hidden;
			padding: 0;
			text-align: right;
		}

		header li {
			display: inline-block;
		}

		header li a {
			border-radius: 5px;
			color: rgba(0, 0, 0, .5);
			display: block;
			height: 44px;
			text-decoration: none;
		}

		header li.menu-item a {
			border-radius: 5px;
			margin: 5px 0;
			height: 38px;
			line-height: 36px;
			padding: .4rem .65rem;
			text-align: center;
		}

		header li.menu-item a:hover,
		header li.menu-item a:focus {
			background-color: rgba(221, 72, 20, .2);
			color: rgba(221, 72, 20, 1);
		}

		section {
			margin: 0 auto;
			max-width: 1100px;
			padding: 2.5rem 1.75rem 3.5rem 1.75rem;
		}

		@media (max-width: 629px) {
			header ul {
				padding: 0;
			}

			header .menu-toggle {
				padding: 0 1rem;
			}

			header .menu-item {
				background-color: rgba(244, 245, 246, 1);
				border-top: 1px solid rgba(242, 242, 242, 1);
				margin: 0 15px;
				width: calc(100% - 30px);
			}

			header .menu-toggle {
				display: block;
			}

			header .hidden {
				display: none;
			}

			header li.menu-item a {
				background-color: rgba(221, 72, 20, .1);
			}

			header li.menu-item a:hover,
			header li.menu-item a:focus {
				background-color: rgba(221, 72, 20, .7);
				color: rgba(255, 255, 255, .8);
			}
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

	<!-- HEADER: MENU + HEROE SECTION -->
	<header>

		<div class="menu">
			<ul>
				<li class="menu-item"><a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
			</ul>
		</div>

	</header>

	<!-- CONTENT -->

	<section>
		<div class="container">
			<div class="card">
				<div class="row">
					<div class="col-lg-5 p-5 m-auto">
						<div class="form-group mb-4">
							<label for="uploadedFile" class="form-label">File only (.jpg , .jpeg , .pfd)</label>
							<input type="file" class="form-control" id="uploadedFile" name="uploadedFile">
						</div>
						<div class="form-group">
							<button class="btn btn-primary w-100" onclick="addFile();">Add File</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="card p-5">
				<div class="row">
					<div class="col-md-10 m-auto">
						<table class="table text-center" id="table">
							<thead>
								<tr>
									<th data-name="name">File</th>
									<th data-name="size">Size</th>
									<th data-name="type">Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="toast-container position-fixed top-0 end-0 p-3">
		<div id="warningToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<strong class="me-auto toast-title"></strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				<strong class="message"></strong>
			</div>
		</div>
	</div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	A1 = {};
	const toastWarning = ({
		title,
		message
	}) => {
		let body = $("#warningToast");
		$('.toast-title').html(title);
		$('.message').html(message)
		body.toast("show");
	}

	const addFile = () => {
		$('.is-invalid').removeClass('is-invalid');
		var file = $('#uploadedFile')[0].files;
		if (file.length) {
			let allowedFiles = ["image/jpg", "image/jpeg", "application/pdf"];
			if (!allowedFiles.includes(file[0].type)) {
				toastWarning({
					title: 'Warning',
					message: 'File type is not correct'
				});
				return false;
			} else {
				var formData = new FormData();
				formData.append('uploadedFile', file[0]);
				$.ajax({
					type: 'POST',
					url: 'api/file/upload',
					data: formData,
					processData: false,
					contentType: false,
					success: function(msg) {
						msg = JSON.parse(msg);
						if (msg.text) {
							toastWarning({
								title: 'Warning',
								message: msg.text
							});
						}
						if (msg.script) {
							if (msg.script.length) {
								$(msg.script).each(function(index, script) {
									eval(script);
								})
							}
						}
					},
					error: function(err) {
						console.log(err);
					}
				})
			}
		} else {
			toastWarning({
				title: 'Warning',
				message: `You have to select file!`
			});
			$('#uploadedFile').addClass('is-invalid');
			return false;
		}
	}
	const deleteFile = (obj) => {
		let json = {
			id: obj.id,
			name: obj.name
		}
		$.ajax({
			type: 'POST',
			url: 'api/file/delete',
			data: 'data=' + encodeURIComponent(JSON.stringify(json)),
			dataType: 'json',
			success: function(msg) {
				if (msg.text) {
					toastWarning({
						title: 'Warning',
						message: msg.text
					});
				}
				if (msg.script) {
					if (msg.script.length) {
						$(msg.script).each(function(index, script) {
							eval(script);
						})
					}
				}
			},
			error: function(err) {
				console.log(err);
			}
		})
	}
	const getFiles = () => {
		$.ajax({
			type: 'GET',
			url: 'api/file/list',
			dataType: 'json',
			success: function(msg) {
				if (msg.text) {
					toastWarning({
						title: 'Warning',
						message: msg.text
					});
				}
				if (msg.script) {
					if (msg.script.length) {
						$(msg.script).each(function(index, script) {
							eval(script);
						})
					}
				}
			},
			error: function(err) {
				console.log(err);
			}
		})
	}
	const buildFileTable = () => {
		let data = A1.files;
		let body = $('tbody', '#table').empty();
		$(data).each(function(index, file) {
			let tr = $('<tr/>', {}).appendTo(body);
			let td = $('<td/>', {
				html: `<a href='/upload/${file.name}' target='blank'>${file.name}</a>`
			}).appendTo(tr);
			td = $('<td/>', {
				html: `${file.size} KB`
			}).appendTo(tr);
			td = $('<td/>', {
				html: file.type
			}).appendTo(tr);
			td = $('<td/>', {}).appendTo(tr);
			let button = $('<button/>', {
				class: 'btn btn-danger btn-sm',
				html: '<i class="fa fa-trash"></i>',
				title: 'Delete',
				'data-index': index
			}).appendTo(td);
			button.on('click', function() {
				let selectedIndex = $(this).attr('data-index');
				let obj = A1.files[selectedIndex];
				deleteFile(obj)
			})
		})
	}
	$('[data-name]').on('click', function() {
		let sortType = "ASC";
		if ($(this).hasClass('ascSort')) {
			$('.ascSort').removeClass('ascSort').addClass('descSort');
			sortType = "DESC";
		} else if ($(this).hasClass('descSort')) {
			$('.descSort').removeClass('descSort').addClass('ascSort');
		} else {
			$('.ascSort').removeClass('ascSort');
			$('.descSort').removeClass('descSort');
			$(this).addClass('ascSort');
		}
		let parameter = $(this).attr('data-name');
		if (A1.files.length) {
			if (parameter == 'size') {
				if (sortType == "ASC") {
					A1.files.sort(function(x, z) {
						return x.size - z.size
					});
				} else {
					A1.files.sort(function(x, z) {
						return z.size - x.size
					});
				}
			} else {
				if (sortType == "ASC") {
					A1.files.sort((a, b) => a[parameter].localeCompare(b[parameter]))
				} else {
					A1.files.sort((a, b) => b[parameter].localeCompare(a[parameter]))
				}
			}
			buildFileTable();
		}

	})
	$(function() {
		getFiles();
	})
</script>