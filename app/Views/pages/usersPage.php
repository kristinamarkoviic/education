<div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center" style="background-image:url(public/img/parallax/img39.jpg);">

                    <div class="nicdark_section nicdark_bg_greydark_alpha_gradient_2">

                       <!--start nicdark_container-->
                        <div class="nicdark_container nicdark_clearfix">

                            <div class="nicdark_section nicdark_height_200"></div>
                                <div class="grid grid_12">
                                 <strong class="nicdark_color_white nicdark_font_size_60 nicdark_first_font">My Account</strong>
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
                                <img alt="" class="nicdark_margin_left_10 nicdark_margin_right_10" width="10" src="public/img/icons/icon-next-grey.svg">
                                <a href="#">My Page</a>
                                <img alt="" class="nicdark_margin_left_10 nicdark_margin_right_10" width="10" src="public/img/icons/icon-next-grey.svg">
                                <a href="#"><?=$_SESSION['user']->ime ?></a>
                            </div>
                        </div>
                        <!--end container-->
                    </div>
                <div class="nicdark_section nicdark_height_50"></div>
                <!--MAIN DEO PROFILE USERA -->
                <div class="nicdark_section">

                        <!--start nicdark_container-->
                        <div class="nicdark_container nicdark_clearfix">

                            <div class="grid grid_4">
                                <div class="nicdark_section nicdark_box_sizing_border_box">
                                    <!--start preview-->
                                    <div class="nicdark_section ">
                                                    <div class="nicdark_section nicdark_box_sizing_border_box">
                                            
                                                <div class="nicdark_section nicdark_bg_greydark">
                                                    <table class="nicdark_section ">
                                                        <tbody>
                                                           
                                                           <tr class="">
                                                                <td class="nicdark_padding_30">  
                                                                    <h5 class="nicdark_font_size_13 nicdark_text_transform_uppercase nicdark_color_grey">First Name</h5>
                                                                    <div class="nicdark_section nicdark_height_5"></div>
                                                                    <p class="nicdark_color_white nicdark_line_height_16"><?=$_SESSION['user']->ime ?></p>
                                                                </td>
                                                                <td class="nicdark_padding_30">
                                                                    <h5 class="nicdark_font_size_13 nicdark_text_transform_uppercase nicdark_color_grey">Last Name</h5>
                                                                    <div class="nicdark_section nicdark_height_5"></div>
                                                                    <p class="nicdark_color_white nicdark_line_height_16"><?=$_SESSION['user']->prezime ?></p>    
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table> 
                                                </div>

                                                <div class="nicdark_section nicdark_border_1_solid_grey nicdark_padding_20 nicdark_box_sizing_border_box">

                                                    <table class="nicdark_section">
                                                        <tbody>
                                                           
                                                           <tr class="">
                                                                <td class="nicdark_padding_10">  

                                                                    <div class="nicdark_display_table nicdark_float_left">
                                            
                                                                        <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
                                                                            <img alt="" class="nicdark_margin_right_20" width="25" src="public/img/icons/icon-email-grey.svg">
                                                                        </div>

                                                                        <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
                                                                            <h5 class="nicdark_font_size_13 nicdark_text_transform_uppercase"><strong>Email</strong></h5>
                                                                            <div class="nicdark_section nicdark_height_5"></div>
                                                                            <p><?=$_SESSION['user']->email ?></p>
                                                                        </div>

                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table> 
                                                </div>
                                                

                                            </div>
<div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box nicdark_bg_white ">
    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left nicdark_text_align_center">
                                                    <a class="nicdark_display_inline_block nicdark_color_white nicdark_bg_orange nicdark_box_sizing_border_box nicdark_width_100_percentage nicdark_first_font nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13" href="index.php?page=logout">LOGOUT</a>
                                                </div> 
                                                
                                            </div>



                                        </div>
                                                <!--start preview-->

                                        </div>

                            </div>


                            <div class="grid grid_8">

                                <div class="nicdark_section">


                                    <!--START tab-->
                                    <div class="nicdark_tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
                                        <ul class="nicdark_list_style_none nicdark_margin_0 nicdark_padding_0 nicdark_section nicdark_border_bottom_2_solid_grey ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                            <li class="nicdark_display_inline_block ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="true" aria-expanded="true">
                                                <h4>
                                                    <a class="nicdark_outline_0 nicdark_padding_20 nicdark_padding_right_10 nicdark_display_inline_block nicdark_first_font nicdark_color_greydark ui-tabs-anchor" href="#tabs-3" role="presentation" tabindex="-1" id="ui-id-3">My Courses</a> 
                                                    <a class="nicdark_display_inline_block nicdark_bg_grey nicdark_margin_right_20 nicdark_border_1_solid_grey nicdark_first_font nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13" href="#"><?= count($data['korisnik_kursevi']) ?></a>
                                                </h4>
                                            </li>
                                        </ul>

                                        <div class="nicdark_section nicdark_height_20"></div>
                                        <div class="nicdark_section ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-3" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="false" style="display: block;">

                                            <div class="nicdark_section nicdark_box_sizing_border_box nicdark_overflow_hidden nicdark_overflow_x_auto nicdark_cursor_move_responsive">

                                                <table class="nicdark_section">
                                                    <thead>
                                                        <tr class="">
                                                            <td class=" nicdark_width_25_percentage">
       
                                                            </td>
                                                            <td class=" nicdark_width_55_percentage">   
                                                            </td>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($data['korisnik_kursevi'] as $kurs) :?>
                                                        <tr class="nicdark_border_bottom_2_solid_grey">
                                                            <td class="nicdark_padding_20">
                                                                <a href="index.php?page=single_kurs&id=<?= $kurs->idKurs ?>">
                                                                <img alt="<?=$kurs->naziv?>" class="nicdark_section" src="public/img/courses_img/<?=$kurs->slika?>">   
                                                                </a>
                                                            </td>
                                                            <td class="nicdark_padding_20"> 
                                                                <a href="index.php?page=single_kurs&id=<?= $kurs->idKurs ?>">
                                                                <h3 ><strong><?= $kurs->naziv ?></strong></h3> 
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                    
                        </div>
                        <!--end container-->

                    </div>
                    <!--END MAIN DEO PROFILE USER -->
                    <div class="nicdark_section nicdark_height_40"></div>