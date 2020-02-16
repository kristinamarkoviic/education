<div class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

    <div
            class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box nicdark_bg_grey nicdark_border_bottom_1_solid_grey nicdark_text_align_center">


        <h3 class=""><strong>Insert Course</strong></h3>
    </div>
    <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">

<form action="index.php?page=insert_course" method="POST" enctype="multipart/form-data">
    <!--        Title-->
    <div class="nicdark_section">
        <div
            class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
            <input
                class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                type="text" name="title_insert" placeholder="Title">
        </div>

    </div>

    <!--        Description-->
    <div class="nicdark_section">
        <div
            class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
                                <textarea rows="4"
                                          class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                                          placeholder="Description" name="description_insert"></textarea>
        </div>
    </div>

    <!--        YouTube link-->
    <div class="nicdark_section">
        <div
            class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
            <input
                class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                type="text" name="youtube_insert" placeholder="YouTube Link">
        </div>

    </div>

    <!--        Time link-->
    <div class="nicdark_section">
        <div
            class="nicdark_width_100_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left">
            <input
                class="nicdark_padding_left_0 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0"
                type="text" name="time_insert" placeholder="Duration Time">
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
                <option value="<?= $kategorija->idKategorija; ?>"><?= $kategorija->naziv; ?></option>

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
                    <option value="<?= $teacher->idTeacher; ?>"><?= $teacher->ime_prezime; ?></option>

                <?php endforeach; ?>
            </select>

        </div>

    </div>

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
                    href="contact-1.html">ADD NOW</button>
        </div>
    </div>
</form>


    </div>

</div>