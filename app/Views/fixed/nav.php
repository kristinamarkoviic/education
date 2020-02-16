<div class="nicdark_section nicdark_position_relative ">

    <div class="nicdark_section nicdark_bg_white">

        


        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix nicdark_position_relative">

            <div class="grid grid_12 nicdark_display_none_all_responsive">

                <div class="nicdark_section nicdark_height_10"></div>

                <!--LOGO-->
                <a href="index.php?page=home"><img alt="" class="nicdark_position_absolute nicdark_left_15 nicdark_top_20" width="170" src="public/img/logos/logo-elearning-color.svg"></a>
            


                <div class="nicdark_navigation_3 nicdark_text_align_right nicdark_float_right nicdark_display_none_all_responsive">
                    <ul>
                    <?php
                    foreach($data['menu'] as $menu):
                    ?>
                        <li><a href="index.php?<?= $menu->link ?> "> <?= $menu->naziv ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>

                </div> 


                

                <div class="nicdark_section nicdark_height_10"></div> 
                
            </div>




            <!--RESPONSIVE-->
            <div class="nicdark_width_50_percentage nicdark_text_align_center_all_iphone nicdark_width_100_percentage_all_iphone nicdark_float_left nicdark_display_none nicdark_display_block_responsive">
                <div class="nicdark_section nicdark_height_20"></div>
                <a href="index-2.html"><img alt="" width="170" class="" src="public/img/logos/logo-elearning-color.svg"></a>   
            </div>
            <div class="nicdark_width_50_percentage nicdark_width_100_percentage_all_iphone nicdark_float_left nicdark_display_none nicdark_display_block_responsive">
                <div class="nicdark_section nicdark_height_20"></div>
                <div class="nicdark_float_right nicdark_width_100_percentage nicdark_text_align_right nicdark_text_align_center_all_iphone">
                    
                    
                    <a class="nicdark_open_navigation_3_sidebar_content" href="#">
                        <img alt="" class="nicdark_margin_right_20" width="25" src="public/img/icons/icon-menu-grey.svg">
                    </a>

                    <div class="nicdark_position_relative nicdark_display_inline_block">
                        <a href="cart.html"><img alt="" width="25" src="public/img/icons/icon-cart-grey.svg"></a> 
                        <a class="nicdark_bg_green nicdark_color_white nicdark_padding_5 nicdark_border_radius_100_percentage nicdark_font_size_8 nicdark_line_height_5 nicdark_position_absolute nicdark_left_0 nicdark_top_10_negative nicdark_margin_left_20" href="#">2</a>
                    </div>
                </div>
                <div class="nicdark_section nicdark_height_20"></div>
            </div>
            <!--RESPONSIVE-->





        </div>
        <!--end container-->

    </div>

</div>