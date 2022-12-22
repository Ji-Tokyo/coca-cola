<?php
/** @var array $data */
session_start();
require_once "php_code/logic.php";
require('.core/index.php');
$Allcategory = ObjectTable::GetCategory();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<script src="js/bootstrap.bundle.min.js" defer></script>
	<script src="js/script.js" defer></script>
</head>
<body>
<?php require_once "header.php"; ?>
<div class="container">
	<form action="" id="form" method="GET" class="mt-5 mb-5">
		<div class="container w-100">
			<div class="d-flex justify-content-center w-100 mb-4">Фильтрация результата поиска</div>
			<div class="d-flex justify-content-center w-100">По цене:</div>
			<input type="text" name="cost_min" placeholder="Цена от" class="w-100 form-control mb-1"
				   value="<?php save_val("cost_min"); ?>">
			<input type="text" name="cost_max" placeholder="Цена до" class="w-100 form-control mb-3"
				   value="<?php save_val("cost_max"); ?>">
			<div class="d-flex justify-content-center w-100 mb-1">Фильтрация по бренду:</div>
			<select type="text" name="type" class="w-100 form-select mb-3">
				<option value="">Любой</option>
				<?php
				foreach ($types as $type) {
					?>
					<option value="<?php echo $type['id']; ?>" <?php save_sel($type['id']) ?>><?php echo $type['type_name']; ?></option>
					<?php
				}
				?>
			</select>
			<div class="d-flex justify-content-center w-100 mb-1">Фильтрация по описанию</div>
			<input type="text" name="description" placeholder="Введите описание товара" class="w-100 form-control mb-3"
				   value="<?php save_val("description"); ?>">
			<div class="d-flex justify-content-center w-100 mb-1">Фильтрация по наименованию</div>
			<input type="text" name="name" placeholder="Введите наименование товара" class="w-100 form-control mb-3"
				   value="<?php save_val("name"); ?>">
			<div class="d-flex justify-content-center">
				<button type="submit" class="btn btn-primary rounded-0 me-2">Применить фильтр</button>
				<button type="submit" class="btn btn-danger rounded-0" name="clear" value="1">Очистить фильтр</button>
			</div>
			<div></div>
		</div>
	</form>
</div>
<table class="table table-bordered container">
	<thead>
	<tr>
		<th>Изображение</th>
		<th>Название</th>
		<th>Тип</th>
		<th>Описание</th>
		<th>Цена</th>
	</tr>
	</thead>
	<tbody>
	<button type="button" class="btn btn-success w-25 m-5 " data-bs-toggle="modal" data-bs-target="#create">
		<i class="bi bi-plus-circle"></i>
	</button>
	<?php foreach ($data as $item) : ?>
		<tr>
			<td><img src="img/<?php echo $item['img_path']; ?>" class="w-100"></td>
			<td class="crud-title"><?php echo $item['name']; ?></td>
			<td class="crud-category"><?php echo $item['type_name']; ?></td>
			<td class="crud-desc overflow-hidden"><?php echo $item['description']; ?></td>
			<td class="crud-price"><?php echo $item['cost']; ?></td>
			<td class="d-flex">
				<button data-id="<?=$item['id']?>" type="button" data-bs-toggle="modal"
						data-bs-target="#edit" class="btn btn-success m-1">
					<i class="bi bi-pencil-square"></i>
				</button>
				<button data-id="<?=$item['id']?>" type="button" data-bs-toggle="modal"
						data-bs-target="#delete" class="btn btn-danger m-1">
					<i class="bi bi-x-circle"></i>
				</button>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<div class="modal" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	 aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit object</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" action="./php_code/crud_actions.php" class="modal-form"
					  method="POST">
					<input type="text" class="d-none" value="edit" name="cmd">
					<input class="crud-id-input d-none" type="text" value="" name="id">
					<div class="form-group">
						<label for="" class="fw-bold">Название</label>
						<input type="text" class="crud-title-input border border-light form-control"
							   name="name" placeholder="Заголовок">
					</div>
					<div class="form-group">
						<label for="" class="fw-bold">Описание</label>
						<textarea name="desc" class=" crud-desc-input border border-light form-control"
								  id="" cols="30" rows="10" placeholder="Описание"></textarea>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label for="" class="fw-bold">Цена</label>
							<input class="crud-price-input border border-light form-control" type="number"
								   name="price" min='0' placeholder="999 ₽">
						</div>
					</div>
					<div class="row">
						<label for="#category" class="fw-bold">Тип</label>
						<select class="crud-category-input border border-light form-control" name="type"
								id="category">
							<option value="" default>Выберите категорию</option>
							<?php foreach ($Allcategory as $row) : ?>
								<option selected value="<?=$row['type_name'];?>"><?=$row['type_name'];?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Загрузите вашу картинку</label>
						<input type="file" name='file_img'
							   class="crud-img-input form-control border border-light">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
<div class="modal" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	 aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Delete object</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h3>Вы уверены, что хотите удалить запись?</h3>
				<form enctype="multipart/form-data" action="./php_code/crud_actions.php" class="modal-form"
					  method="POST">
					<input type="text" class="d-none" value="delete" name="cmd">
					<input class="crud-id-input d-none" type="text" value="" name="id">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Delete</button>
				</form>
			</div>

		</div>
	</div>
</div>
<div class="modal" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	 aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Create object</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" action="./php_code/crud_actions.php" class="modal-form"
					  method="POST">
					<input type="text" class="d-none" value="create" name="cmd">
					<div class="form-group">
						<label for="">Заголовок</label>
						<input type="text" class="border border-light form-control" name="title"
							   placeholder="Заголовок">
					</div>
					<div class="form-group">
						<label for="">Описание</label>
						<textarea name="description" class="border border-light form-control" id="" cols="30"
								  rows="10" placeholder="Описание"></textarea>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label for="">Цена</label>
							<input class="border border-light form-control" type="number" name="price" min='0'
								   placeholder="999 ₽">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label for="#category">Категория</label>
							<select class="border border-light form-control" name="category" id="category">
								<option value="" default>Выберите категорию</option>
								<?php foreach ($Allcategory as $row) : ?>
									<option selected value="<?=$row['id'];?>"><?=$row['type_name'];?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Загрузите вашу картинку</label>
							<input type="file" name='file_img' class="form-control border border-light">
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Create</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script src="./script/editModal.js"></script>
<?php require_once "footer.php"; ?>
</body>
</html>