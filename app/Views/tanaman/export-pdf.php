<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<style>
		.border-table{
			font-family: Arial, Helvetica, sans-serif;
			width: 100%;
			border-collapse: collapse;
			text-align: center;
			font-size: 12px;
		}

		.border-table th{
			border: 1 solid #000;
			font-weight: bold;
			background-color: #6495ED;
		}

		.border-table td{
			border: 1 solid #000;
		}
	</style>
</head>
<body>
	<h3 style="text-align: center;">Data Tanaman UPlant</h3>
        <table border="1" class="border-table">
          <tbody>
            <tr>
              <th>ID</th>
              <th>Nama Tanaman</th>
              <th>Jenis</th>
              <th>Nama Ilmiah</th>
            </tr>
            <?php $key = 1; ?>
            <?php foreach ($result as $value) : ?>
              <tr>
                <td><?= $key++ ?></td>
                <td><?= $value->nama_tanaman ?></td>
                <td><?= $value->jenis ?></td>
                <td><?= $value->nama_ilmiah ?></td>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
</body>
</html>