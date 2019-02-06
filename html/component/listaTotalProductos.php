<div class="table-responsive">
    <table class="table table-condensed table-hover dataTable no-footer" name="table1" id="listaTotalProductos">
        <thead class="bg-gray">
            <tr>
                <th style="width:10%; text-align:center">Cantidad</th>
                <th style="text-align:center">Producto</th>
                <th style="width:15%; text-align:center">Precio</th>
                <th id ="iborrado" style="width:1%"></th>
            </tr>
        </thead>
        <tbody id='cuerpo'></tbody>
    
    </table>

</div>
<!-- /.table-responsive -->

<div id="totales">
    <div class="row">
        <div class="col-md-offset-8 form-horizontal lblFooter" >

            <!--<div class="col-md-4 form-group">-->
            <label class="control-label col-sm-2 col-md-offset-3 label-fontSize" ><b>SUBTOTAL:</b></label>
            <div class="col-sm-5 col-md-offset-1">
                <label  class="control-label label-fontSize" name="txtsubtotal" id="txtsubtotal"></label>
            </div>
            <!--</div>-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-8 form-horizontal lblFooter">
           
                <!-- <input type="checkbox" class ="col-md-1 " id ="checkitbm"checked/> -->
                <label class="control-label col-sm-2 label-fontSize"><b>ITBMS:</b></label>
           
            <div class="col-sm-5 col-md-offset-1">
                <label class="control-label label-fontSize" name="txtitbms" id="txtitbms"></label>									 
            </div>
        </div>
    </div>	
    <div class="row">
        <div class="col-md-offset-8 form-horizontal lblFooter">
            <label class="control-label  col-sm-2 col-md-offset-3 label-fontSize" for="txtNumcotiza"><b>TOTAL:</b> </label>
            
            <div class="col-sm-5 col-md-offset-1">
                <label class="control-label label-fontSize" id="txttotal"></label>									 
            </div>
        </div>
    </div>
</div>