
@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
<body>



  <?php
 if ($msj==!"") { ?>
           <div ><label style='background-color: #cce5ff !important;
    border: 1px solid #004085;
    padding: 8px;
    margin-bottom: 10px;
    font-family: Arial;
    font-size: 18px;
    width: 100%;
    color: #004085;
    border-radius: 4px 4px 4px 4px;
    padding: 20px 20px 20px 20px;
    font-weight: 300;'><?php  echo $msj; ?>  </label>  </div>
<?php } ?>

<div class="row">
  <div class="col-xs-12">
       <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
              <div class="box-title" style="font-weight: 800;font-size:20px;">AMPLIAR INFO<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button></div>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              

                <div class="row">
  <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon">Ha</span>

             <div class="info-box-content">
                            <span class="info-box-text">Total Hectareas Agricultores</span>
                            <span class="info-box-number"><?php echo number_format($areas, 0, ',', '.');?></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
                        </div>
              </div>
          </div>
 </div>
  <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon"><i class="glyphicon glyphicon-leaf"></i></span>

             <div class="info-box-content">
                            <span class="info-box-text">Total Fincas</span>
                            <span class="info-box-number"><?=count( $fincas);?></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
                        </div>
              </div>
          </div>
 </div>
   <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon"><i class="glyphicon glyphicon-map-marker"></i></span>

             <div class="info-box-content">
                            <span class="info-box-text">Total Visitas Técnicas</span>
                            <span class="info-box-number"><?=count($visitastecnicasusuario);?></span>
                        <div class="progress">
                        <!--  <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>-->
                        </div>
              </div>
          </div>
 </div>

    <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon"><i class="glyphicon glyphicon-screenshot"></i></span>

             <div class="info-box-content">
                            <span class="info-box-text"># Visitas(promedio)/Finca</span>
                            <span class="info-box-number">
                                <?php  if (count($fincas)==0){ ?>
                                          0
                                  <?php } else {   ?>
                                        <?php echo number_format(count($visitastecnicasusuario)/count( $fincas));?>
                                <?php } ?>
                              </span>
                        <div class="progress">
                          <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
                        </div>
              </div>
          </div>
 </div>

            </div>
            <!-- /.box-body -->
          </div>



</div>

<div class="row docs-premium-template">
                     <div class="col-md-12">
                      <small>Producto Recomendado</small>
                      <div class="box-header with-border"><br/>

                       <div class="col-md-5">
                        <div class="media">
                            <div class="media-left">
                               
                            </div>
                            <div class="media-body">
                              
                                <div class="clearfix">
                                  
                                </div>
                                     <p class="pull-right">
                                     
                                    </p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-7">
                            
                      </div>
</div>

<style>
.box-header.with-border {
    border: 1px solid #eee;
    border-radius: 3px;
}
</style>
          
<br>

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
               <?php

               $subtotal_valorizacion=0;
                foreach($usuariosempresa as $usuariovisita) {
                    foreach($usuariovisita->visitatecnica as $visitatecnica) {  
                          $subtotal_valorizacion+=$visitatecnica->suma_valorizacion_visita($visitatecnica->id); 
                           ?>
                           <?php } ?>
                           <?php } ?>
                 <h4>$<?php echo number_format($subtotal_valorizacion, 0, ',', '.'); ?></h4>

              <p>Valorización Total</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{asset('reporteproductos')}}" class="small-box-footer">
              Más Info<i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
                    <div class="inner">
               <?php

               $subtotal_ha=0;
                foreach($usuariosempresa as $usuariovisita) {
                    foreach($usuariovisita->visitatecnica as $visitatecnica) {  
                          $subtotal_ha+=$visitatecnica->hectareas; 
                           ?>
                           <?php } ?>
                           <?php } ?>
                 <h4><?php echo number_format($subtotal_ha, 0, ',', '.'); ?></h4>

              <p>Ha Recomendadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{asset('mapa-visitastecnicas')}}" class="small-box-footer">
              Más Info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4><?=$cant_agricultores;?></h4>

              <p>Agricultores en total</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{asset('listado_todos_prospectos_comercial')}}" class="small-box-footer">
              Más Info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php  if ($subtotal_ha==0){   ?>
                          
                <h4>$<?php echo number_format($subtotal_valorizacion, 0, ',', '.'); ?></h4>

                    <?php } else {   ?>      
                         
                <h4>$<?php echo number_format($subtotal_valorizacion/$subtotal_ha, 0, ',', '.'); ?></h4>

                         
            <?php } ?>
            

              <p>$ recomendados/Ha</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{asset('geo-marketing')}}" class="small-box-footer">
              Más Info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>

<div class="row docs-premium-template">
   <div class="col-md-8">
<div class="box box-primary">

    <div class="callout callout-info"><h3 class="box-title">Reporte Consolidado de Visitas Técnicas Ejecutadas en Campo para la Empresa: </h3>
        

             <div class="bg-yellow2">
                 <div class="widget-user-image">
                    <?php  if ($empresa->imglogo==NULL) {   ?>
                          
                                 <a><img class="img-circle" src="https://www.agronielsen.com/encampo/public/imagenes/logo-agronielsen-presentacion.png" style="height: auto; width: auto; max-width: 154px; max-height: 98px;background:#fff;padding:10px"></a>

                    <?php } else {   ?>      
                         
            <a><img class="img-circle" src="<?=$empresa->imglogo?>" alt="<?=$empresa->nombreempresa?>"></a>
             
                        <?php } ?>
             </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?=$empresa->nombreempresa?></h3>
              <h5 class="widget-user-desc">Cantidad Usuarios: <?=count($usuariosempresa)?></h5>
            </div>
          </div>

    <style>
    .img-circle {
    width: 215px;
    height: auto;
    float: left;
    padding:10px;
                }

    .bg-yellow2 {
    padding: 20px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #4267b2 !important;
}
</style>


</div>
     <div class="box-body">              
       <table id="lista_prospectos" class="display responsive no-wrap" cellspacing="0" width="100%">
     
          <thead>
            <tr>
               
                
                <!--1--><th style="width:10px">Agricultor</th>
                <!--2--><th style="width:10px">Finca</th>
                <!--3--><th style="width:10px">Cultivo</th>
                <!--4--><th style="width:10px"># Ha</th>
                        <th style="width:10px">Valorización($)</th>
                <!--5--><th>Realizada por</th>
                <!--6--><th>Fecha</th>
                        <th>Detalles</th>
                <!--1--><th style="width:10px">idvisita</th>

               
            </tr>
        </thead>
             @foreach($usuariosempresa as $usuariovisita)
               @foreach($usuariovisita->visitatecnica as $visitatecnica)
                      <tr role="row" class="odd"  >
                      <td><?=$visitatecnica->agricultor->agricultor; ?></td>
                      <td><?=$visitatecnica->finca->finca; ?></td>
                      <td><?=$visitatecnica->cultivo->cultivo; ?></td>
                      <td><?=$visitatecnica->hectareas; ?></td>
                      <td>$<?=number_format($visitatecnica->suma_valorizacion_visita($visitatecnica->id), 0, ',', '.'); ?></td>
                      <td><?=$visitatecnica->usuario->nombres." ".$visitatecnica->usuario->apellidos; ?></td>
                      <td><?=$visitatecnica->created_at; ?></td>
                      <td><a href="javascript:void(0);"onclick="mostrarvisita(<?= $visitatecnica->id; ?>);" style="display:block"><h4><span class="label label-warning" >Detalles</span></h4></a>          
                      </td>
                      <td><?=$visitatecnica->id; ?></td>
                      </tr>
                                            
              @endforeach 
      
      @endforeach
      </table> 
      </div>


<br/>



</div>


   <div class="col-md-4">
    <div class="callout callout-info-gris">
                <h4 style="color:#333">Visitas Recientes</h4>
         <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">                                  
                      @foreach($usuariosempresa as $usuariovisita)
                        @foreach($usuariovisita->visitatecnica as $visitatecnica)    
                          <?php  if($visitatecnica->imagen1==!"" || $visitatecnica->imagen2==!"") { ?>
                                <div class="item active">
                                   <img class="img-responsive pad" src="https://www.agronielsen.com/encampo/storage/<?=$visitatecnica->imagen1?>" alt="">
                                   <img class="img-responsive pad" src="https://www.agronielsen.com/encampo/storage/<?=$visitatecnica->imagen2?>" alt="">
                                </div>
                          <?php   } ?>
                        @endforeach
                     @endforeach
                </div>
            </div>
            
                                                                 <style>


.img-responsive:hover {
    transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
      </div>


          <div class="callout-info-gris">
               <a href="fotovisitastecnicas" class="nbtn-two">Ver Banco de Fotos</a>
          </div>  
    </div>
</body>


<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->


     
@endsection

@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_prospectos').DataTable( {
        "order": [[ 8, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
                                   } );
    //     responsive: {
    //    details: true
    //} 
                          } );
</script>


<style>
    .h4, h4 {
    font-size: 23px;
    letter-spacing: -2px;
}

    .nbtn-two {
    background: #3224af;
    border-radius: 6px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    font-size: 20px;
    padding: 9px 28px;
  
    
}
</style>

<style>

     .callout-info-gris {
    background-color: #eee !important;
    text-decoration: none;
}

.callout a {
    color: #fff;
    text-decoration: none;
}
</style>



@endsection


