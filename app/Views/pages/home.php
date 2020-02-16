<div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center"
    style="background-image:url(public/img/parallax/img7.jpg);">

    <div class="nicdark_section nicdark_bg_greydark_alpha_gradient_5">


        <div class="nicdark_section nicdark_height_250"></div>

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix ">
        <div class="grid grid_12 nicdark_text_align_center">
             <strong
                    class="nicdark_color_white nicdark_font_size_70 nicdark_font_size_40_all_iphone nicdark_line_height_40_all_iphone nicdark_first_font">Find
                    the Best Courses</strong>
                <div class="nicdark_section nicdark_height_30"></div>
                <h3 class="nicdark_color_white nicdark_second_font">All the top courses – from our school and the best
                    our teachers.</h3>
                <div class="nicdark_section nicdark_height_60"></div>
                <div class="nicdark_section nicdark_height_150"></div>
            </div>
        </div>
        <!--end container-->
        <div class="nicdark_section nicdark_height_20"></div>
    </div>

</div>
<div class="nicdark_section nicdark_height_50"></div>

<div class="nicdark_section nicdark_height_50"></div>
<div class="nicdark_section ">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
        <div class="nicdark_width_100_percentage">
<!--START results-->
            <div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
                <div class="nicdark_section nicdark_box_sizing_border_box ">

                    <div class="nicdark_width_100_percentage nicdark_float_left">
                        <h2><strong>Showing all courses</strong></h2>
                    </div>


                    <div class="nicdark_section nicdark_height_10"></div>


                    <div class="nicdark_width_30_percentage nicdark_float_left nicdark_width_100_percentage_all_iphone">

                        <div class="nicdark_section nicdark_height_20"></div>

                        <div class="nicdark_width_70_percentage nicdark_float_left">
                            <div
                                class="nicdark_section nicdark_box_sizing_border_box nicdark_float_left nicdark_position_relative nicdark_padding_right_20">
                                <img alt=""
                                    class="nicdark_position_absolute nicdark_top_5 nicdark_left_0 nicdark_margin_top_5"
                                    width="15" src="public/img/icons/icon-pen.svg">
                                <input
                                    class="nicdark_padding_left_25 nicdark_border_width_2 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                                    type="text" id="searchFiled" name="searchFiled" placeholder="Course">
                            </div>
                        </div>
                        <div class="nicdark_width_30_percentage nicdark_float_left">
                            <div class="nicdark_float_left nicdark_width_100_percentage_all_iphone">
                                <input type="button" id="btnSearch" class="nicdark_bg_white_hover 
                                nicdark_color_green_hover nicdark_border_2_solid_green nicdark_transition_all_08_ease nicdark_display_inline_block nicdark_text_align_center nicdark_box_sizing_border_box nicdark_width_100_percentage nicdark_color_white
                                nicdark_bg_green nicdark_first_font nicdark_padding_10_20 nicdark_border_radius_3"
                                    href="courses.html" value="SEARCH"/>
                            </div>
                        </div>
                    </div>


                    <div
                        class="nicdark_width_70_percentage nicdark_float_left nicdark_text_align_right nicdark_width_100_percentage_all_iphone">

                        <div class="nicdark_section nicdark_height_20"></div>
                        
                        <div class="nicdark_section">
                            <a class="nicdark_display_inline_block nicdark_padding_8 nicdark_first_font nicdark_margin_right_10 nicdark_color_greydark nicdark_padding_left_0 text_kat">Categories :</a>
                            <?php foreach($data['kategorije'] as $kat): ?>
                                <a class="nicdark_display_inline_block nicdark_font_size_13 nicdark_border_1_solid_grey
                                nicdark_padding_8 nicdark_border_radius_3 nicdark_margin_10 kat" href="#" data-id="<?=$kat->idKategorija ?>"><?= $kat->naziv ?></a>
                            <?php endforeach; ?>
                        </div>

                </div>
            </div>
            <!--END results-->
             <div class="nicdark_width_100_percentage" id="svi_kursevi">
                <!--END preview-->

                         
            </div>
            <div class="nicdark_section nicdark_height_50"></div>
                <div class="nicdark_section nicdark_text_align_center">
                    <?php 
                        $broj_kurseva = count($data['kursevi']);
                        $broj_strana = ceil($broj_kurseva / 3);
                        for($i = 1; $i <= $broj_strana; $i++):
                    ?>
                        <a class="nicdark_display_inline_block nicdark_color_greydark nicdark_first_font
                        nicdark_padding_10 nicdark_font_size_20 linkPaginacija" href="#" data-i="<?= $i-1; ?>"><strong><?= $i ?></strong></a>
                    <?php endfor; ?>                              
                </div>      
        </div>
    </div>
</div>
