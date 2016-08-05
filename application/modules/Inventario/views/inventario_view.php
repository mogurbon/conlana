<html>
  <head>

    <link href="<?php echo base_url(); ?>application/views/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>application/views/scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	
	 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 <script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>  --> 
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
	<script src="<?php echo base_url(); ?>application/views/js/includes.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>application/views/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>application/views/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	
  </head>
  <body>
  <pre>
  <?php #var_dump($tiendas); ?>
  </pre>
  <div class="filtering">
    <form>
        Nombre: <input type="text" name="name" id="name" />
        Tienda: 
        <select id="idTienda" name="idTienda" style="width: auto;">
            <option selected="selected" value="0" >Tiendas</option>

            
            <?php foreach ($tiendas as $tienda):?>
            	<option value="<?=$tienda->idTiendas?>" ><?=$tienda->razon_social?></option>
            <?php endforeach;?>
            
        </select>
        <button type="submit" id="LoadRecordsButton">Load records</button>
    </form>
</div>
	<div id="InventarioContainer" style="width: auto;"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#InventarioContainer').jtable({
				title: 'Inventario',
				actions: {
					listAction: '<?php echo site_url(['Inventario','list']) ?>',
					createAction: '<?php echo site_url(['Inventario','create']) ?>',
					updateAction: '<?php echo site_url(['Inventario','update']) ?>',
					deleteAction: '<?php echo site_url(['Inventario','delete']) ?>'
				},
				fields: {
					idInventarioGeneral: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					producto: {
						title: 'Producto',
						width: '30%',
						
						create: true,
						edit: true
					},
					cantidad: {
						title: 'Cantidad',
						width: '20%',
						create: true,
						edit: true
					},
					preciounitario: {
						title: 'Precio',
						width: '20%',
						create: true,
						edit: true
					},
					razon_social: {
						title: 'Tienda',
						width: '20%',
						create: false,
						edit: false
					},
					telefono: {
						title: 'Telefono',
						width: '20%',create: false,
						edit: false
					},
					idTiendas: {
					title: 'Tiendas',
                    edit: true,
					options: '<?php echo site_url(['Inventario','tiendas']) ?>'
				},
					
				}
			});

			//Load person list from server
			$('#InventarioContainer').jtable('load');
		$('#LoadRecordsButton').click(function (e) {
            e.preventDefault();
            $('#InventarioContainer').jtable('load', {
                name: $('#name').val(),
				idTienda: $('#idTienda option:selected').val()
            });
        })
		});

	</script>
 
  </body>
</html>
