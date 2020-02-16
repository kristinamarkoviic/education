
<div class="nicdark_section">

    <div class="nicdark_section nicdark_bg_green">
    <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">
            <div class="grid
            grid_6 nicdark_padding_botttom_10 nicdark_padding_top_10
            nicdark_text_align_center_responsive">
                <div class="nicdark_navigation_top_header_3">
                    <ul>
                        <li>

                            <img alt="" class="nicdark_margin_right_10" width="15" src="public/img/icons/icon-share-white.svg">
                            <a class=" nicdark_line_height_18 nicdark_color_white" href="index.php?page=contact">OUR SOCIAL</a>

                            <a target="_blank" href="https://sr-rs.facebook.com/"><img alt="fb"
                                    class="nicdark_margin_left_10  nicdark_margin_top_2 nicdark_display_none_all_responsive"
                                    width="12" src="public/img/icons/icon-facebook-white.svg"></a>
                            <a target="_blank" href="https://twitter.com/"><img alt="twitter"
                                    class="nicdark_margin_left_10  nicdark_margin_top_2 nicdark_display_none_all_responsive"
                                    width="12" src="public/img/icons/icon-twitter-white.svg"></a>
                            <a target="_blank" href="https://rs.linkedin.com/in/kristina-markovic-37731b185"><img alt="ln"
                                    class="nicdark_margin_left_10  nicdark_margin_top_2 nicdark_display_none_all_responsive"
                                    width="12" src="public/img/icons/icon-linkedin-white.svg"></a>
                            <a target="_blank" href="https://dribbble.com/kristinam"><img alt=""
                                    class="nicdark_margin_left_10  nicdark_margin_top_2 nicdark_display_none_all_responsive"
                                    width="12" src="public/img/icons/icon-pinterest-white.svg"></a>
                            <a target="_blank" href="https://www.instagram.com/kristina_markoviic/"><img alt=""
                                    class="nicdark_margin_left_10  nicdark_margin_top_2 nicdark_display_none_all_responsive"
                                    width="12" src="public/img/icons/icon-instagram-white.svg"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid grid_6
                nicdark_text_align_right
                nicdark_border_top_1_solid_greendark_responsive nicdark_text_align_center_responsive
                nicdark_padding_botttom_10
                nicdark_padding_top_10">
                <div class="nicdark_navigation_top_header_3" style="margin-right: -10px">
                    <ul>
                        <li>
                            <img alt="" class="nicdark_margin_right_10 nicdark_float_left" width="15"
                                src="public/img/icons/icon-user-white.svg">
                            <?php if(!isset($_SESSION['user'])): ?>
                            <a class="nicdark_color_white" id="linkLogin" href="#">LOGIN</a>
                            <?php endif; ?>

                            <?php if(isset($_SESSION['user'])): ?>
                                <?php if(($_SESSION['admin'])): ?>
                                    <a class="nicdark_color_white" href="index.php?page=adminPageKorisnik">ADMIN</a>
                                <?php else: ?>
                                    <a class="nicdark_color_white" href="index.php?page=usersPage">MY PAGE</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </li>
                        <li>
                            <img alt="" class="nicdark_margin_right_10 nicdark_float_left" width="15"
                                src="public/img/icons/icon-login-white.svg">

                                <?php if(!isset($_SESSION['user'])): ?>
                                <a class="nicdark_color_white" id="linkRegister" href="#">REGISTER</a>
                                <?php endif; ?>

                                <?php if(isset($_SESSION['user'])): ?>
                                <a class="nicdark_color_white" href="index.php?page=logout">LOGOUT</a>
                                <?php endif; ?>
                        </li>       
                        <div id="loginForm" class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

                            <div class="nicdark_section nicdark_padding_20
                            nicdark_box_sizing_border_box nicdark_bg_grey
                            nicdark_border_bottom_1_solid_grey
                            nicdark_text_align_center">
                            <h3 class=""><strong>LOGIN</strong>
                            <p class="remove_img">   
                            <img alt="close_img" width="15" src="public/img/icons/icon-remove-red.svg">
                            </p>
                            </h3>
                            </div>
                            <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">
                            <form method="POST" action="index.php?page=login">
                                <div class="nicdark_section">
                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                        nicdark_border_left_width_0"
                                        type="text" id="email_log" name="email_log" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="nicdark_section">
                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                        nicdark_border_left_width_0"
                                        type="password" id="password_log" name="password_log" placeholder="Password *">
                                    </div>
                                </div>
                                <div class="nicdark_section">
                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                        <input id="btnLogin" type="submit" name="btnLogin" class="nicdark_display_inline_block
                                        nicdark_text_align_center
                                        nicdark_box_sizing_border_box
                                        nicdark_width_100_percentage
                                        nicdark_color_white nicdark_bg_green
                                        nicdark_first_font nicdark_padding_10_20
                                        nicdark_border_radius_3" 
                                        value="LOGIN">         
                                    </div>
                                </div>
                            </form>
                        </div>  
                    </div>                                 
                    <div id="registerForm" class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

                                          <div class="nicdark_section nicdark_padding_20
                                          nicdark_box_sizing_border_box nicdark_bg_grey
                                          nicdark_border_bottom_1_solid_grey
                                          nicdark_text_align_center">
                                          <h3 class=""><strong>REGISTER</strong>
                                          <p class="remove_img">   
                                            <img alt="close_img" width="15" src="public/img/icons/icon-remove-red.svg">
                                         </p>
                                         </h3>
                                          </div>
                                          <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">
                                            <form method="POST" action="index.php?page=register">
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="text" id="first_name" name="first_name" placeholder="First Name *">
                                                    </div>
                                                    
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="text" id="last_name" name="last_name" placeholder="Last Name *">
                                                    </div>
                                                    
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="email" id="email" name="email" placeholder="Email *">
                                                    </div>
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <input class="nicdark_padding_left_0 nicdark_background_none
                                                        nicdark_border_top_width_0 nicdark_border_right_width_0 
                                                        nicdark_border_left_width_0"
                                                        type="password" id="password" name="password" placeholder="Password *">
                                                    </div>
                                                </div>
                                                <div class="nicdark_section">
                                                    <div class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                                        <a id="btnRegister" class="nicdark_display_inline_block
                                                        nicdark_text_align_center
                                                        nicdark_box_sizing_border_box
                                                        nicdark_width_100_percentage
                                                        nicdark_color_white nicdark_bg_green
                                                        nicdark_first_font nicdark_padding_10_20
                                                        nicdark_border_radius_3" 
                                                        href="#">REGISTER NOW</a>            
                                                    </div>
                                                </div>
                                            </form>
                                        </div>  
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        <!--end container-->
        </div>
</div>