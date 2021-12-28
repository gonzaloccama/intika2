<div class="py-3"></div>
<div class="container-fluid py-5">
	<div class="card card-body">

		<table border="1" id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
			<thead class="mdb-color white-ic">
			<tr>
				<th class="th-sm">NRO</th>
				<th class="th-sm">NOMBRE</th>
				<th class="th-sm"><?= utf8_decode('DESCRIPCIÓN') ?></th>
				<th class="th-sm">PRECIO</th>
				<th class="th-sm">DESTINOS</th>
				<th class="th-sm">ORIGEN</th>
				<th class="th-sm">DESTINO</th>

			</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			foreach ($routes as $route): ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= utf8_decode($route->name); ?></td>
					<td><?= utf8_decode($route->description); ?></td>
					<td><?= utf8_decode($route->price); ?></td>

					<td><?php

						$_destinations = json_decode($route->destination);
						$de = '';
						$c = 1;
						$opening = '';
						$ending = '';
						$_des_ = array();

						foreach ($destinations as $destination):
							if (in_array($destination->id, $_destinations)):
								array_push($_des_, $destination->destination);
							endif;
							if ($route->opening == $destination->id):
								$opening = $destination->destination;
							endif;
							if ($route->ending == $destination->id):
								$ending = $destination->destination;
							endif;
						endforeach;

						foreach ($_des_ as $_des):
							if ($c == count($_des_)):
								$de .= $_des;
							else:
								$de .= $_des . ', ';
							endif;
							$c++;
						endforeach;

						echo utf8_decode($de);

						?></td>
					<td><?= utf8_decode($opening); ?></td>
					<td><?= utf8_decode($ending); ?></td>

				</tr>
			<?php endforeach; ?>
			</tbody>

		</table>
	</div>
</div>

