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
    //thuc thi ham datepicker khi reload
    datepickerYear();
    datepickerMonth();

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

    function datepickerYear() {
        $(".datepicker-year").datepicker({
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            yearRange: '1970:2025',
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
    $('.add-member').click(function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            let a = '<div class="col-12 col-lg"> <div class="form-group"> <header class="blockquote-header">Họ và tên</header> <input type="text" name="member[' + count + '][name]" class="form-control " aria-describedby="helpId""> </div> </div>';
            let b = '<div class="col-12 col-lg"> <div class="form-group"> <header class="blockquote-header">Đơn vị công tác và lĩnh vực chuyên môn </header> <input type="text" name="member[' + count + '][expertise]" class="form-control " aria-describedby="helpId"> </div> </div>';
            let c = '<div class="col-11 col-lg"> <div class="form-group"> <header class="blockquote-header">Nội dung nghiên cứu cụ thể được giao</header> <input type="text" name="member[' + count + '][content]" class="form-control" aria-describedby="helpId"> </div> </div>';
            let close = '<div class="col-1 pr-3 pt-3"><i class="far fa-window-close member-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>';
            let html = ' <div class="row border-top border-info pt-3">' + a + b + c + close + '</div>';
            $('.member').append(html);
            $(this).attr('count', count + 1);
        }
    });
    $('.member').on('click', '.member-close', function () {
        let add = $('.add-member');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.member');
        }
    })
    $('.add-coordination').click(function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            let a = '<div class="col-12 col-lg"> <div class="form-group"> <header class="blockquote-header">Tên đơn vị trong và ngoài nước</header> <input type="text" name="coordination[' + count + '][nameUnit]" class="form-control " aria-describedby="helpId""> </div> </div>';
            let b = '<div class="col-12 col-lg"> <div class="form-group"> <header class="blockquote-header">Nội dung phối hợp nghiên cứu</header> <input type="text" name="coordination[' + count + '][content]" class="form-control" aria-describedby="helpId"> </div> </div>';
            let c = '<div class="col-11 col-lg"> <div class="form-group"> <header class="blockquote-header">Họ và tên người đại hiện</header> <input type="text" name="coordination[' + count + '][nameUser]" class="form-control " aria-describedby="helpId"> </div> </div>';
            let close = '<div class="col-1 pr-3 pt-3"><i class="far fa-window-close coordination-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>';
            let html = ' <div class="row border-top border-info pt-3">' + a + b + c + close + '</div>';
            $('.coordination').append(html);
            $(this).attr('count', count + 1);
            datepickerYear();
        }
    });
    $('.coordination').on('click', '.coordination-close', function () {
        let add = $('.add-coordination');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.coordination')
        }
    })
    $('.add-progress').click(function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html=`
                <div class="row border-bottom border-info pt-3">
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Các nội dung, công
                                việc
                                thực hiện</header> <input type="text"
                                name="progress[1][content]" class="form-control"
                                aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Sản phẩm</header>
                            <input type="text" name="progress[1][product]"
                                class="form-control" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="form-group d-flex">
                            <div>
                                <header class="blockquote-header">Thời gian</header>
                                <input type="text" name="progress[1][timeBefor]"
                                    class="form-control datepicker-month"
                                    aria-describedby="helpId" required>
                            </div> <label class="mt-4 ml-3 mr-3">đến</label>
                            <div>
                                <header class="blockquote-header">đến năm</header>
                                <input type="text" name="progress[1][timeEnd]"
                                    class="form-control datepicker-month"
                                    aria-describedby="helpId" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-11 col-lg">
                        <div class="form-group">
                            <header class="blockquote-header">Người thực hiện
                            </header>
                            <input type="text" name="progress[1][user]"
                                class="form-control" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="col-1 pr-3 pt-3"><i class="far fa-window-close progress-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
                </div>
            `;
            $('.form-progress').append(html);
            $(this).attr('count', count + 1);
            datepickerMonth();
            resetName('.form-progress');
        }
    });
    $('.form-progress').on('click', '.progress-close', function () {
        let add = $('.add-progress');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            resetName('.form-progress')
        }
    })
    //20. chi công lao động
    $('.labor').on('keyup', '.worker', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderLabor();
    });
    $('.labor').on('change', '.worker', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");;
        $(this).val(formatter.format(value));
        renderLabor();
    });
    $('.labor').on('change', '.coefficient', function () {
        renderLabor();
    });
    $('.add-labor').on('click', function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html = `
            <div class="row border-top border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nội dung</header>
                        <input type="text" name="labor[${count}][content]"
                            class="form-control content" aria-describedby="helpId"">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thời gian trả lương</header>
                        <input type="text" name="labor[${count}][time]"
                            class="form-control datepicker-month"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Số ngày công</header>
                        <input type="text" name="labor[${count}][worker]"
                            class="form-control worker" aria-describedby="helpId"
                            value="0">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Hệ số</header>
                        <select class="custom-select expense coefficient"
                            id="inputGroupSelect02" name="labor[${count}][coefficient]">
                            <option value="0.55" selected>0,55</option>
                            <option value="0.26">0,26</option>
                            <option value="0.16">0,16</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Lương cơ bản</header>
                        <input type="text" name="labor[${count}][salary]"
                            class="form-control salary" aria-describedby="helpId" readonly>
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thành tiền</header>
                        <input type="text" name="labor[${count}][total]"
                            class="form-control chile-total" aria-describedby="helpId"
                            readonly>
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close labor-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>`;
            $('.labor').append(html);
            $(this).attr('count', count + 1);
            datepickerMonth();
            renderLabor();
        }
    });
    $('.labor').on('click', '.labor-close', function () {
        let add = $('.add-labor');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            renderLabor();
            resetName('.labor')
        }
    })
    renderLabor();

    function renderLabor() {
        let item = [];
        let total = 0;
        let worker = [...$('.labor .worker')];
        let coefficient = [...$('.labor .coefficient')]
        let salary = [...$('.labor .salary')];
        let chileTotal = [...$('.labor .chile-total')];
        for (let i = 0; i < worker.length; i++) {
            salary[i].value = formatter.format(salary[0].value.replace(/[^0-9]+/g, ""));
            item.push({
                worker: worker[i].value.replace(/[^0-9]+/g, ""),
                coefficient: coefficient[i].value,
                salarya: salary[0].value.replace(/[^0-9]+/g, ""),
            });
            let totalChild = (parseInt(item[i].worker) * parseInt(item[i].salarya) * parseFloat(item[i].coefficient)).toFixed(0);
            if (isNaN(totalChild)) {
                totalChild = 0;
            }
            chileTotal[i].value = formatter.format(totalChild);
            total += parseFloat(totalChild);
        }
        if (isNaN(total)) {
            total = 0;
        }
        $('#total-labor').val(formatter.format(total));
    }
    //21. chi mua nguyên liệu
    $('.resources').on('keyup', '.quantily', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderResource();
    });
    $('.resources').on('change', '.quantily', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderResource();
    });
    $('.resources').on('keyup', '.price', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderResource();
    });
    $('.resources').on('change', '.price', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderResource();
    });
    $('.add-resources').on('click', function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html=`
            <div class="row border-top border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nội dung</header>
                        <input type="text" name="resources[${count}][content]"
                            class="form-control content" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Số lượng</header>
                        <input type="text" name="resources[${count}][quantily]"
                            class="form-control quantily" aria-describedby="helpId"
                            value="1" min="1">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Đơn giá</header>
                        <input type="text" name="resources[${count}][price]"
                            class="form-control price" aria-describedby="helpId"
                            value="0">
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thành tiền</header>
                        <input type="text" name="resources[${count}][total]"
                            class="form-control chile-total" aria-describedby="helpId"
                            readonly>
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close resources-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.resources').append(html);
            $(this).attr('count', count + 1);
            renderResource();
        }
    });
    $('.resources').on('click', '.resources-close', function () {
        let add = $('.add-resources');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            renderResource();
            resetName('.resources')
        }
    })
    renderResource();

    function renderResource() {
        let item = [];
        let total = 0;
        let quantily = [...$('.resources .quantily')];
        let price = [...$('.resources .price')];
        let chileTotal = [...$('.resources .chile-total')]
        for (let i = 0; i < quantily.length; i++) {
            item.push({
                quantily: quantily[i].value.replace(/[^0-9]+/g, ""),
                price: price[i].value.replace(/[^0-9]+/g, ""),
            });
            let totalChild = (parseInt(item[i].quantily) * parseInt(item[i].price)).toFixed(0);
            if (isNaN(totalChild)) {
                totalChild = 0;
            }
            chileTotal[i].value = formatter.format(totalChild);
            total += parseFloat(totalChild);
        }
        if (isNaN(total)) {
            total = 0;
        }
        $('#total-resources').val(formatter.format(total));
    }
    //22. chi phí sửa chữa
    $('.repair').on('keyup', '.quantily', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderRepair();
    });
    $('.repair').on('keyup', '.price', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderRepair();
    });
    $('.repair').on('change', '.quantily', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderRepair();
    });
    $('.repair').on('change', '.price', function () {
        let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderRepair();
    });
    $('.add-repair').on('click', function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html =`
            <div class="row border-top border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nội dung</header>
                        <input type="text" name="repair[${count}][content]"
                            class="form-control content" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Số lượng</header>
                        <input type="text" name="repair[${count}][quantily]"
                            class="form-control quantily" aria-describedby="helpId"
                            value="1">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Đơn giá</header>
                        <input type="text" name="repair[${count}][price]"
                            class="form-control price" aria-describedby="helpId"
                            value="0">
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thành tiền</header>
                        <input type="text" name="repair[${count}][total]"
                            class="form-control chile-total" aria-describedby="helpId"
                            readonly value="">
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close  repair-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.repair').append(html);
            $(this).attr('count', count + 1);
            renderRepair();
        }
    });
    $('.repair').on('click', '.repair-close', function () {
        let add = $('.add-repair');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            renderRepair();
            resetName('.repair')
        }
    })
    renderRepair();

    function renderRepair() {
        let item = [];
        let total = 0;
        let quantily = [...$('.repair .quantily')];
        let price = [...$('.repair .price')];
        let chileTotal = [...$('.repair .chile-total')]
        for (let i = 0; i < quantily.length; i++) {
            item.push({
                quantily: quantily[i].value.replace(/[^0-9]+/g, ""),
                price: price[i].value.replace(/[^0-9]+/g, ""),
            });
            let totalChild = (parseInt(item[i].quantily) * parseInt(item[i].price)).toFixed(0);
            if (isNaN(totalChild)) {
                totalChild = 0;
            }
            chileTotal[i].value = formatter.format(totalChild);
            total += parseFloat(totalChild);
        }
        $('#total-repair').val(formatter.format(total));
    }
    //23. chi phí khác
    $('.diff').on('keyup', '.quantily', function () {
         let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderDiff();
    });
    $('.diff').on('keyup', '.price', function () {
         let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderDiff();
    });
    $('.diff').on('change', '.quantily', function () {
         let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderDiff();
    });
    $('.diff').on('change', '.price', function () {
         let value = $(this).val().replace(/[^0-9]+/g, "");
        $(this).val(formatter.format(value));
        renderDiff();
    });
    $('.add-diff').on('click', function () {
        let count = parseInt($(this).attr('count'));
        let max_count = 5;
        if (count <= max_count) {
            const html=`
            <div class="row border-top border-info pt-3">
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Nội dung</header>
                        <input type="text" name="costDiff[${count}][content]"
                            class="form-control content" aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Số lượng</header>
                        <input type="text" name="costDiff[${count}][quantily]"
                            class="form-control quantily" aria-describedby="helpId"
                            value="1" min="1">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Đơn giá</header>
                        <input type="text" name="costDiff[${count}][price]"
                            class="form-control price" aria-describedby="helpId"
                            value="0">
                    </div>
                </div>
                <div class="col-11 col-lg">
                    <div class="form-group">
                        <header class="blockquote-header">Thành tiền</header>
                        <input type="text" name="costDiff[${count}][total]"
                            class="form-control chile-total" aria-describedby="helpId"
                            readonly>
                    </div>
                </div>
                <div class="col-1 pr-3 pt-3"><i class="far fa-window-close  diff-close" style="font-size:20px;color:red;cursor: pointer; margin-top: 10px"></i></div>
            </div>
            `;
            $('.diff').append(html);
            $(this).attr('count', count + 1);
            renderDiff();
        }
    });
    $('.diff').on('click', '.diff-close', function () {
        let add = $('.add-diff');
        let count = add.attr('count');
        if (count > 2) {
            $(this).parent('div').parent('div').remove();
            add.attr('count', count - 1);
            renderDiff();
            resetName('.diff');
        }
    })
    renderDiff();
    
    function renderDiff() {
        let item = [];
        let total = 0;
        let quantily = [...$('.diff .quantily')];
        let price = [...$('.diff .price')];
        let chileTotal = [...$('.diff .chile-total')]
        for (let i = 0; i < quantily.length; i++) {
            item.push({
                quantily: quantily[i].value.replace(/[^0-9]+/g, ""),
                price: price[i].value.replace(/[^0-9]+/g, ""),
            });
            let totalChild = (parseInt(item[i].quantily) * parseInt(item[i].price).toFixed(0));
            if (isNaN(totalChild)) {
                totalChild = 0;
            }
            chileTotal[i].value = formatter.format(totalChild);
            total += parseFloat(totalChild);
        }
        $('#total-diff').val(formatter.format(total));
    }

});
$(document).ready(function(){
    const eDegree=document.querySelector('#degree');
    const valueDegree=eDegree.value.trim();
    const eProductEducate=document.querySelectorAll('input[name="productEducate[]"]');
    if(valueDegree=='thạc sĩ'){
        Array.from(eProductEducate).forEach(function(e){
            if(e.value=='tiến sĩ'){
                e.disabled=true;
                e.parentElement.querySelector('span').classList.add('text-secondary');
            }
        });
    }
    if(valueDegree=='kỹ sư'){
        Array.from(eProductEducate).forEach(function(e){
            if(e.value=='tiến sĩ'|| e.value=='thạc sĩ'){
                e.disabled=true;
                e.parentElement.querySelector('span').classList.add('text-secondary');
            }
        });
    }
})
