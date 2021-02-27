<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'trangchu', 'uses' => 'PageController@getIndex']);
Route::get('lien-he', ['as' => 'lienhe', 'uses' => 'PageController@getContact']);
Route::get('dang-nhap', ['as' => 'login', 'uses' => 'PageController@getLogin']);
Route::post('dang-nhap', ['as' => 'login', 'uses' => 'PageController@postLogin']);
Route::get('dang-xuat', ['as' => 'logout', 'uses' => 'PageController@getLogout']);
Route::get(
	'tim-kiem',
	['as' => 'timkiemtrangchu', 'uses' => 'PageController@getSearchInformation']
);
Route::get('change-password-user', ['as' => 'changePasswordUser', 'uses' => 'PageController@changePasswordUser']);
Route::post('change-password-user', ['as' => 'post_changePasswordUser', 'uses' => 'PageController@postChangePasswordUser']);
Route::get('change-infor-user', ['as' => 'changeInformationUser', 'uses' => 'PageController@changeInformationUser']);
Route::post('change-infor-user', ['as' => 'post_changeInformationUser', 'uses' => 'PageController@postChangeInformationUser']);

Route::get('nghien-cuu-khoa-hoc-cap-truong', ['as' => 'nghiencuukhoahoccaptruong', 'uses' => 'PageController@getSchool'])->middleware('auth');
//tài liệu giảng dạy
Route::get('bien-soan-tai-lieu-giang-day', ['as' => 'biensoantailieugiangday', 'uses' => 'PageController@getTeachingDocument'])->middleware('auth');
Route::get('dang-ky-bien-soan-tai-lieu-giang-day', ['as' => 'dangkybiensoantailieugiangday', 'uses' => 'PageController@getRegisterTeachingDocument'])->middleware('auth');
Route::post('dang-ky-bien-soan-tai-lieu-giang-day', ['as' => 'dangkytailieubaigiang', 'uses' => 'PageController@postRegisterTeachingDocument'])->middleware('auth');
Route::post('cap-nhat-dang-ky-bien-soan-tai-lieu-giang-day/{slug}', ['as' => 'capnhatdangkytailieubaigiang', 'uses' => 'PageController@postEditRegisterTeachingDocument'])->middleware('auth');
Route::get('dang-ky-gia-han-tai-lieu-giang-day/{id}', ['as' => 'giahantailieubaigiang', 'uses' => 'PageController@getExtensionTeachingDocument'])->middleware('auth');
Route::post('dang-ky-gia-han-tai-lieu-giang-day/{id}', ['as' => 'postgiahantailieubaigiang', 'uses' => 'PageController@postExtensionTeachingDocument'])->middleware('auth');
Route::get('form-gia-han-tai-lieu-giang-day/{id}', ['as' => 'formgiahantailieubaigiang', 'uses' => 'PageController@getFormExtensionTeachingDocument'])->middleware('auth');
//huy tai lieu giang day
Route::get('huy-tai-lieu-giang-day/{id}', ['as' => 'huytailieubaigiang', 'uses' => 'PageController@getCancelTeachingDocument'])->middleware('auth');
Route::post('huy-tai-lieu-giang-day/{id}', ['as' => 'huytailieubaigiang', 'uses' => 'PageController@postCancelTeachingDocument'])->middleware('auth');
//bao cao tien do
Route::post('bao-cao-tien-do-bien-soan/{id}', ['as' => 'baocaotiendobiensoan', 'uses' => 'PageController@postDeployReportTeachingDocument'])->middleware('auth');
Route::post('bao-cao-tien-do-bien-soan-2/{id}', ['as' => 'baocaotiendobiensoan2', 'uses' => 'PageController@postDeployReportTeachingDocument2'])->middleware('auth');

Route::get('/ajax-study/{id}', ['as' => 'ajax_study', 'uses' => 'PageController@getAjaxStudy'])->middleware('auth');
route::get('ban-dang-ky-bien-soan-tai-lieu/{id}', ['as' => 'dangkytailieu', 'uses' => 'PageController@formRegisterTeachingDocument'])->middleware('auth');
route::get('chinh-sua-dang-ky-bien-soan-tai-lieu/{slug}', [
	'as' => 'chinhsuadangkybiensoan',
	'uses' => 'PageController@getEditRegisterDocument'
])->middleware('auth');
route::get('theo-doi-tai-lieu/{slug}', [
	'as' => 'theodoitailieu',
	'uses' => 'PageController@getDetailDocument'
])->middleware('auth');
route::post('gui-nghiem-thu-tai-lieu/{id}', [
	'as' => 'nghiemthutailieu',
	'uses' => 'PageController@postAcceptanceDocument'
]);
route::post('upload-tai-lieu-chinh-sua/{id}', [
	'as' => 'uploadtailieuchinhsua',
	'uses' => 'PageController@postUploadEditDocument'
]);
route::get('theo-doi-tai-lieu/{slug}/xem-bien-ban-nghiem-thu', [
	'as' => 'xemnghiemthutailieu',
	'uses' => 'PageController@getFormAcceptanceDocumentUser'
])->middleware('auth');

//Dang ky de tai cap truong

route::get('dang-ky-de-tai-cap-truong', [
	'as' => 'dangkydetaicaptruong',
	'uses' => 'PageController@getRegisterTopicSchool'
])->middleware('auth');
route::post('dang-ky-de-tai-cap-truong', [
	'as' => 'dangkydetaicaptruong',
	'uses' => 'PageController@postRegisterTopicSchool'
]);
//
route::get('dang-ky-ly-lich-khoa-hoc-chu-nhiem-de-tai', [
	'as' => 'dangkydetaichunhiemdetai',
	'uses' => 'PageController@getScientificProfile'
])->middleware('auth');
route::post('dang-ky-ly-lich-khoa-hoc-chu-nhiem-de-tai', [
	'as' => 'dangkydetaichunhiemdetai',
	'uses' => 'PageController@postScientificProfile'
])->middleware('auth');
route::get('ly-lich-khoa-hoc-chu-nhiem-de-tai', [
	'as' => 'detaichunhiemdetai',
	'uses' => 'PageController@getIndexScientificProfile'
])->middleware('auth');
route::get('chinh-sua-ly-lich-khoa-hoc-chu-nhiem-de-tai', [
	'as' => 'chinhsuadetaichunhiemdetai',
	'uses' => 'PageController@editScientificProfile'
])->middleware('auth');
route::post('chinh-sua-ly-lich-khoa-hoc-chu-nhiem-de-tai', [
	'as' => 'chinhsuadetaichunhiemdetai',
	'uses' => 'PageController@updateScientificProfile'
])->middleware('auth');
route::get('download-ly-lich-khoa-hoc-chu-nhiem-de-tai', [
	'as' => 'downloaddetaichunhiemdetai',
	'uses' => 'PageController@downloadScientificProfile'
])->middleware('auth');
//thuyet-minh
route::get('dang-ky-thuyet-minh-de-tai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'thuyetminhdetainghiencuukhoahoc',
	'uses' => 'PageController@getScientificExplanation'
])->middleware('auth');
route::post('dang-ky-thuyet-minh-de-tai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'thuyetminhdetainghiencuukhoahoc',
	'uses' => 'PageController@postScientificExplanation'
])->middleware('auth');
route::get('thuyet-minh-de-tai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'getthuyetminhdetainghiencuukhoahoc',
	'uses' => 'PageController@getIndexScientificExplanation'
])->middleware('auth');
route::get('chinh-sua-thuyet-minh-de-tai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'editthuyetminhdetainghiencuukhoahoc',
	'uses' => 'PageController@editScientificExplanation'
])->middleware('auth');
route::post('chinh-sua-thuyet-minh-de-tai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'editthuyetminhdetainghiencuukhoahoc',
	'uses' => 'PageController@updateScientificExplanation'
])->middleware('auth');
route::get('download-thuyet-minh-de-tai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'downloadthuyetminhdetaikhoahoc',
	'uses' => 'PageController@downloadScientificExplanation'
])->middleware('auth');

//bao-cao-trien-khai-khoa-hoc
route::get('bao-cao-trien-khai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'baocaotrienkhainghiencuukhoahoc',
	'uses' => 'PageController@getScientificDeployReport'
])->middleware('auth');
route::post('bao-cao-trien-khai-nghien-cuu-khoa-hoc/{id}', [
	'as' => 'baocaotrienkhainghiencuukhoahoc',
	'uses' => 'PageController@postScientificDeployReport'
])->middleware('auth');
route::get('form-bao-cao-thuc-hien-de-tai/{id}', [
	'as' => 'formbaocao',
	'uses' => 'PageController@getFormScientificDeployReport'
])->middleware('auth');
route::get('download-bao-cao-thuc-hien-de-tai/{id}', [
	'as' => 'dowloadbaocao',
	'uses' => 'PageController@downloadScientificDeployReport'
])->middleware('auth');
//gia-han-thuc-hien-de-tai
route::get('gia-han-thuc-hien-de-tai/{id}', [
	'as' => 'giahanthuchiendetai',
	'uses' => 'PageController@getScientificExtension'
])->middleware('auth');
route::get('form-gia-han-thuc-hien-de-tai/{id}', [
	'as' => 'formgiahan',
	'uses' => 'PageController@getFormScientificExtension'
])->middleware('auth');
route::get('download-gia-han-thuc-hien-de-tai/{id}', [
	'as' => 'downloadgiahan',
	'uses' => 'PageController@downloadScientificExtension'
])->middleware('auth');
route::post('gia-han-thuc-hien-de-tai/{id}', [
	'as' => 'giahanthuchiendetai',
	'uses' => 'PageController@postScientificExtension'
])->middleware('auth');
//nghiem thu de tai
route::post('nghiem-thu-de-tai/{id}', [
	'as' => 'nghiemthudetai',
	'uses' => 'PageController@postTopicMAcceptance'
])->middleware('auth');
Route::get('tai-file-nghiem-thu-de-tai/{id}/{index}', [
	'as' => 'downloadfilenghiemthudetai',
	'uses' => 'PageController@downloadTopicMAcceptance'
]);
Route::get('tai-file-nghiem-thu-tai-lieu/{id}/{index}', [
	'as' => 'downloadfilenghiemthutailieu',
	'uses' => 'PageController@downloadDocumentAcceptance'
]);
Route::get('tai-file-thanh-ly-tai-lieu/{id}/{index}', [
	'as' => 'downloadfilethanhlytailieu',
	'uses' => 'PageController@downloadDocumentLiquidation'
]);
//huy thuc hien de tai nghien cuu
route::get('huy-de-tai-nghien-cuu/{id}', [
	'as' => 'huydetainghiencuu',
	'uses' => 'PageController@getScientificCancel'
])->middleware('auth');
route::post('huy-de-tai-nghien-cuu/{id}', [
	'as' => 'huydetainghiencuu',
	'uses' => 'PageController@postScientificCancel'
])->middleware('auth');
//
route::get('theo-doi-de-tai/{slug}', [
	'as' => 'theodoidetai',
	'uses' => 'PageController@getDetailTopic'
])->middleware('auth');
route::post('cap-nhat-file-thuyet-minh/{id}', [
	'as' => 'uploadpresent',
	'uses' => 'PageController@postUploadFilePresent'
])->middleware('auth');
//thanh ly
route::post('upload-file-thanh-ly/{id}', [
	'as' => 'thanhlydetai',
	'uses' => 'PageController@postLiquidationTopic'
])->middleware('auth');
Route::get('tai-file-thanh-ly-de-tai/{id}/{index}', [
	'as' => 'downloadfilethanhlydetai',
	'uses' => 'PageController@downloadTopicLiquidation'
]);

//download file pdf
Route::get('download-file-pdf-ly-lich-khoa-hoc/{id}/{type}', [
	'as' => 'downloadfilepdflylichkhoahoc',
	'uses' => 'PageController@downloadPdfScientificProfile'
])->middleware('auth');
//chi tiet dang ky de tai
route::get('chi-tiet-de-tai/{id}/form-dang-ky-de-tai', [
	'as' => 'formdkchitietdetaipublic',
	'uses' => 'PageController@getRegisterFormDetailTopic'
])->middleware('auth');

route::get('chi-tiet-thong-bao/{id}', [
	'as' => 'chitietthongbao',
	'uses' => 'PageController@getDetailNotice'
]);

//admin
route::get('login-admin', [
	'as' => 'loginadmin',
	'uses' => 'AdminController@getLoginAdmin'
]);
route::post('login-admin', [
	'as' => 'loginadmin',
	'uses' => 'AdminController@postLoginAdmin'
]);
route::get('logout-admin', [
	'as' => 'logoutadmin',
	'uses' => 'AdminController@getLogoutAdmin'
]);

Route::group(['prefix' => '/admin', 'middleware' => ['admin']], function () {
	route::get('/', [
		'as' => 'admin',
		'uses' => 'AdminController@getIndex'
	]);
	route::get('change-password/{id}', [
		'as' => 'changepassword',
		'uses' => 'AdminController@changePassword'
	]);
	route::post('change-password/{id}', [
		'as' => 'post_changepassword',
		'uses' => 'AdminController@postChangePassword'
	]);

	route::get('chi-tiet-de-tai/{id}', [
		'as' => 'chitietdetai',
		'uses' => 'AdminController@getDetailTopicAdmin'
	]);

	route::get('chi-tiet-de-tai/{id}/form-dang-ky-de-tai', [
		'as' => 'formdkchitietdetai',
		'uses' => 'AdminController@getRegisterFormDetailTopicAdmin'
	]);
	route::get('chi-tiet-de-tai/{id}/form-thuyet-minh-de-tai', [
		'as' => 'formtmchitietdetai',
		'uses' => 'AdminController@getDiscussFormDetailTopicAdmin'
	]);
	route::get('chi-tiet-de-tai/{id}/tai-xuong-form-thuyet-minh-de-tai', [
		'as' => 'downloadformtmchitietdetai',
		'uses' => 'AdminController@downloadDiscussFormDetailTopicAdmin'
	]);
	route::get('chi-tiet-de-tai/{id}/form-danh-gia-de-tai/{id_user}', [
		'as' => 'formdgchitietdetai',
		'uses' => 'AdminController@getEvaluateFormDetailTopicAdmin'
	]);
	route::get('form-ly-lich-khoa-hoc/{id_user}', [
		'as' => 'formlylichuser',
		'uses' => 'AdminController@getProfileUserFormDetailTopicAdmin'
	]);
	route::get('tai-xuong-form-ly-lich-khoa-hoc/{id_user}', [
		'as' => 'downloadformlylichuser',
		'uses' => 'AdminController@downloadProfileUserFormDetailTopicAdmin'
	]);
	route::get('chi-tiet-de-tai/{id}/form-bao-cao-de-tai', [
		'as' => 'formbaocaodetai',
		'uses' => 'AdminController@getReportFormDetailTopicAdmin'
	]);
	route::get('chi-tiet-de-tai/{id}/form-gia-han-de-tai', [
		'as' => 'formgiahandetai',
		'uses' => 'AdminController@getExtensionFormDetailTopicAdmin'
	]);

	route::get('danh-sach-de-tai-cap-truong', [
		'as' => 'danhsachdetaicaptruong',
		'uses' => 'AdminController@getTopicSchoolAdmin'
	]);

	route::post('gui-xet-duyet', [
		'as' => 'guixetduyet',
		'uses' => 'AdminController@postApprovalTopicAdmin'
	]);
	route::post('them-nguoi-phan-bien', [
		'as' => 'discusstopic',
		'uses' => 'AdminController@postDiscussTopicAdmin'
	]);
	route::get('duyet-phan-bien/{id}', [
		'as' => 'duyetphanbien',
		'uses' => 'AdminController@getApprovalDiscussAdmin'
	]);
	route::get('huy-phan-bien/{id}', [
		'as' => 'huyphanbien',
		'uses' => 'AdminController@getCancelDiscussAdmin'
	]);
	route::post('gui-yeu-cau-tham-dinh-de-tai', [
		'as' => 'adminguiyeucauthamdinhdetai',
		'uses' => 'AdminController@postRequestAcceptanceTopicApproval'
	]);
	route::get('chi-tiet-de-tai/{id}/bien-ban-hop-nghiem-thu-de-tai', [
		'as' => 'xemtongketnghiemthudetai',
		'uses' => 'AdminController@getFormAcceptanceTopicAdmin'
	]);
	route::post('gui-xac-nhan-thanh-ly-de-tai/{id}', [
		'as' => 'xacnhanthanhlydetai',
		'uses' => 'AdminController@postLiquidationTopicApproval'
	]);
	route::get('dang-ky-tai-khoan', [
		'as' => 'dangkytaikhoan',
		'uses' => 'AdminController@getRegisterUsers'
	]);
	route::post('dang-ky-tai-khoan', [
		'as' => 'dangkytaikhoan',
		'uses' => 'AdminController@postRegisterUsers'
	]);
	route::get('danh-sach-tai-khoan', [
		'as' => 'danhsachtaikhoan',
		'uses' => 'AdminController@getListUsers'
	]);
	route::get('xoa-user/{id}', [
		'as' => 'delete-user',
		'uses' => 'AdminController@deleteUser'
	]);
	route::get('sua-user/{id}', [
		'as' => 'edit-user',
		'uses' => 'AdminController@editUser'
	]);
	route::post('sua-user/{id}', [
		'as' => 'post_edit_user',
		'uses' => 'AdminController@post_editUser'
	]);
	route::get('thong-ke-de-tai', [
		'as' => 'thongkedetai',
		'uses' => 'AdminController@statistical_topic'
	]);
	route::get('cau-hinh-gmail-admin', [
		'as' => 'cauhinhgmailadmin',
		'uses' => 'AdminController@getConfigGmailAdmin'
	]);
	route::post('cau-hinh-gmail-admin', [
		'as' => 'cauhinhgmailadmin',
		'uses' => 'AdminController@postConfigGmailAdmin'
	]);
	route::get('cau-hinh-thong-tin', [
		'as' => 'cauhinhthongtin',
		'uses' => 'AdminController@getConfigInfoAdmin'
	]);
	route::get('viet-thong-bao', [
		'as' => 'vietthongbao',
		'uses' => 'AdminController@getNoticeAdmin'
	]);
	route::post('viet-thong-bao', [
		'as' => 'postthongbao',
		'uses' => 'AdminController@postNoticeAdmin'
	]);
	route::get('lich-su-thong-bao', [
		'as' => 'lichsuthongbao',
		'uses' => 'AdminController@getListNoticeAdmin'
	]);
	route::get('chinh-sua-thong-bao/{id}', [
		'as' => 'chinhsuathongbao',
		'uses' => 'AdminController@getEditNoticeAdmin'
	]);
	route::post('chinh-sua-thong-bao/{id}', [
		'as' => 'postchinhsuathongbao',
		'uses' => 'AdminController@postEditNoticeAdmin'
	]);
	route::get('xoa-thong-bao/{id}', [
		'as' => 'xoathongbao',
		'uses' => 'AdminController@postDeleteNoticeAdmin'
	]);
	route::post('cap-nhat-luong-co-ban', [
		'as' => 'capnhatluongcoban',
		'uses' => 'AdminController@postBasicSalaryAdmin'
	]);
	route::get('them-hoc-phan', [
		'as' => 'themhocphan',
		'uses' => 'AdminController@getAddTermAdmin'
	]);
	route::post('them-hoc-phan', [
		'as' => 'themhocphan',
		'uses' => 'AdminController@postAddTermAdmin'
	]);
	route::get('danh-sach-hoc-phan', [
		'as' => 'danhsachhocphan',
		'uses' => 'AdminController@ListTerm'
	]);
	route::get('cap-nhat-hoc-phan/{id}', [
		'as' => 'capnhathocphan',
		'uses' => 'AdminController@editTerm'
	]);
	route::post('cap-nhat-hoc-phan/{id}', [
		'as' => 'capnhathocphan',
		'uses' => 'AdminController@postEditTerm'
	]);
	route::get('xoa-hoc-phan/{id}', [
		'as' => 'xoahocphan',
		'uses' => 'AdminController@deleteTerm'
	]);
	route::get('danh-sach-tai-lieu-giang-day', [
		'as' => 'danhsachtailieu',
		'uses' => 'AdminController@ListDocument'
	]);
	route::get('chi-tiet-tai-lieu/{id}', [
		'as' => 'chitiettailieu',
		'uses' => 'AdminController@getDetailDocumentAdmin'
	]);
	route::get('chi-tiet-tai-lieu/{id}/form-dang-ky-bien-soan', [
		'as' => 'formdktailieu',
		'uses' => 'AdminController@getRegisterFormDocumentAdmin'
	]);
	route::post('gui-xet-duyet-tai-lieu', [
		'as' => 'guixetduyettailieu',
		'uses' => 'AdminController@postApprovalDocumentAdmin'
	]);
	route::post('gui-xet-duyet-de-cuong', [
		'as' => 'guixetduyetdecuong',
		'uses' => 'AdminController@postApprovalOutlineDocumentAdmin'
	]);
	route::get('chi-tiet-tai-lieu/{id}/form-duyet-de-cuong-bien-soan', [
		'as' => 'formdecuong',
		'uses' => 'AdminController@getRegisterOutlineFormDocumentAdmin'
	]);
	route::get('chi-tiet-tai-lieu/{id}/download-pdf-duyet-de-cuong-bien-soan', [
		'as' => 'downloadformdecuong',
		'uses' => 'AdminController@downloadRegisterOutlineFormDocumentAdmin'
	]);
	route::get('thong-ke-tai-lieu', [
		'as' => 'thongketailieu',
		'uses' => 'AdminController@statistical_doc'
	]);
	route::get('chi-tiet-tai-lieu/{id}/form-huy-bien-soan', [
		'as' => 'formhuytailieu',
		'uses' => 'AdminController@getFormCancelDocApproval'
	]);
	route::get('chi-tiet-tai-lieu/{id}/form-gia-han-bien-soan', [
		'as' => 'formgiahandocadmin',
		'uses' => 'AdminController@getFormExtendDocApproval'
	]);

	route::get('dat-lich-dang-ky', [
		'as' => 'datlichdangky',
		'uses' => 'AdminController@getScheduleRegister'
	]);
	route::post('dat-lich-dang-ky-de-tai', [
		'as' => 'datlichdangkydetai',
		'uses' => 'AdminController@postScheduleRegisterTopic'
	]);
	route::post('dat-lich-dang-ky-tai-lieu', [
		'as' => 'datlichdangkytailieu',
		'uses' => 'AdminController@postScheduleRegisterDoc'
	]);


	route::post('gui-yeu-cau-tham-dinh-tai-lieu', [
		'as' => 'adminguiyeucauthamdinh',
		'uses' => 'AdminController@postRequestAcceptanceDocApproval'
	]);

	route::post('dong-y-nghiem-thu-tai-lieu', [
		'as' => 'dongythanhlytailieu',
		'uses' => 'AdminController@postAgreeAcceptanceDocApproval'
	]);
	route::get('chi-tiet-tai-lieu/{id}/bien-ban-hop-nghiem-thu', [
		'as' => 'ketquanghiemthu',
		'uses' => 'AdminController@getFormAcceptanceDocumentAdmin'
	]);
	route::post('xac-nhan-huy-de-tai/{id}', [
		'as' => 'acceptcanceltopic',
		'uses' => 'AdminController@postAcceptCancelTopicApproval'
	]);
	route::get('xem-de-tai/{id}', [
		'as' => 'xemdetai',
		'uses' => 'AdminController@getDownloadTopicApproval'
	]);
	route::post('cho-thuc-hien/{id}', [
		'as' => 'chothuchien',
		'uses' => 'AdminController@getExecuteTopicApproval'
	]);
	route::post('bao-tre-han/{id}', [
		'as' => 'thongbaotrehan',
		'uses' => 'AdminController@NoticeLateTopicApproval'
	]);
	route::post('cho-bao-cao/{id}', [
		'as' => 'chophepbaocao',
		'uses' => 'AdminController@getReportTopicApproval'
	]);
	route::get('xac-nhan-bao-cao/{id}', [
		'as' => 'xacnhanbaocao',
		'uses' => 'AdminController@acceptReportTopicApproval'
	]);
	route::get('xac-nhan-gia-han/{id}', [
		'as' => 'xacnhangiahan',
		'uses' => 'AdminController@acceptExtensionTopicApproval'
	]);
	route::post('cho-nghiem-thu/{id}', [
		'as' => 'chonghiemthu',
		'uses' => 'AdminController@getAcceptanceTopicApproval'
	]);
	route::post('cho-thanh-ly/{id}', [
		'as' => 'chothanhly',
		'uses' => 'AdminController@getLiquidationTopicApproval'
	]);
	route::post('hoan-thanh/{id}', [
		'as' => 'hoanthanh',
		'uses' => 'AdminController@getCompleteTopicApproval'
	]);
	route::post('gui-chu-tich-thanh-ly-tai-lieu/{id}', [
		'as' => 'guithanhlytailieu',
		'uses' => 'AdminController@postLiquidationDocApproval'
	]);
});


//approval register
route::get('login-approval', [
	'as' => 'loginapproval',
	'uses' => 'ApprovalController@getLoginApproval'
]);
route::post('login-approval', [
	'as' => 'loginapproval',
	'uses' => 'ApprovalController@postLoginApproval'
]);
route::get('logout-approval', [
	'as' => 'logoutapproval',
	'uses' => 'ApprovalController@getLogoutApproval'
]);
route::get('xet-duyet-de-tai', [
	'as' => 'registerapproval',
	'uses' => 'ApprovalController@getRegisterApproval'
])->middleware('approval');
route::post('duyet-de-tai', [
	'as' => 'duyetdetai',
	'uses' => 'ApprovalController@postAcceptTopicApproval'
])->middleware('approval');
route::post('huy-de-tai', [
	'as' => 'huydetai',
	'uses' => 'ApprovalController@postCancelTopicApproval'
])->middleware('approval');
route::get('thanh-lap-nghiem-thu-de-tai/{id}', [
	'as' => 'laphoidongdetai',
	'uses' => 'ApprovalController@getCouncilAcceptanceTopicApproval'
])->middleware('approval');
route::post('gui-danh-sach-hoi-dong-nghiem-thu-de-tai/{id}', [
	'as' => 'guihoidongthamdinhdetai',
	'uses' => 'ApprovalController@postListCouncilAcceptanceTopicApproval'
])->middleware('approval');


//acceptance topic
route::get('login-acceptance-topic', [
	'as' => 'loginacceptancetopic',
	'uses' => 'AcceptanceTopicController@getLoginAcceptanceTopic'
]);
route::post('login-acceptance-topic', [
	'as' => 'loginacceptancetopic',
	'uses' => 'AcceptanceTopicController@postLoginAcceptanceTopic'
]);
route::get('logout-acceptance-topic', [
	'as' => 'logoutacceptancetopic',
	'uses' => 'AcceptanceTopicController@getLogoutAcceptanceTopic'
]);
route::get('danh-gia-nghiem-thu-de-tai/{id}', [
	'as' => 'danhgianghiemthudetai',
	'uses' => 'AcceptanceTopicController@getAcceptanceTopic'
])->middleware('acceptance_topic');
route::get('danh-gia-nghiem-thu-de-tai/{id}/form-danh-gia-nghiem-thu-de-tai/{id_acc}', [
	'as' => 'xemformnghiemthudetai',
	'uses' => 'AcceptanceTopicController@getFormAcceptanceTopic'
]);
route::post('gui-danh-gia-nghiem-thu-de-tai/{id}', [
	'as' => 'guinghiemthudetai',
	'uses' => 'AcceptanceTopicController@postSendAcceptanceTopic'
]);
route::get('danh-gia-nghiem-thu-de-tai/{id}/form-tong-ket-danh-gia-nghiem-thu-de-tai', [
	'as' => 'formtongketthamdinhdetai',
	'uses' => 'AcceptanceTopicController@getFormSummaryAcceptanceTopic'
]);
route::post('gui-tong-ket-nghiem-thu-de-tai/{id}', [
	'as' => 'guitongketnghiemthudetai',
	'uses' => 'AcceptanceTopicController@postSendSummaryAcceptanceTopic'
])->middleware('acceptance_topic');

//approval register document
route::get('login-approval-doc', [
	'as' => 'loginapprovaldoc',
	'uses' => 'ApprovalDocumentController@getLoginApprovalDoc'
]);
route::post('login-approval-doc', [
	'as' => 'loginapprovaldoc',
	'uses' => 'ApprovalDocumentController@postLoginApprovalDoc'
]);
route::get('logout-approval-doc', [
	'as' => 'logoutapprovaldoc',
	'uses' => 'ApprovalDocumentController@getLogoutApprovalDoc'
]);
route::get('xet-duyet-tai-lieu/{id}', [
	'as' => 'registerdocumentapproval',
	'uses' => 'ApprovalDocumentController@getRegisterDocumentApproval'
])->middleware('approval_doc');
route::post('gui-hoi-dong-xet-duyet', [
	'as' => 'guihoidong',
	'uses' => 'ApprovalDocumentController@postCouncilApproval'
])->middleware('approval_doc');
route::post('duyet-tai-lieu', [
	'as' => 'duyettailieu',
	'uses' => 'ApprovalDocumentController@postAcceptDocumentApproval'
])->middleware('approval_doc');
route::get('xet-duyet-de-cuong/{id}', [
	'as' => 'documentapproval',
	'uses' => 'ApprovalDocumentController@getAcceptOutlineDocumentApproval'
])->middleware('approval_doc');
route::get('xet-duyet-de-cuong/{id}/form-danh-gia/{id_eval}', [
	'as' => 'xemdanhgiatailieu',
	'uses' => 'ApprovalDocumentController@getFormEvaluteDocumentApproval'
])->middleware('approval_doc');

route::get('xet-duyet-de-cuong/{id}/lap-bien-ban-danh-gia', [
	'as' => 'lapbienban',
	'uses' => 'ApprovalDocumentController@getWriteReportEvaluteDocumentApproval'
])->middleware('approval_doc');
route::get('xet-duyet-de-cuong/{id}/xem-bien-ban-danh-gia', [
	'as' => 'bienbandanhgia',
	'uses' => 'ApprovalDocumentController@getReportEvaluteDocumentApproval'
])->middleware('approval_doc');
route::post('duyet-de-cuong', [
	'as' => 'duyetdecuong',
	'uses' => 'ApprovalDocumentController@postAcceptOutlineDocumentApproval'
])->middleware('approval_doc');
route::post('huy-bien-soan-tai-lieu', [
	'as' => 'huydecuong',
	'uses' => 'ApprovalDocumentController@postCloseOutlineDocumentApproval'
])->middleware('approval_doc');

route::post('xac-nhan-huy-bien-soan/{id}', [
	'as' => 'acceptcanceldoc',
	'uses' => 'ApprovalDocumentController@postAcceptCancelDocApproval'
])->middleware('approval');

route::post('cho-bao-cao-bien-soan-tai-lieu', [
	'as' => 'processdoc',
	'uses' => 'ApprovalDocumentController@postAcceptProcessDocumentApproval'
])->middleware('approval_doc');
route::post('cho-bao-cao-bien-soan-tai-lieu-lan-2', [
	'as' => 'reprocessdoc',
	'uses' => 'ApprovalDocumentController@postAcceptProcessDocumentApproval2'
])->middleware('approval_doc');
route::post('cho-bien-soan-tai-lieu', [
	'as' => 'compilation',
	'uses' => 'ApprovalDocumentController@postAcceptCompilationDocumentApproval'
])->middleware('approval_doc');
route::post('cho-nghiem-thu-bien-soan-tai-lieu', [
	'as' => 'acceptancedoc',
	'uses' => 'ApprovalDocumentController@postAcceptAcceptanceDocumentApproval'
])->middleware('approval_doc');
route::post('hoi-dong-nghiem-thu-bien-soan-tai-lieu', [
	'as' => 'councilacceptance',
	'uses' => 'ApprovalDocumentController@postCouncilAcceptanceDocumentApproval'
])->middleware('approval_doc');
route::post('cho-thanh-ly-bien-soan-tai-lieu', [
	'as' => 'liquidation',
	'uses' => 'ApprovalDocumentController@postAcceptLiquidationDocumentApproval'
])->middleware('approval_doc');
route::post('dong-y-thanh-ly-bien-soan-tai-lieu', [
	'as' => 'completedoc',
	'uses' => 'ApprovalDocumentController@postLiquidationDocumentApproval'
])->middleware('approval_doc');
route::post('bao-tre-han-bien-soan/{id}', [
	'as' => 'noticelatedoc',
	'uses' => 'ApprovalDocumentController@NoticeLateDocApproval'
])->middleware('approval_doc');
route::get('xac-nhan-gia-han-bien-soan/{id}', [
	'as' => 'xacnhangiahanbiensoan',
	'uses' => 'ApprovalDocumentController@acceptExtensionDocApproval'
])->middleware('approval_doc');
route::get('thanh-lap-nghiem-thu-tai-lieu/{id}', [
	'as' => 'thanhlapnghiemthutailieu',
	'uses' => 'ApprovalDocumentController@getAcceptAcceptanceDocumentApproval'
])->middleware('approval_doc');

route::post('gui-danh-sach-hoi-dong-nghiem-thu-tai-lieu/{id}', [
	'as' => 'guithanhlapnghiemthutailieu',
	'uses' => 'ApprovalDocumentController@postListCouncilAcceptanceDocumentApproval'
])->middleware('approval_doc');
route::post('kien-nghi-thanh-lap-nghiem-thu-tai-lieu', [
	'as' => 'guihoidongthamdinhtailieu',
	'uses' => 'ApprovalDocumentController@getCouncilAcceptanceDocumentApproval'
])->middleware('approval_doc');


//discuss doc
route::get('login-discuss-doc', [
	'as' => 'logindoc',
	'uses' => 'DocumentController@getLoginDoc'
]);
route::post('login-discuss-doc', [
	'as' => 'logindoc',
	'uses' => 'DocumentController@postLoginDoc'
]);
route::get('logout-discuss-doc', [
	'as' => 'logoutdoc',
	'uses' => 'DocumentController@getLogoutDoc'
]);
route::get('nhan-xet-tai-lieu/{id}', [
	'as' => 'discussdocumentapproval',
	'uses' => 'DocumentController@getDiscussDocumentApproval'
])->middleware('discuss_doc');
route::post('nhan-xet-tai-lieu/{id}', [
	'as' => 'discussdocumentapproval',
	'uses' => 'DocumentController@postDiscussDocumentApproval'
])->middleware('discuss_doc');
route::get('form-nhan-xet-tai-lieu/{id}', [
	'as' => 'formnhanxettailieu',
	'uses' => 'DocumentController@getFormDiscussDocumentApproval'
])->middleware('discuss_doc');


//evalute doc
route::get('login-evalute-doc', [
	'as' => 'loginevalute',
	'uses' => 'EvaluateDocController@getLoginEvalute'
]);
route::post('login-evalute-doc', [
	'as' => 'loginevalute',
	'uses' => 'EvaluateDocController@postLoginEvalute'
]);
route::get('logout-discuss-doc', [
	'as' => 'logoutevalute',
	'uses' => 'EvaluateDocController@getLogoutEvalute'
]);
route::get('danh-gia-tai-lieu/{id}', [
	'as' => 'evalutedocumentapproval',
	'uses' => 'EvaluateDocController@getEvaluteDocumentApproval'
])->middleware('evalute_doc');
route::post('danh-gia-tai-lieu/{id}', [
	'as' => 'evalutedocumentapproval',
	'uses' => 'EvaluateDocController@postEvaluteDocumentApproval'
])->middleware('evalute_doc');

route::get('danh-gia-tai-lieu/{id}/formdanhgiatailieu/{id_eval}', [
	'as' => 'formdanhgiatailieu',
	'uses' => 'EvaluateDocController@getFormEvaluteDocumentApproval'
])->middleware('evalute_doc');

//outside
route::get('danh-gia-tai-lieu-bien-soan/{id}', [
	'as' => 'evaluteoutside',
	'uses' => 'EvaluateDocController@getOutsideEvaluteDocumentApproval'
]);
route::post('danh-gia-tai-lieu-bien-soan/{id}', [
	'as' => 'evaluteoutside',
	'uses' => 'EvaluateDocController@postOutsideEvaluteDocumentApproval'
]);
route::get('form-danh-gia-tai-lieu-bien-soan/{id}', [
	'as' => 'formdanhgiatailieubiensoan',
	'uses' => 'EvaluateDocController@getOutsideFormEvaluteDocumentApproval'
]);

//acceptance_doc

route::get('login-acceptance-doc', [
	'as' => 'loginacceptance',
	'uses' => 'AcceptanceDocuments@getLoginAcceptance'
]);
route::post('login-acceptance-doc', [
	'as' => 'loginacceptance',
	'uses' => 'AcceptanceDocuments@postLoginAcceptance'
]);
route::get('logout-acceptance-doc', [
	'as' => 'logoutacceptance',
	'uses' => 'AcceptanceDocuments@getLogoutAcceptance'
]);
route::get('danh-gia-nghiem-thu-tai-lieu/{id}', [
	'as' => 'danhgianghiemthutailieu',
	'uses' => 'AcceptanceDocuments@getAcceptanceDocument'
])->middleware('acceptance_doc');
route::post('gui-danh-gia-nghiem-thu-tai-lieu/{id}', [
	'as' => 'sendacceptancedocapproval',
	'uses' => 'AcceptanceDocuments@postAcceptanceDocument'
])->middleware('acceptance_doc');
route::get('danh-gia-nghiem-thu-tai-lieu/{id}/form-tham-dinh-tai-lieu/{id_acc}', [
	'as' => 'formthamdinhtailieu',
	'uses' => 'AcceptanceDocuments@getFormAcceptanceDocument'
])->middleware('acceptance_doc');
route::get('tong-ket-danh-gia-nghiem-thu-tai-lieu/{id}', [
	'as' => 'formtongketthamdinhtailieu',
	'uses' => 'AcceptanceDocuments@getFormSummaryAcceptanceDocument'
])->middleware('acceptance_doc');
route::post('dong-y-nghiem-thu-tai-lieu/{id}', [
	'as' => 'dongynghiemthutaillieu',
	'uses' => 'AcceptanceDocuments@postAgreeAcceptanceDocument'
])->middleware('acceptance_doc');
route::post('huy-nghiem-thu-tai-lieu/{id}', [
	'as' => 'huynghiemthutailieu',
	'uses' => 'AcceptanceDocuments@postCancelDocument'
])->middleware('acceptance_doc');


//discuss topic
route::get('login-discuss', [
	'as' => 'logindiscuss',
	'uses' => 'DiscussController@getLoginDiscuss'
]);
route::post('login-discuss', [
	'as' => 'logindiscuss',
	'uses' => 'DiscussController@postLoginDiscuss'
]);
route::get('logout-discuss', [
	'as' => 'logoutdiscuss',
	'uses' => 'DiscussController@getLogoutDiscuss'
]);

route::get('phan-bien-thuyet-minh/{id}', [
	'as' => 'discuss',
	'uses' => 'DiscussController@getDiscussTopic'
])->middleware('discuss');
route::post('phan-bien-thuyet-minh/{id}', [
	'as' => 'discuss',
	'uses' => 'DiscussController@postDiscussTopic'
])->middleware('discuss');
route::get('phan-bien-thuyet-minh/{id}/form-danh-gia-de-tai/', [
	'as' => 'formdanhgiadetai',
	'uses' => 'DiscussController@getFormDiscussTopic'
])->middleware('discuss');
