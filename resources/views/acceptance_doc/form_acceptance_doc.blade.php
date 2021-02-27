<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Phòng khoa học công nghệ - Xét duyệt đăng ký đề tài </title>
    <base href="{{ asset('') }}">
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png" />
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link rel="icon" type="image/png" href="cntt/images/icons/favicon.png" />
    <link rel="stylesheet" type="text/css" href="cntt/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/css/util.min.css">
    <link rel="stylesheet" type="text/css" href="cntt/css/main.css">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="lib/js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/general.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <style type="text/css">
    .row {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px;
    }

    .title-field-bold {
    font-weight: 600 !important;
}
    dl, ol, ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
li, ul {
    margin: 0;
    list-style-type: none;
}
    .title-field {
    font-weight: 500 !important;
    padding-right: 10px;
}
    .table-custom{
        width: 100%;
        border: 1px solid black;
    }
    .table-custom tr, .table-custom tbody tr td, .table-custom thead tr th {
    border: 1px solid black;
    text-align: center;
    padding: 5px;
}
        @media(max-width:500px) {

            .page {
                font-size: 35%;
            }
            .card-body{
                font-size: 8px;
            }
            .logo-img{
                display: none;
            }
            .button-menu-top{
                padding-right: 10px;
                padding-top: 12px;
            }
        }

        @media(min-width:501px) and (max-width:1023px) {
            .page {
                font-size: 52%;
            }
            .card-body{
                font-size: 8px;
            }
            .logo-img{
                display: none;
            }
            .button-menu-top{
                padding-right: 10px;
                padding-top: 12px;
            }
        }

        @media(min-width:1024px) {
            .page {
                font-size: 100%;
            }

        }
        .page{
         margin: 0px auto;
         width: 80%;
         font-family: "Times New Roman";
         border: 1px solid #ccc;
         
        }
        .hr-short {
            width: 45%;
            margin: 0px 0px 0px 28%;
            color: #080707;
            border: 0.5px solid;
        }
        .page-content {
            width: 80%;
            margin: 0px auto;
        }
            .page-content1 {
            width: 90%;
            margin: 0px auto;
        }
        .til{
            padding-top: 15px;
        }
        /*.tils{

                padding-left: 100px;
        }*/
        .dashboard-wrapper{
            margin-left: 0px;
        }
        .dashboard-content{
            padding-bottom: 0px;
        }
    </style>
</head>
<body>
    <div class="rev-slider">
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="p-r-10 p-rl-0-sr991 p-b-20">
                    <div class="p-b-25">
                        
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <strong>{{ $error }}</strong>
                                </div>
                            @endforeach
                        @endif
                       
                        <div class="p-t-15 page" id="page-download">
                            <div class="row font-110">
                                <div class="col-6 text-center">
                                    <p class="text-uppercase mb-0 font-weight-bold">bộ giao thông vận tải</p>
                                    <p class="text-uppercase mb-1 font-weight-bold">trường đại học giao thông vận tải
                                        <br />tp.hồ chí minh</p>
                                    <hr class="hr-short">
                                </div>
                                <div class="col-6 text-center">
                                    <p class="font-weight-bold text-uppercase mb-0">Cộng hòa xã hội chủ nghĩa việt nam
                                    </p>
                                    <p class="font-weight-bold mb-1">Độc lập<span> - </span>Tự do<span> - </span>Hạnh
                                        phúc
                                    </p>
                                    <hr class="hr-short">
                                </div>
                            </div>

                            <div class="row " >
                     <div class="col-12 text-center">
                        <p class="text-uppercase font-weight-bold title-page">PHIẾU THẨM ĐỊNH NGHIỆM THU TÀI LIỆU GIẢNG DẠY <br/>
                          
                          <span style="font-size: 13px">(Dành cho các thành viên trong Hội đồng thẩm định, nghiệm thu TLGD)</span> 
                             

                        </p>
                        
                    </div>
                    
                </div>
                            <div class="page-content font-110">
                                

                              
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>1.	Tên tài liệu giảng dạy:  </span>
                              <span class="font-weight-bold">{{ $doc->name_doc }}</span>
                            </p>
                          </div>
                          
                        </div>
                       

                        <div class="row">
                        	<div class="col-6">
                            <p>
                              <span>2.	Thể loại:  </span>
                              <span class="font-weight-bold">{{ typeDoc($doc->type_doc) }}</span>
                            </p>
                          </div>
                          <div class="col-6">
                            <p>
                              <span>Số tín chỉ:  </span>
                              <span class="font-weight-bold">{{ $study->number_of_credits }}</span>
                            </p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>3.Sử dụng môn học (học phần): :  </span>
                              <span class="font-weight-bold">{{ $study->name_term }}</span>
                            </p>
                          </div>
                         
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>4.	Chủ biên  </span>
                              <span class="font-weight-bold">{{ $doc->user->name }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <p>
                              <span>5.	Họ và tên người nhận xét:  </span>
                              <span class="font-weight-bold">{{ $acceptance_doc->user->name }}</span>
                            </p>
                          </div>
                          <div class="col-6">
                            <p>
                              <span>Học vị:  </span>
                              <span class="font-weight-bold">{{ degreeName($acceptance_doc->user->degree) }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>6.	Chức danh trong Hội đồng:  </span>
                               <span class="font-weight-bold">
                                {{ position_evalute($position) }}
                              </span>
                            </p>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>7.	Đơn vị công tác:  </span>
                              <span class="font-weight-bold">{{ unit($acceptance_doc->user->work_unit_id) }}</span>
                            </p>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <p>
                              <span>Điểm đánh giá của thành viên Hội đồng :  </span>
                              
                            </p>
                          </div>
                          <div class="col-12">
                           <table class="table-custom">
                            <thead>
                              <tr>
                                <th class="w7">STT</th>
                                <th>Nội dung đánh giá</th>
                                <th style="width: 70px">Điểm tối đa</th>
                                <th style="width: 70px">Điểm đánh giá</th>
                              </tr>
                            </thead>
                            <tbody>
                            	<tr>
                            		<td class="font-weight-bold">1</td>
                            		<td class="font-weight-bold">Đánh giá về nội dung và chất lượng</td>
                            		<td class="font-weight-bold">80</td>
                            		<td class="font-weight-bold"></td>
                            	</tr>
                            	<tr>
                            		<td>1.1</td>
                            		<td>Tính chính xác, tính khoa học và tính cập nhật về nội
                            			dung kiến thức
                            		</td>
                            		<td>15</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->accuracy }}</td>

                            	</tr>
                            	<tr>
                            		<td>1.2</td>
                            		<td>Sự phù hợp với mục tiêu khung chương trình đào tạo
                            		</td>
                            		<td>20</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->suitability }}</td>

                            	</tr>
                            	<tr>
                            		<td>1.3</td>
                            		<td>Mức độ đáp ứng chuẩn đầu ra về kiến thức, kỹ năng trong đề cương chi tiết của học phần liên quan
                            		</td>
                            		<td>30</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->response_level }}</td>

                            	</tr>
                            	<tr>
                            		<td>1.4</td>
                            		<td>Chất lượng bài tập, câu hỏi ôn tập, ví dụ minh họa (nếu có)
                            		</td>
                            		<td>15</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->exercise_quality }}</td>

                            	</tr>
                            	<tr>
                            		<td class="font-weight-bold">2</td>
                            		<td class="font-weight-bold">Hình thức</td>
                            		<td class="font-weight-bold">20</td>
                            		<td class="font-weight-bold"></td>
                            	</tr>
                            	<tr>
                            		<td>2.1</td>
                            		<td>Tính logic và sự phù hợp khi phân chia chương mục
                            		</td>
                            		<td>5</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->logic }}</td>

                            	</tr>
                            	<tr>
                            		<td>2.2</td>
                            		<td>Chất lượng hình ảnh, đồ thị và bảng biểu
                            		</td>
                            		<td>5</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->image_quality }}</td>

                            	</tr>
                            	<tr>
                            		<td>2.3</td>
                            		<td>Chất lượng chế bản và hành văn
                            		</td>
                            		<td>5</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->master_quality }}</td>

                            	</tr>
                            	<tr>
                            		<td>2.4</td>
                            		<td>Tài liệu tham khảo (Tính cập nhật, số lượng, mức độ uy tín)
                            		</td>
                            		<td>5</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->references }}</td>

                            	</tr>
                            	<tr>
                            		<td></td>
                            		<td class="text-center font-weight-bold">Cộng
                            		</td>
                            		<td class="font-weight-bold">100</td>
                            		<td class="font-weight-bold">{{ $acceptance_doc->total }}</td>

                            	</tr>
                            	<tr>
                            		<td colspan="2">
                            			<b>Xếp loại:</b> (<b>Tốt</b> : 80 điểm đến 100 điểm, <b>Khá</b> : 70 điểm đến dưới 80 
                            			điểm ;<b>Đạt:</b>  50 điểm đến dưới 70 điểm ;<b>Không đạt:</b>  dưới 50 điểm

                            		</td>
                            		<td colspan="2" class="font-weight-bold">
                            			@if($acceptance_doc->total >= 80)
                                    	Tốt
                                    	
                                    	@elseif($acceptance_doc->total >=70)
                                    	Khá
                                    	@elseif($acceptance_doc->total >=50)
                                    	Đạt
                                    	@elseif($acceptance_doc->total < 50)
                                    	Không đạt
                                    	@endif
                            		</td>
                            		
                            	</tr>
                             
                           </tbody>
                         </table>
                       </div>

                     </div>
                        
                              <div class="row p-t-15">
                                <div class="col-12">
                                  <p>
                                    <span>Ý kiến đóng góp :</span>
                                    <span class="font-weight-bold">{{ $acceptance_doc->opinion }}</span>
                                   </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <p>
                                    <span>Kết luận:</span>
                                    <span class="font-weight-bold">
                                    	{{ $acceptance_doc->conclude }}
                            
                                    </span>
                                   </p>
                                </div>
                              </div>
                        
                                <div class="row mt-5 pb-20 d-flex justify-content-end">
                                    <div class="col-4  ">
                                        <p class="title-field-bold m-0 text-uppercase">Người nhận xét</p>
                                        <p class="m-0"><i>(Ký tên, ghi rõ họ tên)</i></p>
                                    </div>
                                    
                                </div>
                                
                                <div class="row pb-20"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            </div>
        </div>
    </div>

</body>
</html>
