$(document).ready(function() {
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        duration: "fast"
    });

    function resetName(className) {
        const elementClass = document.querySelector(className);
        Array.from(elementClass.children).forEach(function(eClass, i) {
            Array.from(eClass.querySelectorAll('input')).forEach(function(eInput) {
                let nameInput = eInput.name.split('[').join(',').split(']').join('').split(',');
                nameInput = `${nameInput[0]}[${i+1}][${nameInput[2]}]`;
                eInput.name = nameInput;
            })
            Array.from(eClass.querySelectorAll('select')).forEach(function(eOption) {
                let nameOption = eOption.name.split('[').join(',').split(']').join('').split(',');
                nameOption = `${nameOption[0]}[${i+1}][${nameOption[2]}]`;
                eOption.name = nameOption;
            })
        });
    }
    datepickerYear();

    function datepickerYear() {
        $(".datepicker-year").datepicker({
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            yearRange: '1950:2020',
            dateFormat: 'yy',
            onClose: function(dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 0, 1));
            }
        });
        $(".datepicker-year").focus(function() {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });
    }
    $('.add-language').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tên ngoại ngữ
                        </header>
                        <input type="text" name="language[1][name]"
                            class="form-control " aria-describedby="helpId"
                            >
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Trình độ</header>
                        <input type="text" name="language[1][level]"
                            class="form-control" aria-describedby="helpId"
                            >
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3">
                    <i class="far fa-window-close language-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i>
                </div>
            </div>
            `;
            $('.language').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.language');
        }
    });
    $('.language').on('click', '.language-close', function() {
        let add = $('.add-language');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.language');
        }
    })
    $('.add-work-process').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group d-flex">
                        <div>
                            <header class="blockquote-header">Thời gian</header>
                            <input type="text" name="work[1][timeBefor]"
                                class="form-control datepicker-year"
                                aria-describedby="helpId"
                                required>
                        </div>
                        <label class="mt-4 ml-3 mr-3">đến</label>
                        <div>
                            <header class="blockquote-header">đến năm</header>
                            <input type="text" name="work[1][timeEnd]"
                                class="form-control datepicker-year"
                                aria-describedby="helpId"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Vị trí công tác</header>
                        <input type="text" name="work[1][workplace]"
                            class="form-control" aria-describedby="helpId"
                            required>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Lĩnh vực chuyên môn</header>
                        <input type="text" name="work[1][specialize]"
                            class="form-control" aria-describedby="helpId"
                            required>
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Đơn vị công tác</header>
                        <input type="text" name="work[1][unit]" class="form-control"
                            aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close work-process-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.work-process').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.work-process');
        }
    });
    $('.work-process').on('click', '.work-process-close', function() {
        let add = $('.add-work-process');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.work-process');
        }
    })

    $('.add-science').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tên đề tài</header>
                        <input type="text" name="science[1][name]" class="form-control "
                            aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Cấp quản lý
                        </header>
                        <input type="text" name="science[1][level]" class="form-control"
                            aria-describedby="helpId" required>
                    </div>
                </div>

                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thời gian</header>
                        <input type="text" name="science[1][time]"
                            class="form-control datepicker-year"
                            aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-12 col-lg ">
                    <div class="form-group">
                        <header class="blockquote-header">Vai trò dự án
                        </header>
                        <select class="custom-select expense" id="inputGroupSelect02"
                            name="science[1][position]">
                            <option value="Chủ nhiệm">Chủ nhiệm</option>
                            <option value="Tham gia">Tham gia</option>
                        </select>
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tình trạng</header>
                        <select class="custom-select expense" id="inputGroupSelect02"
                            name="science[1][status]">
                            <option value="Đã nghiệm thu- xếp loại Khá">Đã nghiệm thu- xếp loại Khá</option>
                            <option value="Đã nghiệm thu- xếp loại Tốt">Đã nghiệm thu- xếp loại Tốt</option>
                            <option value="Chưa nghiệm thu">Chưa nghiệm thu</option>
                        </select>
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close science-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.science').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.science');
        }
    });
    $('.science').on('click', '.science-close', function() {
        let add = $('.add-science');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.science');
        }
    });

    $('.add-guide').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg-2">
                    <div class="form-group">
                        <header class="blockquote-header">Tên luận văn, luận án</header>
                        <input type="text" name="guide[1][nameTopic]"
                            class="form-control " aria-describedby="helpId"
                            >
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <header class="blockquote-header">Tên sinh viên</header>
                        <input type="text" name="guide[1][nameStudent]"
                            class="form-control" aria-describedby="helpId"
                            >
                    </div>
                </div>
                <div class="col-12 col-lg-2">
                    <div class="form-group">
                        <header class="blockquote-header">Bậc đào tạo</header>
                        <input type="text" name="guide[1][level]" class="form-control"
                            aria-describedby="helpId"
                            >
                    </div>
                </div>
                <div class="col-12 col-lg-2">
                    <div class="form-group">
                        <header class="blockquote-header">Sản phẩm của đề tài/dự án</header>
                        <input type="text" name="guide[1][product]" class="form-control"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Năm tốt nghiệp</header>
                        <input type="text" name="guide[1][time]"
                            class="form-control datepicker-year"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3">
                    <i class="far fa-window-close guide-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i>
                </div>
            </div>
            `;
            $('.guide').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.guide');
        }
    });
    $('.guide').on('click', '.guide-close', function() {
        let add = $('.add-guide');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.guide');
        }
    });

    $('.add-document').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tên sách
                        </header>
                        <input type="text" name="document[1][name]" class="form-control"
                            aria-describedby="helpId"
                            required>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nhà suất bản</header>
                        <input type="text" name="document[1][publisher]"
                            class="form-control" aria-describedby="helpId"
                            required>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Vai trò</header>
                        <select class="custom-select expense" id="inputGroupSelect02"
                            name="document[1][position]">
                            <option value="Tác giả">Tác giả</option>
                            <option value="Tham gia">Tham gia</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Số hiệu ISBN</header>
                        <input type="text" name="document[1][code]"
                            class="form-control" aria-describedby="helpId"
                            required>
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Năm xuất bản</header>
                        <input type="text" name="document[1][time]"
                            class="form-control  datepicker-year"
                            aria-describedby="helpId"
                            required>
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close document-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.document').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.document');
        }
    });
    $('.document').on('click', '.document-close', function() {
        let add = $('.add-document');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.document');
        }
    })

    $('.add-article').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="pt-2 border-bottom border-info pt-3">
                <div class="row">
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Nơi đăng bài viết</header>
                            <select class="custom-select expense" id="inputGroupSelect02" name="article[1][on]">
                                <option value="journal">Đăng trên tạp chí</option>
                                <option value="seminor">Đăng trên kỷ yếu hội nghị, hội thảo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tên tác giải</header>
                            <input type="text" name="article[1][nameAuthor]"
                                class="form-control" aria-describedby="helpId"
                            required>
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tên bài viết</header>
                            <input type="text" name="article[1][namePost]"
                                class="form-control" aria-describedby="helpId"
                            required>
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tên tạp chí/ hội nghị/ hội thảo</header>
                            <input type="text" name="article[1][nameEvent]"
                                class="form-control" aria-describedby="helpId"
                            required>
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Trang bài viết</header>
                            <input type="text" name="article[1][page]"
                                class="form-control" aria-describedby="helpId"
                            required>
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Năm xuất bản</header>
                            <input type="text" name="article[1][time]"
                                class="form-control datepicker-year"
                                aria-describedby="helpId"
                            required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Sản phẩm của đề tài/dự án</header>
                            <input type="text" name="article[1][product]"
                                class="form-control" aria-describedby="helpId"
                            required>
                        </div>
                    </div>
                    <div class="col-11 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Số hiệu ISSN/ ISBN</header>
                            <input type="text" name="article[1][code]"
                                class="form-control" aria-describedby="helpId"
                            required>
                        </div>
                    </div>
                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close article-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                </div>
            </div>
            `;
            $('.article').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.article');
        }
    });
    $('.article').on('click', '.article-close', function() {
        let add = $('.add-article');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.article');
        }
    })
    $('.add-student-awards').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="pt-2 border-bottom border-info pt-3">   
                <div class="row">
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tên đề tài</header>
                            <input type="text" name="studentAwards[1][nameTopic]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Họ và tên sinh viên</header>
                            <input type="text" name="studentAwards[1][nameStudent]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Kết quả giải thưởng</header>
                            <input type="text" name="studentAwards[1][result]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Cấp thưởng</header>
                            <input type="text" name="studentAwards[1][prize]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-11 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Năm đạt giải</header>
                            <input type="text" name="studentAwards[1][time]"
                                class="form-control datepicker-year"
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close student-awards-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                </div>
            </div>
            `;
            $('.student-awards').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.student-awards');
        }
    });
    $('.student-awards').on('click', '.student-awards-close', function() {
        let add = $('.add-student-awards');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.student-awards');
        }
    })
    $('.add-license').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="border-bottom pt-2 border-info pt-3">   
                <div class="row">
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tên và nội dung văn bằng</header>
                            <input type="text" name="license[1][name]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                            <input type="text" name="license[1][product]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Số hiệu</header>
                            <input type="text" name="license[1][code]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Năm cấp</header>
                            <input type="text" name="license[1][time]"
                                class="form-control datepicker-year"
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Nơi cấp</header>
                            <input type="text" name="license[1][address]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-11 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tác giả/ đồng tác giả</header>
                            <input type="text" name="license[1][author]"
                            class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close license-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                </div>
            </div>
            `;
            $('.license').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.license');
        }
    });
    $('.license').on('click', '.license-close', function() {
        let add = $('.add-license');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.license');
        }
    })

    $('.add-solution').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="border-bottom pt-2 border-info pt-3">
                <div class="row">
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tên và nội dung giải pháp</header>
                            <input type="text" name="solution[1][name]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                            <input type="text" name="solution[1][product]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Số hiệu</header>
                            <input type="text" name="solution[1][code]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Năm cấp</header>
                            <input type="text" name="solution[1][time]"
                                class="form-control datepicker-year"
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Nơi cấp</header>
                            <input type="text" name="solution[1][address]"
                                class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Tác giả/ đồng tác giả</header>
                            <input type="text" name="solution[1][author]"
                            class="form-control" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close solution-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                </div>
            </div>
            `;
            $('.solution').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.solution');
        }
    });
    $('.solution').on('click', '.solution-close', function() {
        let add = $('.add-solution');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.solution');
        }
    })
    $('.add-application').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tên công nghệ/ giải pháp chuyển giao</header>
                        <input type="text" name="application[1][name]"
                        class="form-control" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Hình thức, quy mô, địa chỉ áp dụng</header>
                        <input type="text" name="application[1][forms]"
                        class="form-control" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Năm chuyển giao</header>
                        <input type="text" name="application[1][time]"
                            class="form-control datepicker-year"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Sản phẩm của đề tài, dự án</header>
                        <input type="text" name="application[1][product]"
                        class="form-control" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close application-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.application').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.application');
        }
    });
    $('.application').on('click', '.application-close', function() {
        let add = $('.add-application');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.application');
        }
    })
    $('.add-prize').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Hình thức nội dung giải thưởng
                        </header>
                        <input type="text" name="prize[1][content]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nơi tặng
                        </header>
                        <input type="text" name="prize[1][address]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Năm nhận giải thưởng</header>
                        <input type="text" name="prize[1][time]"
                            class="form-control datepicker-year"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close prize-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.prize').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.prize');
        }
    });
    $('.prize').on('click', '.prize-close', function() {
        let add = $('.add-prize');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.prize');
        }
    });
    $('.add-show').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thời gian</header>
                        <input type="text" name="show[1][time]"
                            class="form-control datepicker-year"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tên chương trình
                        </header>
                        <input type="text" name="show[1][name]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Chức danh
                        </header>
                        <input type="text" name="show[1][title]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close show-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.show').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.show');
        }
    });
    $('.show').on('click', '.show-close', function() {
        let add = $('.add-show');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.show');
        }
    });
    $('.add-seminor-show').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thời gian</header>
                        <input type="text" name="seminorShow[1][time]"
                            class="form-control datepicker-year"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tên hiệp hội/ tạp chí/ hội nghị
                        </header>
                        <input type="text" name="seminorShow[1][name]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Chức danh
                        </header>
                        <input type="text" name="seminorShow[1][title]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close seminor-show-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.seminor-show').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.seminor-show');
        }
    });
    $('.seminor-show').on('click', '.seminor-show-close', function() {
        let add = $('.add-seminor-show');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.seminor-show');
        }
    });
    $('.add-work-university').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thời gian</header>
                        <input type="text" name="workUniversity[1][time]"
                            class="form-control datepicker-year"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Trường đại học/ viện/ trung tâm nghiên cứu
                        </header>
                        <input type="text" name="workUniversity[1][name]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nội dung tham gia
                        </header>
                        <input type="text" name="workUniversity[1][content]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close work-university-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.work-university').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.work-university');
        }
    });
    $('.work-university').on('click', '.work-university-close', function() {
        let add = $('.add-work-university');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.work-university');
        }
    });

    $('.add-experience').click(function() {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Tên hội đồng, thời gian họp</header>
                        <input type="text" name="experience[1][name]"
                            class="form-control"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Cấp quản lý
                        </header>
                        <input type="text" name="experience[1][level]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Hình thức tham gia
                        </header>
                        <input type="text" name="experience[1][forms]"
                            class="form-control " aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close experience-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.experience').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
            resetName('.experience');
        }
    });
    $('.experience').on('click', '.experience-close', function() {
        let add = $('.add-experience');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.experience');
        }
    });
});