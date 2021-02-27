$(document).ready(function () {
    const formatter = new Intl.NumberFormat();
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        duration: "fast"
    });

    function datepickerMonth() {
        $(".datepicker-month").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "mm-yy",
            showButtonPanel: true,
            yearRange: '1970:2025',
            duration: "fast",
            onClose: function (dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            },
        });
        $(".datepicker-month").focus(function () {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });
    }

    function resetName(className){
        const elementClass =document.querySelector(className);
        Array.from(elementClass.children).forEach(function(eClass,i){
            Array.from(eClass.querySelectorAll('input')).forEach(function(eInput){
                let nameInput =  eInput.name.split('[').join(',').split(']').join('').split(',');
                nameInput=  `${nameInput[0]}[${i+1}][${nameInput[2]}]`;
                eInput.name=nameInput;
            })
            Array.from(eClass.querySelectorAll('select')).forEach(function(eOption) {
                let nameOption =  eOption.name.split('[').join(',').split(']').join('').split(',');
                nameOption=  `${nameOption[0]}[${i+1}][${nameOption[2]}]`;
                eOption.name=nameOption;
            })
        });
    }
    datepickerYear();
    datepickerMonth();

    function datepickerYear() {
        $(".datepicker-year").datepicker({
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            yearRange: '1950:2020',
            dateFormat: 'yy',
            onClose: function (dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 0, 1));
            }
        });
        $(".datepicker-year").focus(function () {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });
    }
    $('.add-content').click(function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html=`
            <div class="row border-bottom border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nội dung nghiên cứu theo
                            thuyết minh đề tài</header>
                        <input type="text" name="content[1][contentExplanation]"
                            class="form-control " aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-12 col-lg ">
                    <div class="form-group">
                        <header class="blockquote-header">Nội dung phối hợp nghiên cứu
                        </header>
                        <input type="text" name="content[1][contentCombination]"
                            class="form-control" aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Mức độ hoàn thành(%)</header>
                        <input type="number" name="content[1][finish]"
                            class="form-control" min="0" max="100"
                            aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close content-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.content').append(html);
            $(this).attr('count', count + 1);
            resetName('.content');
        }
    });
    $('.content').on('click', '.content-close', function () {
        let add = $('.add-content');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.content');
        }
    })
    $('.add-product').click(function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html=`
            <div class="row border-top border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Sản phẩm theo thuyết minh đề
                            tài</header>
                        <input type="text" name="product[1][productExplanation]"
                            class="form-control" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg ">
                    <div class="form-group">
                        <header class="blockquote-header">Sản phẩm đã thực hiện</header>
                        <input type="text" name="product[1][make]" class="form-control"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Mức độ hoàn thành(%)</header>
                        <input type="number" name="product[1][finish]"
                            class="form-control" min="0" max="100"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close product-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.product').append(html);
            $(this).attr('count', count + 1);
            resetName('.product');
        }
    });
    $('.product').on('click', '.product-close', function () {
        let add = $('.add-product');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.product');
        }
    })
})
