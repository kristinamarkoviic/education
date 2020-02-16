    <div class="nicdark_section nicdark_bg_greydark">

        <div class="nicdark_section nicdark_height_50"></div>

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">


            <div class="grid grid_12 nicdark_text_align_center">

                <div class="nicdark_section">
                    <a href="index.php?page=home"><img alt="" width="200" class=""
                        src="public/img/logos/logo-elearning-white.svg"></a>
                        <a target="_blank" href="">Dokumentacija sajta</a>
                </div>

                <div class="nicdark_section nicdark_height_20"></div>

                <div class="nicdark_display_inline_block">
                    <a target="_blank" href="https://sr-rs.facebook.com/"><img alt="" width="40" class="nicdark_margin_right_10"
                            src="public/img/icons/icon-facebook-circle.svg"></a>
                    <a target="_blank" href="https://twitter.com/"><img alt="" width="40" class="nicdark_margin_right_10"
                            src="public/img/icons/icon-twitter-circle.svg"></a>
                    <a target="_blank" href="https://dribbble.com/kristinam"><img alt="" width="40" class="nicdark_margin_right_10"
                            src="public/img/icons/icon-pinterest-circle.svg"></a>
                    <a target="_blank" href="https://rs.linkedin.com/in/kristina-markovic-37731b185"><img alt="" width="40" class="nicdark_margin_right_10"
                            src="public/img/icons/icon-linkedin-circle.svg"></a>
                </div>

            </div>

        </div>
        <!--end container-->

        <div class="nicdark_section nicdark_height_50"></div>

    </div>

    <div class="nicdark_section nicdark_bg_greydark">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix nicdark_border_top_1_solid_greydark">


            <div class="grid grid_6 nicdark_text_align_center_responsive">
                <a target="_blank" href="https://rs.linkedin.com/in/kristina-markovic-37731b185"><p class="nicdark_color_grey nicdark_font_size_14">© Copyright 2020 Kristina Markovic 185/17</p>
                </a>
            </div>

            <div
                class="grid grid_6 nicdark_text_align_right nicdark_text_align_center_responsive nicdark_border_top_1_solid_greydark_responsive nicdark_display_none_all_iphone">

                <div class="nicdark_navigation_copyright">
                <ul>
                    <?php
                    foreach($data['menu'] as $menu):
                    ?>
                        <li><a href="index.php?<?= $menu->link ?> "> <?= $menu->naziv ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>

            </div>


        </div>
        <!--end container-->

    </div>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="public/js/main.js"></script>
    <script src="public/js/nicdark_plugins.min.js"></script>

    </body>

    </html>