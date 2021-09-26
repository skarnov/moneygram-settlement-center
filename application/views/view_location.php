<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Shop Location </h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>evis_app/manage_shop">Manage Shop</a></li>
                <li class="active">View Shop Location</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                    <div class="col-md-8">
                        <script src="https://maps.googleapis.com/maps/api/js"></script>
                        <script>
                            function initialize() {
                                var mapCanvas = document.getElementById('map');
                                var mapOptions = {
                                    center: new google.maps.LatLng(<?php echo $shop_info->location; ?>),
                                    zoom: 8,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                }
                                var map = new google.maps.Map(mapCanvas, mapOptions)
                            }
                            google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                        <div id="map"></div>
                    </div>
                    <div class="col-md-4">
                        <h2><?php echo $shop_info->name; ?></h2>
                        <address>
                            <?php echo $shop_info->address; ?>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>