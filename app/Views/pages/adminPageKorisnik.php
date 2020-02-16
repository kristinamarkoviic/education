<div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center_bottom" style="background-image:url(public/img/parallax/img32.jpg);">

                    <div class="nicdark_section nicdark_bg_greydark_alpha_gradient_2">

                        


                        <!--start nicdark_container-->
                        <div class="nicdark_container nicdark_clearfix">


                            <div class="nicdark_section nicdark_height_200"></div>


                            <div class="grid grid_6">


                               
                        
                                <div class="nicdark_section nicdark_height_20"></div>
                                

                            </div>




                            <div class="grid grid_6 nicdark_text_align_right nicdark_text_align_left_responsive nicdark_text_align_center_all_iphone">

                                <div class="nicdark_section nicdark_height_80 nicdark_display_none_all_responsive"></div>

                                <!-- <div class="nicdark_display_inline_block nicdark_text_align_center  nicdark_margin_right_40">
                                    <h1 class="nicdark_color_white nicdark_font_size_40 nicdark_font_size_20_all_iphone nicdark_line_height_20_all_iphone"><strong></strong></h1>
                                    <div class="nicdark_section nicdark_height_5"></div>
                                    <p class="nicdark_color_white nicdark_font_size_10_all_iphone">COURSES</p>
                                </div> -->

                                <div class="nicdark_display_inline_block nicdark_text_align_center nicdark_margin_right_40">
                                    <h1 class="nicdark_color_white nicdark_font_size_40 nicdark_font_size_20_all_iphone nicdark_line_height_20_all_iphone"><strong><?= count($data['korisnici']) ?></strong></h1>
                                    <div class="nicdark_section nicdark_height_5"></div>
                                    <p class="nicdark_color_white nicdark_font_size_10_all_iphone">USERS</p>
                                </div>

                                
                                 
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
                            <a href="#">Admin Page</a>
                            <img alt="" class="nicdark_margin_left_10 nicdark_margin_right_10" width="10" src="public/img/icons/icon-next-grey.svg">
                            <a href="index.php?page=adminPageKurs">INSERT COURSE</a>
                        </div>
                    </div>
                    <!--end container-->
                </div>
                <div class="nicdark_section">
                        <!--start nicdark_container-->
                        <div class="nicdark_container nicdark_clearfix">

                            <div class="nicdark_width_100_percentage nicdark_width_100_percentage_responsive nicdark_float_left">

                                <div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
                                    <!--START tab-->
                                        <div class="nicdark_tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
                                            <ul class="nicdark_list_style_none nicdark_margin_0 nicdark_padding_0 nicdark_section nicdark_border_bottom_2_solid_grey ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                                <li class="nicdark_display_inline_block ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true">
                                                    <h4>
                                                        <a class="nicdark_outline_0 nicdark_padding_20 nicdark_padding_right_10 nicdark_display_inline_block nicdark_first_font nicdark_color_greydark ui-tabs-anchor" href="#tabs-1" tabindex="-1" id="ui-id-1" role="presentation">USERS</a> 
                                                        <a class="nicdark_display_inline_block nicdark_bg_grey nicdark_margin_right_20 nicdark_border_1_solid_grey nicdark_first_font nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13" href="#"><?= count($data['korisnici']) ?></a>
                                                    </h4>
                                                </li>
                                                <li class="nicdark_display_inline_block ui-state-default ui-corner-top ui-tabs-active ui-state-active">
                                                    
                                                </li>
                                            </ul>

                                            
                                            

                                                <div class="nicdark_section nicdark_height_20"></div>

                                                
                                            
                                            
                                    <div class="nicdark_section ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false" style="display: block;">
                                            <div class="nicdark_width_50_percentage nicdark_float_left nicdark_width_100_percentage_all_iphone">
                                                <div class="nicdark_width_70_percentage nicdark_float_left">
                                                    <div class="nicdark_section nicdark_box_sizing_border_box nicdark_float_left nicdark_position_relative nicdark_padding_right_20">
                                                        <img alt="" class="nicdark_position_absolute nicdark_top_5 nicdark_left_0 nicdark_margin_top_5" width="15" src="public/img/icons/icon-pen.svg">
                                                        <input class="nicdark_padding_left_25 nicdark_border_width_2 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0" type="text" id="searchKorisnika" name="searchKorisnika"  placeholder="Type to search">
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="nicdark_section nicdark_height_20"></div>
                                                <div class="nicdark_section nicdark_box_sizing_border_box nicdark_overflow_hidden nicdark_overflow_x_auto nicdark_cursor_move_responsive">
                                                    <table class="nicdark_section">
                                                        <thead>
                                                            <tr class="nicdark_border_bottom_1_solid_grey">
                                                                <td class="nicdark_padding_10 nicdark_width_5_percentage">
                                                                    <h6 class="nicdark_text_transform_uppercase">id</h6>    
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_10_percentage nicdark_display_none_all_iphone">
                                                                <h6 class="nicdark_text_transform_uppercase ">first name</h6>
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_10_percentage">
                                                                    <h6 class="nicdark_text_transform_uppercase">last name</h6>    
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_15_percentage">
                                                                    <h6 class="nicdark_text_transform_uppercase">email</h6>    
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_20_percentage">
                                                                    <h6 class="nicdark_text_transform_uppercase">password</h6>    
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_15_percentage">
                                                                    <h6 class="nicdark_text_transform_uppercase">date of reg.</h6>    
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_10_percentage nicdark_text_align_center">
                                                                    <h6 class="nicdark_text_transform_uppercase">role</h6>    
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_10_percentage">
                                                                    <h6 class="nicdark_text_transform_uppercase nicdark_text_align_center">update</h6>    
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_width_5_percentage">
                                                                    <h6 class="nicdark_text_transform_uppercase">delete</h6>    
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="svi_korisnici">
                                                            
                                                            <?php
                                                            foreach($data['korisnici'] as $korisnik):
                                                            ?>
                                                            <tr class="nicdark_border_bottom_1_solid_grey">
                                                                <td class="nicdark_padding_10 nicdark_color_greydark">  
                                                                    <?= $korisnik->idKorisnik ?> 
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_color_greydark">  
                                                                    <?= $korisnik->ime ?> 
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_color_greydark">  
                                                                    <?= $korisnik->prezime ?> 
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_color_greydark">  
                                                                    <?= $korisnik->email ?> 
                                                                </td> 
                                                                <td class="nicdark_padding_10 nicdark_color_greydark">  
                                                                    <?= $korisnik->password ?> 
                                                                </td> 
                                                                <td class="nicdark_padding_10 nicdark_color_greydark">
                                                                    <?= date("d F, Y", strtotime($korisnik->registrovan_vreme)); ?>  
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_text_align_center 
                                                                nicdark_text_transform_uppercase nicdark_color_greydark">  
                                                                    <?= $korisnik->uloga ?> 
                                                                </td> 
                                                                <td class="nicdark_padding_10 nicdark_text_align_center">   
                                                                    <a class="update_korisnika nicdark_display_inline_block
                                                                    nicdark_color_white nicdark_bg_yellow
                                                                    nicdark_first_font nicdark_padding_8
                                                                    nicdark_border_radius_3
                                                                    nicdark_font_size_13" data-id="<?= $korisnik->idKorisnik ?>">UPDATE</a>
                                                                </td>
                                                                <td class="nicdark_padding_10 nicdark_text_align_center">  
                                                                    <a class="delete_korisnika nicdark_text_align_center" data-id="<?= $korisnik->idKorisnik ?>"><img alt="close_img" width="15"
                                                                        src="public/img/icons/icon-remove-red.svg">
                                                                    </a>
                                                                </td>
                                                            </tr>  
                                                            <?php endforeach; ?>
                                                            
                                                            </tbody>
                                                    </table>
                                                </div>
                                    

                                            </div>

                                            </div>
                                                            
                                            <div id="popupLogs">
                                                <p><a href="index.php?page=logs">SEE ALL LOGS</a></p>
                                            </div>
                                            
                                            <div id="popupInsert">
                                                <p>INSERT USER</p>
                                            </div>
                                            <div id="insertForm" class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

                                          <div class="nicdark_section nicdark_padding_20
                                          nicdark_box_sizing_border_box nicdark_bg_grey
                                          nicdark_border_bottom_1_solid_grey
                                          nicdark_text_align_center">
                                          <h3 class=""><strong>INSERT USER</strong>
                                          <p class="close_form">   
                                            <img alt="close_img" width="15" src="public/img/icons/icon-remove-red.svg">
                                         </p>
                                         </h3>
                                          </div>
                                          <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">
                                            <form method="POST" action="index.php?page=insert_user">
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="text" id="first_name_insert" name="first_name_insert" placeholder="First Name *">
                                                    </div>
                                                    
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="text" id="last_name_insert" name="last_name_insert" placeholder="Last Name *">
                                                    </div>
                                                    
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="email" id="email_insert" name="email_insert" placeholder="Email *">
                                                    </div>
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="password" id="password_insert" name="password_insert" placeholder="Password *">
                                                    </div>
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <a id="btnInsertUser" class="nicdark_display_inline_block
                                                        nicdark_text_align_center
                                                        nicdark_box_sizing_border_box
                                                        nicdark_width_100_percentage
                                                        nicdark_color_white nicdark_bg_green
                                                        nicdark_first_font nicdark_padding_10_20
                                                        nicdark_border_radius_3" 
                                                        href="#">INSERT NOW</a>            
                                                    </div>
                                                </div>
                                            </form>
                                        </div>  
                                    </div>

                        </div>
                    </div>
                    <div id="updateForm" class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

                    <div class="nicdark_section nicdark_padding_20
                            nicdark_box_sizing_border_box nicdark_bg_grey
                            nicdark_border_bottom_1_solid_grey
                            nicdark_text_align_center">
                        <h3 class=""><strong>UPDATE USER</strong>
                        <p class="close_form_update">   
                        <img alt="close_img" width="15" src="public/img/icons/icon-remove-red.svg">
                        </p>
                        </h3>
                        </div>
                        <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">
                                            <form method="POST" action="index.php?page=update_user">
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="text" id="first_name_update" name="first_name_update" placeholder="First Name *">
                                                    </div>
                                                    
                                                    <input type="hidden" id="hidden_update" name="hidden_update">
                                                    
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="text" id="last_name_update" name="last_name_update" placeholder="Last Name *">
                                                    </div>
                                                    
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="email" id="email_update" name="email_update" placeholder="Email *">
                                                    </div>
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="password" id="password_update" name="password_update" placeholder="Password *">
                                                    </div>
                                                </div>
                                                <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="number" id="uloga_update" name="uloga_update" placeholder="Enter 2 for USER, enter 1 for ADMIN ROLE">
                                                    </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <a id="btnUpdateUser" class="nicdark_display_inline_block
                                                        nicdark_text_align_center
                                                        nicdark_box_sizing_border_box
                                                        nicdark_width_100_percentage
                                                        nicdark_color_white nicdark_bg_green
                                                        nicdark_first_font nicdark_padding_10_20
                                                        nicdark_border_radius_3" 
                                                        href="#">UPDATE NOW</a>            
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        </div>
                                                            </div>
                                                            
