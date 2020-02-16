<div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center" style="background-image:url(public/img/parallax/img41.jpg);">

<div class="nicdark_section nicdark_bg_greydark_alpha_gradient_2">
<div class="nicdark_container nicdark_clearfix">
<div class="nicdark_section nicdark_height_200"></div>
<div class="grid grid_12">
<strong class="nicdark_color_white nicdark_font_size_60 nicdark_font_size_40_responsive nicdark_first_font">Logs</strong>
<div class="nicdark_section nicdark_height_20"></div>
</div>
</div>
<!--end container-->
</div>
</div>
<div class="nicdark_container nicdark_clearfix">
<div class="nicdark_width_100_percentage nicdark_width_100_percentage_all_iphone nicdark_float_left">
    <div class="nicdark_section nicdark_height_20"></div>
    <h1 style="padding-left: 18px">Active Users</h1>
<table class="nicdark_section">
       <thead>
       <tr class="nicdark_border_bottom_1_solid_grey">
            <td class="nicdark_padding_20 nicdark_width_20_percentage">
                <h6 class="nicdark_text_transform_uppercase">Name</h6>    
            </td>
            <td class="nicdark_padding_20 nicdark_width_20_percentage">
                <h6 class="nicdark_text_transform_uppercase">Email</h6>    
            </td>
            <td class="nicdark_padding_20 nicdark_width_20_percentage">
                <h6 class="nicdark_text_transform_uppercase">Ip adress</h6>    
            </td>
        </tr>
        </thead> 
        <tbody>
        <?php
            foreach($data['active_korisnici'] as $active):
        ?>
            <tr>
                <td class="nicdark_padding_20 nicdark_width_20_percentage">
                    <h6 class=""><?=$active->ime?> <?=$active->prezime ?></h6>    
                </td>
                <td class="nicdark_padding_20 nicdark_width_20_percentage">
                    <h6 class=""><?=$active->email ?></h6>    
                </td>
                <td class="nicdark_padding_20 nicdark_width_20_percentage">
                    <h6 class=""><?= $active->ipAdress ?></h6>    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>                                               
</table>
</div>
<div id="logTable" class="nicdark_width_100_percentage nicdark_width_100_percentage_all_iphone nicdark_float_left">
    <div class="nicdark_section nicdark_height_20"></div>
    <h1 style="padding-left: 18px">Logs</h1>
<table class="nicdark_section">
       <thead>
       <tr class="nicdark_border_bottom_1_solid_grey">
            <td class="nicdark_padding_20 nicdark_width_20_percentage">
                <h6 class="nicdark_text_transform_uppercase">Email</h6>    
            </td>
            <td class="nicdark_padding_20 nicdark_width_20_percentage">
                <h6 class="nicdark_text_transform_uppercase">Ip adress</h6>    
            </td>
            <td class="nicdark_padding_20 nicdark_width_20_percentage">
                <h6 class="nicdark_text_transform_uppercase">page</h6>    
            </td>
            <td class="nicdark_padding_20 nicdark_width_20_percentage">
                <h6 class="nicdark_text_transform_uppercase">Time</h6>    
            </td>
        </tr>
        </thead> 
        <tbody>
                <?php
                    foreach($data['log_korisnici'] as $log):
                ?>
                <tr>
                <td class="nicdark_padding_20 nicdark_width_20_percentage">
                    <h6 class=""><?=$log->email ?></h6>    
                </td>
                <td class="nicdark_padding_20 nicdark_width_20_percentage">
                    <h6 class=""><?= $log->ipAdress ?></h6>    
                </td>
                <td class="nicdark_padding_20 nicdark_width_20_percentage">
                    <h6 class=""><?= $log->page ?></h6>    
                </td>
                <td class="nicdark_padding_20 nicdark_width_20_percentage">
                    <h6 class=""><?= date("d F, Y -  H:i:s", strtotime($log->time)); ?></h6>    
                </td>
            </tr>
                <?php endforeach; ?>
        </tbody>                                               
</table>
</div>
</div>