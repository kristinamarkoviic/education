<div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center"
    style="background-image:url(public/img/parallax/img17.jpg);">

    <div class="nicdark_section nicdark_bg_greydark_alpha_gradient_2">




        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">


            <div class="nicdark_section nicdark_height_200"></div>


            <div class="nicdark_width_50_percentage nicdark_width_100_percentage_all_iphone nicdark_float_left">



                <strong class="nicdark_color_white nicdark_font_size_40 nicdark_first_font">
                    <?= $data['singleKurs']->naziv ?>
                </strong>

                <div class="nicdark_section nicdark_height_20"></div>


                <div class="nicdark_display_table nicdark_float_left">
                    <img alt="" class="nicdark_margin_right_10 nicdark_display_table_cell nicdark_vertical_align_middle"
                        width="30" src="public/img/icons/icon-calendar.svg">
                    <h3 class=" nicdark_color_white nicdark_display_table_cell nicdark_vertical_align_middle">
                        <?= date("d F, Y", strtotime($data['singleKurs']->datum)); ?>
                    </h3>
                    <img alt=""
                        class="nicdark_margin_right_10 nicdark_margin_left_20 nicdark_display_table_cell nicdark_vertical_align_middle"
                        width="30" src="public/img/icons/icon-clock.svg">
                    <h3 class="nicdark_color_white nicdark_display_table_cell nicdark_vertical_align_middle ">
                        <?= $data['singleKurs']->vreme_trajanja ?>
                    </h3>
                </div>


                <div class="nicdark_section nicdark_height_20"></div>


            </div>
        </div>
        <!--end container-->
    </div>

</div>





<div class="nicdark_section nicdark_bg_grey nicdark_border_bottom_1_solid_grey">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div class="grid grid_12">



            <a href="index.php?page=home">Home</a>
            <img alt="" class="nicdark_margin_left_10 nicdark_margin_right_10" width="10"
                src="public/img/icons/icon-next-grey.svg">
            <a href="index.php?page=home">Courses</a>
            <img alt="" class="nicdark_margin_left_10 nicdark_margin_right_10" width="10"
                src="public/img/icons/icon-next-grey.svg">
            <a href="#"><?= $data['singleKurs']->naziv_kat ?></a>



        </div>


    </div>
    
    <!--end container-->

</div>




<div class="nicdark_section nicdark_height_50"></div>



<div class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <div
            class="nicdark_width_66_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">

            <div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
            
                <h1><?= $data['singleKurs']->naziv  ?></h1>
                <div class="nicdark_section nicdark_height_20"></div>


                <div class="nicdark_width_40_percentage nicdark_width_50_percentage_all_iphone nicdark_float_left">
                    <div class="nicdark_display_table nicdark_float_left">

                        <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
                            <img alt="" class="nicdark_margin_right_10 nicdark_border_radius_100_percentage" width="40"
                                src="public/img/avatar/<?= $data['singleKurs']->t_slika ?>">
                        </div>

                        <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
                            <p class="nicdark_font_size_13">Teacher / Vocation </p>
                            <div class="nicdark_section nicdark_height_5"></div>
                            <h5 class=""><?= $data['singleKurs']->ime_prezime ?> /  <?= $data['singleKurs']->zanimanje ?> </h5>
                        </div>

                    </div>
                </div>
                <div class="nicdark_width_25_percentage nicdark_width_50_percentage_all_iphone nicdark_float_left">

                    
                    <div class="nicdark_display_table nicdark_float_left">

                        <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
                            <img alt="" class="nicdark_margin_right_10" width="30"
                                src="public/img/icons/icon-category-grey.svg">
                        </div>

                        <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
                            <p class="nicdark_font_size_13">Category</p>
                            <div class="nicdark_section nicdark_height_5"></div>
                            <h5 class=""><?=$data['singleKurs']->naziv_kat ?></h5>
                        </div>

                    </div>
                </div>



                <div class="nicdark_section nicdark_height_20"></div>



                <div class="nicdark_section nicdark_position_relative">

                    <img width="770" height="433" alt="<?=$data['singleKurs']->naziv ?>" class="nicdark_section" src="public/img/courses_img/<?=$data['singleKurs']->slika ?>">

                    <div
                        class="nicdark_bg_greydark_alpha_gradient nicdark_position_absolute nicdark_left_0 nicdark_height_100_percentage nicdark_width_100_percentage nicdark_padding_20 nicdark_box_sizing_border_box">
                        <div class="nicdark_position_absolute nicdark_bottom_20">

                        <div class="nicdark_section">
                        <?php
                        foreach ($data['singleKurs']->jedan_level as $level):
                        ?>
                        <div class=" nicdark_margin_10 <?= $level->boja ?> nicdark_display_inline_block nicdark_border_radius_100_percentage nicdark_padding_20 nicdark_width_33 nicdark_height_33">
                            <a class="nicdark_tooltip_jquery" title="<?= $level->naziv_level ?>" href="#"><img alt="" class="" width="33" src="<?= $level->slika_level ?>"></a>
                        </div>
                        <?php endforeach; ?>
                        
                        
                            
                        <?php if(isset($_SESSION['user'])): ?>
                        
                        
                        <div class="nicdark_width_50_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                        <?php if(isset($data['singleKurs']->status->status)): ?>
                            <?php  if($data['singleKurs']->status->status == "follow"): ?>
                                
                                <?php var_dump($data['singleKurs']->status->status) ?>
                                <a href="#" class="nicdark_display_inline_block nicdark_text_align_center
                                nicdark_box_sizing_border_box nicdark_width_100_percentage
                                nicdark_color_white nicdark_bg_orange nicdark_first_font
                                nicdark_padding_10_20 nicdark_border_radius_3"
                                id="statusUnfollow" data-id="<?=$data['singleKurs']->idKurs ?>"
                                >UNFOLLOW</a>
                            <?php else: ?>
                                
                                <a href="#" class="nicdark_display_inline_block nicdark_text_align_center
                                nicdark_box_sizing_border_box nicdark_width_100_percentage
                                nicdark_color_white nicdark_bg_green nicdark_first_font
                                nicdark_padding_10_20 nicdark_border_radius_3"
                                id="statusFollow" data-id="<?=$data['singleKurs']->idKurs ?>">FOLLOW</a>
                            <?php endif; ?>     
                           
                            <?php else: ?>
                                <a href="#" class="nicdark_display_inline_block nicdark_text_align_center
                                nicdark_box_sizing_border_box nicdark_width_100_percentage
                                nicdark_color_white nicdark_bg_green nicdark_first_font
                                nicdark_padding_10 nicdark_border_radius_3 status"
                                id="statusFollow" data-id="<?=$data['singleKurs']->idKurs ?>">FOLLOW</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="nicdark_section nicdark_height_20"></div>
                        <?php if($_SESSION['admin']): ?>
                                <a class="nicdark_display_inline_block nicdark_text_align_center
                                nicdark_box_sizing_border_box nicdark_width_100_percentage
                                nicdark_color_white nicdark_bg_orange nicdark_first_font
                                nicdark_padding_10 nicdark_border_radius_3 status"
                                href="index.php?page=delete_kurs&id=<?=$data['singleKurs']->idKurs ?>"
                                >DELETE</a>
                                <div class="nicdark_section nicdark_height_20"></div>
                                <a class="nicdark_display_inline_block nicdark_text_align_center
                                nicdark_box_sizing_border_box nicdark_width_100_percentage
                                nicdark_color_white nicdark_bg_yellow nicdark_first_font
                                nicdark_padding_10 nicdark_border_radius_3 status"
                                href="index.php?page=update_course&idCourse=<?=$data['singleKurs']->idKurs ?>"
                                >UPDATE</a>
                                
                        <?php endif; ?>
                    </div>
                            
                            
                        
                    </div>

                        </div>

                    </div>

                </div>



                <div class="nicdark_section nicdark_height_40"></div>


                <div class="nicdark_section">


                    <!--START tab-->
                    <div class="nicdark_tabs">
                        <ul
                            class="nicdark_list_style_none nicdark_margin_0 nicdark_padding_0 nicdark_section nicdark_border_bottom_2_solid_grey">
                            <li class="nicdark_display_inline_block">
                                <h4><a class="nicdark_outline_0 nicdark_padding_20 nicdark_display_inline_block nicdark_first_font nicdark_color_greydark"
                                        href="#tabs-1">Descriptions</a></h4>
                            </li>
                            <li class="nicdark_display_inline_block">
                                <h4><a class="nicdark_outline_0 nicdark_padding_20 nicdark_display_inline_block nicdark_first_font nicdark_color_greydark"
                                        href="#tabs-2">Program</a></h4>
                            </li>
                        </ul>

                        <div class="nicdark_section nicdark_height_40"></div>

                        <div class="nicdark_section" id="tabs-1">
                            <h3><strong>Course Description</strong></h3>
                            <div class="nicdark_section nicdark_height_20"></div>
                            <p><?= $data['singleKurs']->opis ?></p>
                            <div class="nicdark_section nicdark_height_40"></div>
                            <div class="nicdark_section nicdark_height_30"></div>
                        </div>
                        <div class="nicdark_section" id="tabs-2">

                            <!--START program-->
                            <h3><strong>Our Program</strong></h3>
                            <div class="nicdark_section nicdark_height_30"></div>

                            <div class="nicdark_section">
                                <div class="nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_15 nicdark_box_sizing_border_box ">
                                    <div
                                        class="nicdark_width_15_percentage nicdark_width_100_percentage_responsive nicdark_float_left">

                                        <table>
                                            <tr>
                                                <td><img alt="" width="20" src="public/img/icons/icon-play-green.svg"></td>
                                                <td><span
                                                        class="nicdark_color_grey nicdark_first_font nicdark_font_size_12 nicdark_margin_left_10">VIDEO</span>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div
                                        class="nicdark_width_75_percentage nicdark_width_100_percentage_responsive nicdark_float_left">
                                        <h4 class="nicdark_padding_5 nicdark_second_font"><?=$data['singleKurs']->naziv ?></h4>
                                    </div>
                                    
                                </div>
                                <div>
                                    <?=$data['singleKurs']->youtube_link ?>
                                </div>


                            </div>

                            <!--END program-->

                        </div>
                       

                        </div>
                    </div>
                    <!--END tab-->
                </div>
            </div>


           


        </div>
        </div>
    <!--end container-->

</div>








<!--START related products-->
