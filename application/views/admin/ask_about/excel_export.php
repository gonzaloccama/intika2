<div class="py-3"></div>
<div class="container-fluid py-5">
	<div class="card card-body">

		<table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%" border="1">
			<thead class="mdb-color white-ic">
			<tr>
				<th class="th-sm">ID</th>
				<th class="th-sm">NOMBRES</th>
				<th class="th-sm">EMAIL</th>
				<th class="th-sm">CELULAR</th>
				<th class="th-sm">RUTA</th>
				<th class="th-sm">ESTADO DE CORREO</th>

			</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			foreach ($asks as $ask): ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= utf8_decode($ask->names); ?></td>
					<td><?= utf8_decode($ask->email); ?></td>
					<td><?= utf8_decode($ask->celular); ?></td>
					<td><?= utf8_decode($ask->name); ?></td>
					<td><?php
						if ($ask->send_email):
							echo 'Enviado';
						else:
							echo 'No enviado';
						endif;
						?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>

		</table>
	</div>
</div>
