   <div id="seccion-municipio">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Municipio</i>
        
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

		<div align ="center">
				<div id="actual"> 
				</div>
		</div>

        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fmunicipio">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="muni_codi">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="muni_codi" name="muni_codi" placeholder="Ingrese Codigo"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="muni_nomb">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="muni_nomb" name="muni_nomb" placeholder="Ingrese Nombre del Municipio"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="depa_codi">Departamento:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="depa_codi" name="depa_codi">
							
							</select>
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Municipio" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>