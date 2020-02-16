<div class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

    <div
        class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box nicdark_bg_grey nicdark_border_bottom_1_solid_grey nicdark_text_align_center">


        <h3 class=""><strong>Update Course</strong></h3>
    </div>
    <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">

        <form action="index.php?page=do_update_course" method="POST">
            <input type="hidden" value="<?= $_GET['idCourse']; ?>" name="idCourse">
            <!--        Title-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                    <input
                        class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                        type="text" name="title_insert" value="<?= $data['singleKurs']->naziv ?>" placeholder="Title">
                </div>

            </div>

            <!--        Description-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                <textarea rows="4"
                                          class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                                          placeholder="Description" name="description_insert"><?= $data['singleKurs']->opis;  ?></textarea>
                </div>
            </div>

            <!--        YouTube link-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                    <input
                        class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                        type="text" name="youtube_insert" value="<?= $data['singleKurs']->youtube_link  ?>" placeholder="YouTube Link">
                </div>

            </div>

            <!--        Time link-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                    <input
                        class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                        type="text" name="time_insert" value="<?= $data['singleKurs']->vreme_trajanja ?>" placeholder="Duration Time">
                </div>

            </div>

            <!--        Category link-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                    <select name="category_insert"
                            class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0">
                        <option value="0">Choose Category</option>
                        <?php foreach ($data['kategorije'] as $kategorija): ?>
                            <?php if($kategorija->idKategorija == $data['singleKurs']->idKategorija): ?>
                                <option value="<?= $data['singleKurs']->idKategorija ?>" selected="selected"><?= $data['singleKurs']->naziv_kat; ?></option>
                            <?php else: ?>
                                <option value="<?= $kategorija->idKategorija; ?>"><?= $kategorija->naziv; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>

                </div>

            </div>

            <!--        Profesori link-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                    <select name="teachers_insert"
                            class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0">
                        <option value="0">Choose Teacher</option>
                        <?php foreach ($data['teachers'] as $teacher): ?>
                            <?php if($teacher->idTeacher == $data['singleKurs']->idTeacher): ?>
                                <option value="<?= $data['singleKurs']->idTeacher ?>" selected="selected"><?= $data['singleKurs']->ime_prezime; ?></option>
                            <?php else: ?>
                                <option value="<?= $teacher->idTeacher; ?>"><?= $teacher->ime_prezime ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>

                </div>

            </div>

            <!--        button-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                    <button type="submit" name="btnCourseInsert" class="nicdark_display_inline_block nicdark_text_align_center nicdark_box_sizing_border_box nicdark_width_100_percentage nicdark_color_white nicdark_bg_green nicdark_first_font nicdark_padding_10_20 nicdark_border_radius_3 "
                            href="contact-1.html">UPDATE INFO NOW</button>
                </div>
            </div>
        </form>


    </div>

</div>
<div class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

    <div
        class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box nicdark_bg_grey nicdark_border_bottom_1_solid_grey nicdark_text_align_center">


        <h3 class=""><strong>Update Course Photo</strong></h3>
    </div>
    <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">

        <form action="index.php?page=do_update_course_photo" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $_GET['idCourse']; ?>" name="idCourse">


            <!--        Photo link-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">Course Photo
                    <input
                        class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                        type="file" name="photo_insert">
                </div>

            </div>

            <!--        button-->
            <div class="nicdark_section">
                <div
                    class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                    <button type="submit" name="btnCourseInsert" class="nicdark_display_inline_block nicdark_text_align_center nicdark_box_sizing_border_box nicdark_width_100_percentage nicdark_color_white nicdark_bg_green nicdark_first_font nicdark_padding_10_20 nicdark_border_radius_3 "
                            href="contact-1.html">UPDATE PHOTO NOW</button>
                </div>
            </div>
        </form>


    </div>

</div>