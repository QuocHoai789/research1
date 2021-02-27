<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Collection;
// use Illuminate\Support\Arr;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\TermRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Closure;
use Illuminate\Support\Facades\Crypt;
use App\Exception;
use App\User;
use App\Topic;
use App\TopicM;
use App\Config;
use App\ConfigEnv;
use App\RegisterTopic;
use App\DiscussTopic;
use App\ScientificProfile;
use App\ScientificExplanation;
use App\ScientificDeployReport;
use App\ScientificExtension;
use App\ScientificCancel;
use App\WorkUnit;
use App\StudyDocument;
use App\Documents;
use App\Register_Documents;
use App\EvaluteDoc;
use App\OutsideCouncil;
use App\OutsideEvalute;
use App\DocumentCancel;
use App\DocumentExtension;
use App\AcceptanceDoc;
use App\AcceptanceTopic;
use App\SummaryAcceptance;
use App\NoticeSystem;
use PDF;
use Storage;
use Carbon\Carbon;

class AdminController extends Controller
{

	public function __construct()
	{

		$this->config = new ConfigEnv();
		// if (env('MAIL_USERNAME') != ConfigEnv::getUserNameGmail()) {
		setEnvironmentValue('MAIL_USERNAME', $this->config->getEnvironmentValue('user_name_gmail'));
		setEnvironmentValue('MAIL_PASSWORD', $this->config->getEnvironmentValue('password_gmail'));
		setEnvironmentValue('MAIL_MAILER', $this->config->getEnvironmentValue('mail_mailer'));
		setEnvironmentValue('MAIL_HOST', $this->config->getEnvironmentValue('mail_host'));
		setEnvironmentValue('MAIL_PORT', $this->config->getEnvironmentValue('mail_port'));
		setEnvironmentValue('MAIL_ENCRYPTION', $this->config->getEnvironmentValue('mail_encryption'));
		// }
	}
	public function getIndex()
	{
		$user = User::all();

		$i = 1;

		$topic_m = TopicM::where('status', 1)
			->where('close', 0)
			->with('user')
			->orderBy('id', 'desc')
			->get();
		$count_topic = TopicM::all()->count();
		$count_topic_finish = TopicM::where('status', 8)->count();

		$documents = Documents::where('status', 1)
			->where('close', 0)
			->with('user')
			->orderBy('id', 'desc')
			->get();
		$count_doc = Documents::all()->count();
		$count_doc_finish = Documents::where('status', 6)->count();
		return view('admin.admin', compact('topic_m', 'i', 'count_topic', 'count_topic_finish', 'user', 'documents', 'count_doc', 'count_doc_finish'));
	}
	public function getLoginAdmin()
	{
		return view('admin.login_admin');
	}
	public function postLoginAdmin(Request $req)
	{
		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {

			return redirect()->route('admin');
		} else {
			return redirect()->route('loginadmin')
				->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutAdmin()
	{
		Auth::logout();
		Artisan::call('view:clear');
		return redirect()->route('loginadmin');
	}
	public function changePassword($id)
	{
		$admin_infor = User::where('id', $id)
			->where('access_right', 'admin')
			->first();

		return view('admin.changepassword_admin', compact('admin_infor', 'id'));
	}
	public function postChangePassword($id, Request $request)
	{
		$request->validate(
			[
				'password' 			=> 'required|min:6',
				'newpassword' 		=> 'required|same:re_newpassword|min:6',
				're_newpassword' 	=> 'required',
			],
			[
				'required' 			=> 'Không được để trống trường',
				'password.min' 		=> 'Mật khẩu không nhỏ hơn 6 ký tự',
				'newpassword.min' 	=> 'Mật khẩu không nhỏ hơn 6 ký tự',
				'newpassword.same' 	=> 'Xác nhận mật khẩu mới không khớp',
			]
		);
		$admin = User::find($id);
		$password = $admin->password;
		if (Hash::check($request->password, $password)) {
			$newpassword = Hash::make($request->newpassword);
			$admin->update(['password' => $newpassword]);
			Auth::logout();
			return redirect()->route('loginadmin')
				->with('message', 'Đã đổi mật khẩu thành công!');
		} else {
			return redirect()->back()
				->with('message', 'Mật khẩu hiện tại không đúng');
		}
	}

	public function getDownloadTopicAdmin($id, $file)
	{
		$topic = TopicM::find($id);
		if (!isset($topic->acceptance)) {
			abort(404, 'Trang không tồn tại');
		}
		$files = json_decode($topic->acceptance, true);

		$headers = [
			'Content-Type' => 'application/pdf',
		];
		if ($file == 1) {
			return Storage::download($files[0], 'file1-nghiem-thu-de-tai.pdf', $headers);
		}
		if ($file == 2) {
			return Storage::download($files[1], 'file2-nghiem-thu-de-tai.pdf', $headers);
		}
	}

	public function getDetailTopicAdmin($id)
	{


		$topic 			= TopicM::with(['getRegisterTopic', 'user'])->find($id);
		if (!isset($_SESSION[$topic->slug_name_topic]) && $topic->notice_register == 0) {
			$_SESSION[$topic->slug_name_topic] = 1;
			$topic->notice_register = 1;
			$topic->save();
		}
		$user 			= User::all();
		$user_approval 	= User::find($topic->getRegisterTopic->id_user_approval);
		$discuss_topic 	= DiscussTopic::where('id_topic', $id)->with('user')->get();
		$researchType 	= json_decode($topic->getRegisterTopic->research_type, true);
		$dem 			= 0;
		$flag 			= 0;
		//expense
		$total = 0;

		if (count($discuss_topic) == 0) {
			$flag = 1;
		}
		foreach ($discuss_topic as $dis) {
			if ($dis->content != null || $dis->content != '') {
				$dem++;
			}
			if ($dis->status == 0) {
				$flag = 1;
			}
		}


		$scientific_extension = ScientificExtension::where('id', $topic->scientific_extension_id)
			->first();
		if (isset($scientific_extension)) {
			$time_new = json_decode($scientific_extension->time_new, true);
		} else {
			$time_new = null;
		}

		$explanation = ScientificExplanation::where('id', $topic->scientific_explanation_id)
			->first();
		if (isset($explanation)) {
			$organization = json_decode($explanation->organization, true);
			$time = json_decode($explanation->research_time, true);
			$topicManager = json_decode($explanation->topic_manager, true);
			$organization = json_decode($explanation->organization, true);
			$time = json_decode($explanation->research_time);
			$labor = json_decode($explanation->labor, true);
			$resources = json_decode($explanation->resources, true);
			$repair = json_decode($explanation->repair, true);
			$costDiff = json_decode($explanation->costDiff, true);
		} else {
			$organization = null;
			$time 		  = null;
			$topicManager = null;
			$organization = null;
			$time 		  = null;
			$labor 		  = null;
			$resources 	  = null;
			$repair 	  = null;
			$costDiff	  = null;
		}


		if (isset($labor->total)) {
			$total += str_replace(',', '', $labor->total);
		}
		if (isset($resources->total)) {
			$total += str_replace(',', '', $resources->total);
		}
		if (isset($repair->total)) {
			$total += str_replace(',', '', $repair->total);
		}
		if (isset($costDiff->total)) {
			$total += str_replace(',', '', $costDiff->total);
		}

		$report = ScientificDeployReport::where('id', $topic->scientific_deploy_report_id)
			->first();
		if (isset($report)) {
			$content = json_decode($report->content, true);
			$product = json_decode($report->product, true);
			$expense = json_decode($report->expense, true);
			$plan = json_decode($report->plan, true);
		} else {
			$content 	= null;
			$product 	= null;
			$expense 	= null;
			$plan 		= null;
		}

		$scientific_cancel = ScientificCancel::find($topic->scientific_cancel_id);
		if (isset($topic->acceptance)) {
			$fileAcceptance = json_decode($topic->acceptance, true);
		} else {
			$fileAcceptance = null;
		}
		if (isset($topic->liquidation)) {
			$fileLiquidation = json_decode($topic->liquidation, true);
		} else {
			$fileLiquidation = null;
		}
		if (isset($topic->getRegisterTopic->council)) {
			$council 	= json_decode($topic->getRegisterTopic->council, true);
		} else {
			$council = null;
		}

		return view(
			'admin.detail_topic_admin',
			compact(
				'topic',
				'user',
				'discuss_topic',
				'dem',
				'flag',
				'user_approval',
				'researchType',
				'scientific_extension',
				'topicManager',
				'organization',
				'time',
				'time_new',
				'total',
				'report',
				'content',
				'product',
				'expense',
				'plan',
				'scientific_cancel',
				'fileAcceptance',
				'fileLiquidation',
				'council'
			)
		);
	}


	public function getTopicSchoolAdmin()
	{
		$i 		= 1;
		$t 		= 2;
		$topic 	= TopicM::where('type_topic', 2)
			->with('user')
			->orderBy('id', 'desc')
			->get();
		return view('admin.topic_admin', compact('topic', 'i', 't'));
	}

	public function postApprovalTopicAdmin(Request $req)
	{
		$topic 								= TopicM::find($req->id_topic);
		$register_topic 					= RegisterTopic::where('id', $topic->register_id)
			->first();
		$user 								= User::find($req->id_user);
		$register_topic->id_user_approval 	= $req->id_user;
		$register_topic->save();


		$data = [
			'name' 			=> Auth::user()->name,
			'id_topic' 		=> $topic->id,
			'mess' 			=> $req->message,
			'name_topic' 	=> $topic->name_topic

		];

		// if ($topic->email != null)
		try {
			Mail::send('page.email_approval', $data, function ($message) use ($user, $topic) {
				$message->from(ENV('MAIL_USERNAME'), 'Xét duyệt đăng ký đề tài khoa học');
				$message->to($user->email, 'Đề tài:' . $topic->name_topic);
				$message->subject('Đề tài:' . $topic->name_topic);
			});
		} catch (\Exception $e) { // Using a generic exception
			Session::flash('error_message', 'Gửi mail không thành công');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Gửi mail thành công!');
		// }




		return redirect()->back();
	}
	public function postAcceptCancelTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$topic->close = 2;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã bị hủy !!!');
		return redirect()->back();
	}
	public function getDownloadTopicApproval($id)
	{
		$topic = Topic::find($id);
		$file = public_path() . "/file_topic/" . $topic->file_register;

		$headers = [
			'Content-Type' => 'application/pdf',
		];

		return response()->download($file, $topic->name_topic . '.pdf', $headers);
	}
	public function getExecuteTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$topic->status = 4;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã được cho phép thực hiện !!!');
		return redirect()->back();
	}
	public function getReportTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$topic->status = 5;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã được cho phép báo cáo tiến độ !!!');
		return redirect()->back();
	}
	public function NoticeLateTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$topic->notice_late = 1;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã trễ hạn báo cáo tiến độ !!!');
		return redirect()->back();
	}
	public function acceptExtensionTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$topic->notice_late = 2;
		$topic->save();
		return redirect()->back();
	}
	public function acceptReportTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$topic->status = 6;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã được cho phép nghiệm thu');
		return redirect()->back();
	}
	public function getLiquidationTopicApproval($id)
	{
		// dd($req->all());
		$topic = TopicM::find($id);
		$topic->status = 7;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã được cho phép thanh lý');
		return redirect()->back();
	}

	public function getCompleteTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$topic->status = 8;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã hoàn thành');
		return redirect()->back();
	}
	public function getAcceptanceTopicApproval($id, Request $req)
	{
		$topic = TopicM::find($id);
		$topic->notice_acceptance = 1;
		$topic->save();
		$user = User::find($topic->getRegisterTopic->id_user_approval);
		$data = [
			'name' => Auth::user()->name,
			'id_topic' => $topic->id,
			'mess' => $req->message,
			'name_topic' => $topic->name_topic

		];

		try {
			Mail::send('approval.email_acceptance_topic', $data, function ($message) use ($user, $topic) {
				$message->from(ENV('MAIL_USERNAME'), 'Thành lập hội đồng nghiệm thu đề tài ');
				$message->to($user->email, 'Đề tài:' . $topic->name_topic);
				$message->subject('Đề tài:' . $topic->name_topic);
			});
		} catch (\Exception $e) { // Using a generic exception
			Session::flash('error_message', 'Gửi mail không thành công!');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Gửi mail thành công thành công!');

		return redirect()->back();
	}

	public function postDiscussTopicAdmin(Request $req)
	{

		$topic 	= TopicM::find($req->id_topic);
		$user 	= User::find($req->id_user);
		$data 	= [
			'name' => Auth::user()->name,
			'id_topic' => $req->id_topic,
			'mess' => $req->message,
			'name_topic' => $topic->name_topic

		];
		$discuss_topic = DiscussTopic::where('id_topic', $req->id_topic)->get();

		$discuss_topic_old = DiscussTopic::where('id_topic', $req->id_topic)
			->where('id_user_discuss', $req->id_user)
			->get();
		// dd(count($discuss_topic_old));
		if (count($discuss_topic) < 5) {
			if (count($discuss_topic_old) == 0) {
				$discuss_topic 									= new DiscussTopic();
				$discuss_topic->id_topic 						= $topic->id;
				$discuss_topic->id_user_discuss 				= $user->id;
				$discuss_topic->overview 						= '';
				$discuss_topic->urgency 						= '';
				$discuss_topic->target 							= '';
				$discuss_topic->approach 						= '';
				$discuss_topic->content_and_process 			= '';
				$discuss_topic->product_of_topic 				= '';
				$discuss_topic->product_outstanding_of_topic 	= '';
				$discuss_topic->effective 						= '';
				$discuss_topic->study_experience 				= '';
				$discuss_topic->rationality 					= '';
				$discuss_topic->another_opinion 				= '';
				$discuss_topic->conclude 						= '';
				$discuss_topic->ability_to_perform 				= 0;
				$discuss_topic->expense 						= 0;
				$discuss_topic->value_expense 					= 0;
				$discuss_topic->status 							= 0;
				$discuss_topic->save();

				try {
					Mail::send('email.email_discuss', $data, function ($message) use ($user, $topic) {
						$message->from(ENV('MAIL_USERNAME'), 'Phản biện thuyết minh đề tài khoa học');
						$message->to($user->email, 'Đề tài:' . $topic->name_topic);
						$message->subject('Đề tài:' . $topic->name_topic);
					});
				} catch (\Exception $e) { // Using a generic exception
					Session::flash('error_message', 'Gửi mail không thành công');
					return redirect()->back();
				}
				Session::flash('flash_message', 'Gửi mail thành công!');

				return redirect()->back();
			} else {
				return redirect()->back()

					->with('error_message', 'Đã phân công cho người này');
			}
		} else {
			return redirect()->back()
				->with('error_message', 'Đã tối đa số người biện luận');
		}
	}
	public function getApprovalDiscussAdmin($id)
	{
		$topic 			= Topic::find($id);
		$topic->status 	= 5;
		$topic->save();
		return redirect()->back();
	}
	public function getCancelDiscussAdmin($id)
	{
		$topic 					= Topic::find($id);
		$topic->status_cancel 	= 1;
		$topic->save();
		return redirect()->back();
	}
	public function getRegisterUsers()
	{
		$list_unit = WorkUnit::all();
		return view('admin.register_user', compact('list_unit'));
	}
	public function postRegisterUsers(RegisterRequest $req)
	{
		// $validated = $req->validated();
		// dd($req->all());
		$user 							= new User();
		$user->msgv 					= $req->msgv;
		$user->password 				= Hash::make($req->password);
		$user->name 					= $req->name;
		$user->email 					= $req->email;
		$user->phone_number 			= $req->phone_number;
		$user->access_right 			= '';
		$user->scientific_profile_id 	= 0;

		if (!empty($req->more_user_infor)) {
			$user->more_user_information = $req->more_user_infor;
		} else {
			$user->more_user_information = ' ';
		}

		$user->work_unit_id = $req->work_unit_id;
		$user->degree = $req->degree;
		$user->save();
		return redirect()->route('danhsachtaikhoan');
	}
	public function getListUsers()
	{
		$i = 1;
		$users = User::orderBy('id', 'desc')
			->get();
		return view('admin.list_users', compact('users', 'i'));
	}
	public function deleteUser($id)
	{
		User::find($id)->delete();
		return redirect()->back()->with('message', 'Đã xóa user thành công!');
	}
	public function editUser($id)
	{
		$user = User::find($id);
		$list_unit = WorkUnit::all();
		return view('admin.edit-user', compact('user', 'list_unit'));
	}
	public function post_editUser($id, EditUserRequest $request)
	{

		$new_username 	= $request->new_username;
		$new_usermail 	= $request->new_usermail;
		$new_userphone 	= $request->new_userphone;

		if (!empty($request->new_more_information)) {
			$new_more_information = $request->new_more_information;
		} else {
			$new_more_information = ' ';
		}
		$new_work_unit_id = $request->new_work_unit_id;
		$new_degree = $request->new_degree;
		User::find($id)->update(
			[
				'name' => $new_username,
				'email' => $new_usermail,
				'phone_number' => $new_userphone,
				'more_user_information' => $new_more_information,
				'work_unit_id' => $new_work_unit_id,
				'degree' => $new_degree
			]
		);
		return redirect()->route('danhsachtaikhoan')->with('message', 'Đã cập nhật thông tin user thành công');
	}
	public function statistical_topic()
	{

		$topic                  = TopicM::all()->count();
		$all_topic              = TopicM::all();
		$ministry_topic         = TopicM::where('type_topic', 1)->count();
		$school_topic           = TopicM::where('type_topic', 2)->count();
		$student_topic          = TopicM::where('type_topic', 3)->count();
		$percent_ministry_topic = number_format($ministry_topic / $topic, 4) * 100;
		$percent_school_topic   = number_format($school_topic / $topic, 4) * 100;
		$percent_student_topic  = number_format(100 - ($percent_ministry_topic + $percent_school_topic), 4);

		$register_topic     = TopicM::where('status', 1)->where('close', 0)->count() / $topic * 100;
		$approval_topic     = TopicM::where('status', 2)->where('close', 0)->count() / $topic * 100;
		$scientific_topic   = TopicM::where('status', 3)->where('close', 0)->count() / $topic * 100;
		$perform_topic      = TopicM::where('status', 4)->where('close', 0)->count() / $topic * 100;
		$report_topic       = TopicM::where('status', 5)->where('close', 0)->count() / $topic * 100;
		$acceptance_topic   = TopicM::where('status', 6)->where('close', 0)->count() / $topic * 100;
		$liquidation_topic  = TopicM::where('status', 7)->where('close', 0)->count() / $topic * 100;
		$finish_topic       = TopicM::where('status', 8)->where('close', 0)->count() / $topic * 100;
		$close_topic        = 100 - $register_topic - $approval_topic - $scientific_topic - $perform_topic - $report_topic - $acceptance_topic - $liquidation_topic - $finish_topic;
		$data = [
			array('value' => $register_topic, 'label' => 'Đề tài đang chờ xét duyệt'),
			array('value' => $approval_topic, 'label' => 'Đề tài được xét duyệt'),
			array('value' => $scientific_topic, 'label' => 'Đề tài đang thuyết minh'),
			array('value' => $perform_topic, 'label' => 'Đề tài đang thực hiện'),
			array('value' => $report_topic, 'label' => 'Đề tài đang báo cáo'),
			array('value' => $acceptance_topic, 'label' => 'Đề tài đang nghiệm thu'),
			array('value' => $liquidation_topic, 'label' => 'Đề tài đang thanh lý'),
			array('value' => $finish_topic, 'label' => 'Đề tài đã hoàn thành'),
			array('value' => $close_topic, 'label' => 'Đề tài đã bị hủy')
		];

		return view('admin.statistical_topic', compact('data', 'all_topic'));
	}
	public function statistical_doc()
	{
		$all_doc            = Documents::all();
		$doc                = Documents::all()->count();
		$curriculum         = Documents::where('type_doc', 1)->count();
		$lesson             = Documents::where('type_doc', 2)->count();
		$monographs         = Documents::where('type_doc', 3)->count();
		$references         = Documents::where('type_doc', 4)->count();
		$percent_curriculum = number_format($curriculum / $doc, 4) * 100;
		$percent_lesson     = number_format($lesson / $doc, 4) * 100;
		$percent_monographs = number_format($monographs / $doc, 4) * 100;
		$percent_references = number_format(100 - ($percent_curriculum + $percent_lesson + $percent_monographs), 4);
		$data = [
			array('value' => $percent_curriculum, 'label' => 'Giáo trình'),
			array('value' => $percent_lesson, 'label' => 'Bài giảng'),
			array('value' => $percent_monographs, 'label' => 'Sách chuyên khảo'),
			array('value' => $percent_references, 'label' => 'Tài liệu tham khảo')
		];

		return view('admin.statistical_doc', compact('all_doc', 'data'));
	}

	public function getRegisterFormDetailTopicAdmin($id)
	{
		$topic = TopicM::find($id);
		$researchType = json_decode($topic->getRegisterTopic->research_type, true);
		return view('admin.form_register_topic', compact('topic', 'researchType'));
	}
	public function getDiscussFormDetailTopicAdmin($id)
	{
		$topicM = TopicM::where('id', $id)->get()->first();
		$researchType = json_decode($topicM->getRegisterTopic->research_type, true);

		$scientificExplanation = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', $topicM->users_id)->get()->first();
		// dd($scientificExplanation);

		$researchLevel       = json_decode($scientificExplanation->research_level, true);
		$researchTime        = json_decode($scientificExplanation->research_time);
		$organization        = json_decode($scientificExplanation->organization);
		$topicManager        = json_decode($scientificExplanation->topic_manager);
		$member              = json_decode($scientificExplanation->member);
		$coordination        = json_decode($scientificExplanation->coordination);
		$target              = json_decode($scientificExplanation->target);
		$research            = json_decode($scientificExplanation->research);
		$progress            = json_decode($scientificExplanation->progress);
		$productScience      = json_decode($scientificExplanation->product_science, true);
		$productEducate      = json_decode($scientificExplanation->product_educate, true);
		$productApp          = json_decode($scientificExplanation->product_app, true);
		$productDiff         = $scientificExplanation->product_diff;
		$labor               = json_decode($scientificExplanation->labor);
		$resources           = json_decode($scientificExplanation->resources);
		$repair              = json_decode($scientificExplanation->repair);
		$costDiff            = json_decode($scientificExplanation->costDiff);
		return view('admin.form_scientific_explantion', compact('topicM', 'researchType', 'researchLevel', 'researchTime', 'organization', 'topicManager', 'member', 'coordination', 'target', 'research', 'progress', 'productScience', 'productEducate', 'productApp', 'productDiff', 'labor', 'resources', 'repair', 'costDiff'));
	}
	public function downloadDiscussFormDetailTopicAdmin($id)
	{
		$topicM = TopicM::where('id', $id)->where('users_id', Auth::user()->id)->get()->first();
		if (!isset($topicM)) {
			return redirect()->back();
		}
		$researchType = json_decode($topicM->getRegisterTopic->research_type, true);
		$scientificExplanation = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', Auth::user()->id)->get()->first();
		if (!isset($scientificExplanation)) {
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		}
		$researchLevel      = json_decode($scientificExplanation->research_level, true);
		$researchTime       = json_decode($scientificExplanation->research_time);
		$organization       = json_decode($scientificExplanation->organization);
		$topicManager       = json_decode($scientificExplanation->topic_manager);
		$member             = json_decode($scientificExplanation->member);
		$coordination       = json_decode($scientificExplanation->coordination);
		$target             = json_decode($scientificExplanation->target);
		$research           = json_decode($scientificExplanation->research);
		$progress           = json_decode($scientificExplanation->progress);
		$productScience     = json_decode($scientificExplanation->product_science, true);
		$productEducate     = json_decode($scientificExplanation->product_educate, true);
		$productApp         = json_decode($scientificExplanation->product_app, true);
		$productDiff        = $scientificExplanation->product_diff;
		$labor              = json_decode($scientificExplanation->labor);
		$resources          = json_decode($scientificExplanation->resources);
		$repair             = json_decode($scientificExplanation->repair);
		$costDiff           = json_decode($scientificExplanation->costDiff);

		$pdf = PDF::loadView('pdf.scientific_explanation_pdf', compact('topicM', 'researchType', 'scientificExplanation', 'researchLevel', 'researchTime', 'organization', 'topicManager', 'member', 'coordination', 'target', 'research', 'progress', 'productScience', 'productEducate', 'productApp', 'labor', 'resources', 'repair', 'costDiff'));
		return $pdf->stream();
	}
	public function getConfigGmailAdmin()
	{
		$mail_mailer        = $this->config->getEnvironmentValue('mail_mailer');
		$mail_host          = $this->config->getEnvironmentValue('mail_host');
		$mail_port          = $this->config->getEnvironmentValue('mail_port');
		$mail_encryption    = $this->config->getEnvironmentValue('mail_encryption');
		$user_name_gmail    = $this->config->getEnvironmentValue('user_name_gmail');

		return view('admin.config_gmail_admin', compact('mail_mailer', 'mail_host', 'mail_port', 'mail_encryption', 'user_name_gmail'));
	}
	public function postConfigGmailAdmin(Request $req)
	{
		$req->validate(
			[
				'email' => 'required|email',
				'password' => 'required',
				'mail_mailer' => 'required',
				'mail_host' => 'required',
				'mail_port' => 'required|numeric',
				'mail_encryption' => 'required',
			],
			[
				'required' => 'Không được để trống trường',
				'email.email' => 'Không đúng cú pháp gmail',
				'password.required' => 'Không được để trống trường mật khẩu',
				'mail_port.numeric' => 'MAIL_PORT phải là số',
			]
		);

		$this->config->setEnvironmentValue('user_name_gmail', $req->email);
		$this->config->setEnvironmentValue('password_gmail', $req->password);
		$this->config->setEnvironmentValue('mail_mailer', $req->mail_mailer);
		$this->config->setEnvironmentValue('mail_host', $req->mail_host);
		$this->config->setEnvironmentValue('mail_port', $req->mail_port);
		$this->config->setEnvironmentValue('mail_encryption', $req->mail_encryption);

		return redirect()->back()->with('success', 'Đã cập nhật email');
	}
	public function getConfigInfoAdmin()
	{
		$basic_salary = ConfigEnv::getBasicSalary();
		return view('admin.config_info_admin', compact('basic_salary'));
	}
	public function postBasicSalaryAdmin(Request $req)
	{
		$req->validate(
			[
				'basic_salary' => 'required|numeric',
			],
			[
				'basic_salary.required' => 'Không được để trống trường lương cơ bản trống',
				'basic_salary.numeric' 	=> 'Có ký tự không phải là số',
			]
		);
		$basic_salary = ConfigEnv::where('key', 'basic_salary')
			->first();
		$basic_salary->value = $req->basic_salary;
		$basic_salary->save();
		return redirect()->back()->with('success', 'Đã cập nhật lương cơ bản thành công');
	}
	public function getEvaluateFormDetailTopicAdmin($id, $id_user)
	{
		$topic = TopicM::find($id);
		$discuss_topic = DiscussTopic::where('id_topic', $id)->where('id_user_discuss', $id_user)->first();

		return view('admin.form_evaluate_topic', compact('topic', 'discuss_topic'));
	}
	public function getProfileUserFormDetailTopicAdmin( $id_user)
	{
		
		$user = User::where('id', $id_user)->first();

		$data               = ScientificProfile::where('users_id', $id_user)->first();
		if (isset($data)) {
			$academic           = json_decode($data->academic);
			$degree             = json_decode($data->degree);
			$contact            = json_decode($data->contact);
			$workPlace          = json_decode($data->work_place);
			$eduProcess         = json_decode($data->edu_process);
			$workProcess        = json_decode($data->working_process);
			$document           = json_decode($data->document, true);
			$article            = json_decode($data->article, true);
			$topicScience       = json_decode($data->topic_science);
			$guideStudent       = json_decode($data->guide_student);
			$countDiploma       = json_decode($data->count_diploma);
			$prize              = json_decode($data->prize, true);
			$language           = json_decode($data->language_level);
			$areasOfExpertise   = json_decode($data->areas_of_expertise);
			$studentAwards      = json_decode($data->student_awards);
			$license            = json_decode($data->license);
			$solution           = json_decode($data->solution);
			$application        = json_decode($data->application);
			$show               = json_decode($data->show);
			$seminorShow        = json_decode($data->seminor_show);
			$workUniversity     = json_decode($data->work_university);
			$experience         = json_decode($data->experience);
			return view('admin.form_profile_user', compact('user', 'data', 'academic', 'degree', 'contact', 'workPlace', 'eduProcess', 'workProcess', 'document', 'article', 'topicScience', 'guideStudent', 'countDiploma', 'prize', 'language', 'areasOfExpertise', 'studentAwards', 'license', 'solution', 'application', 'show', 'seminorShow', 'workUniversity', 'experience'));
		} else {

			$academic          	= null;
			$degree             = null;
			$contact            = null;
			$workPlace          = null;
			$eduProcess         = null;
			$workProcess        = null;
			$document           = null;
			$article            = null;
			$topicScience       = null;
			$guideStudent       = null;
			$countDiploma       = null;
			$prize              = null;
			$language           = null;
			$areasOfExpertise   = null;
			$studentAwards      = null;
			$license            = null;
			$solution           = null;
			$application        = null;
			$show               = null;
			$seminorShow        = null;
			$workUniversity     = null;
			$experience         = null;
			abort(404, 'Trang không tồn tại');
		}
	}
	public function downloadProfileUserFormDetailTopicAdmin(Request $req)
	{
		$id_user            = $req->id_user;
		$data               = ScientificProfile::where('users_id', $id_user)->get()->first();
		$academic           = json_decode($data->academic);
		$degree             = json_decode($data->degree);
		$contact            = json_decode($data->contact);
		$workPlace          = json_decode($data->work_place);
		$eduProcess         = json_decode($data->edu_process);
		$workProcess        = json_decode($data->working_process);
		$document           = json_decode($data->document, true);
		$article            = json_decode($data->article, true);
		$topicScience       = json_decode($data->topic_science);
		$guideStudent       = json_decode($data->guide_student);
		$countDiploma       = json_decode($data->count_diploma);
		$prize              = json_decode($data->prize, true);
		$language           = json_decode($data->language_level);
		$areasOfExpertise   = json_decode($data->areas_of_expertise);
		$studentAwards      = json_decode($data->student_awards);
		$license            = json_decode($data->license);
		$solution           = json_decode($data->solution);
		$application        = json_decode($data->application);
		$show               = json_decode($data->show);
		$seminorShow        = json_decode($data->seminor_show);
		$workUniversity     = json_decode($data->work_university);
		$experience         = json_decode($data->experience);

		$pdf = PDF::loadView('pdf.scientific_profile_pdf', compact('data', 'academic', 'degree', 'contact', 'workPlace', 'eduProcess', 'workProcess', 'document', 'article', 'topicScience', 'guideStudent', 'countDiploma', 'prize', 'language', 'areasOfExpertise', 'studentAwards', 'license', 'solution', 'application', 'show', 'seminorShow', 'workUniversity', 'experience'));
		$pdf->setOptions([
			'defaultFont' => 'serif',
		]);
		return $pdf->stream();
	}

	public function getReportFormDetailTopicAdmin($id)
	{
		$topic = TopicM::find($id);
		if ($topic->scientific_deploy_report_id != null) {
			$report          = ScientificDeployReport::where('id', $topic->scientific_deploy_report_id)->first();
			$explanation     = ScientificExplanation::where('id', $topic->scientific_explanation_id)->first();
			$topicManager    = json_decode($explanation->topic_manager);
			$organization    = json_decode($explanation->organization);
			$time            = json_decode($explanation->research_time);
			$content         = json_decode($report->content);
			$product         = json_decode($report->product);
			$expense         = json_decode($report->expense);
			$plan            = json_decode($report->plan);
			//expense
			$labor           = json_decode($explanation->labor);
			$resources       = json_decode($explanation->resources);
			$repair          = json_decode($explanation->repair);
			$costDiff        = json_decode($explanation->costDiff);
		}
		$pdf = PDF::loadView('pdf.scientific_deploy_report_pdf', compact('topic', 'topicManager', 'organization', 'time', 'labor', 'content', 'product', 'expense', 'report', 'plan'));
		return $pdf->stream();
	}
	public function getAddTermAdmin()
	{
		return view('admin.add_term');
	}
	public function postAddTermAdmin(TermRequest $req)
	{
		$term_id 			= $req->term_id;
		$name_tern 			= $req->name_tern;
		$number_of_credit 	= $req->number_of_credit;
		$number_of_lessons 	= $req->number_of_lessons;

		$study_document 					= new StudyDocument;
		$study_document->term_id 			= $term_id;
		$study_document->name_term 			= $name_tern;
		$study_document->number_of_credits	= $number_of_credit;
		$study_document->number_of_lessons 	= $number_of_lessons;
		$study_document->save();
		return redirect()->back();
	}
	public function ListTerm()
	{
		$terms = StudyDocument::all();
		$i = 1;
		return view('admin.listerm', compact('terms', 'i'));
	}
	public function editTerm($id)
	{
		$term = StudyDocument::find($id);
		if (isset($term)) {
			return view('admin.editterm', compact('term'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postEditTerm(TermRequest $req, $id)
	{


		$new_term_id 			= $req->term_id;
		$new_name_tern 			= $req->name_tern;
		$new_number_of_credit 	= $req->number_of_credit;
		$new_number_of_lessons 	= $req->number_of_lessons;

		$study_document 					= StudyDocument::find($id);
		$study_document->term_id 			= $new_term_id;
		$study_document->name_term 			= $new_name_tern;
		$study_document->number_of_credits 	= $new_number_of_credit;
		$study_document->number_of_lessons 	= $new_number_of_lessons;
		$study_document->save();
		return redirect(route('danhsachhocphan'));
	}
	public function deleteTerm($id)
	{
		$term = StudyDocument::find($id)->delete();
		return redirect()->back();
	}
	public function ListDocument()
	{

		$documents = Documents::all();
		if (isset($documents)) {
			$i = 1;
			return view('admin.listdocument', compact('documents', 'i'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getDetailDocumentAdmin($id)
	{
		$document   = Documents::find($id);

		if (!isset($_SESSION[$document->slug_doc]) && $document->notice_register == 0) {
			$_SESSION[$document->slug_doc] = 1;
			$document->notice_register = 1;
			$document->save();
		}

		$list_greed = json_decode($document->registerdoc->greed_council);
		if (isset($document->acceptance)) {
			$acceptance = json_decode($document->acceptance, true);
		} else {
			$acceptance = null;
		}
		if (isset($document->liquidation)) {
			$liquidation = json_decode($document->liquidation, true);
		} else {
			$liquidation = null;
		}
		$i = 1;
		return view('admin.detail_doc_admin', compact('document', 'list_greed', 'i', 'acceptance', 'liquidation'));
	}
	public function getRegisterFormDocumentAdmin($id)
	{
		$document   = Documents::find($id);
		if (isset($document)) {
			$id_user    = $document->users_id;
			$profile    = ScientificProfile::where('users_id', $id_user)->first();
			$degree     = json_decode($profile->degree);
			$members    = json_decode($document->members);
			$day        = json_decode($document->registerdoc->time_process);
			$study      = StudyDocument::find($document->registerdoc->study_document_id);
			return view('admin.form_register_doc', compact('document', 'degree', 'members', 'day', 'study'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}

	public function postApprovalOutlineDocumentAdmin(Request $req)
	{
		$doc            = Documents::find($req->id_doc);
		$register_doc   = Register_Documents::where('id', $doc->register_id)->first();
		$user           = User::find($req->id_user);
		$register_doc->id_user_approval = $req->id_user;
		// $id_president = $user->id;


		$data = [
			'name' 		=> Auth::user()->name,
			'id_doc' 	=> $doc->id,
			'mess' 		=> $req->message,
			'name_doc' 	=> $doc->name_doc

		];



		try {
			Mail::send('admin.email_outline_approval', $data, function ($message) use ($user, $doc) {
				$message->from(ENV('MAIL_USERNAME'), 'Xét duyệt đề cương biên soạn tài liệu giảng dạy');
				$message->to($user->email, 'Tài liệu:' . $doc->name_doc);
				$message->subject('Đề tài:' . $doc->name_doc);
			});
		} catch (\Exception $e) { // Using a generic exception
			Session::flash('error_message', 'Gửi mail không thành công!');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Đã gửi mail thành công!');
		// }
		$register_doc->save();



		return redirect()->back();
	}


	public function getExtensionFormDetailTopicAdmin($id)
	{
		$topic = TopicM::find($id);
		if (!isset($topic->scientific_extension_id)) {
			abort(404, 'Trang không tồn tại');
		}
		if ($topic->scientific_extension_id != null) {
			$extension          = ScientificExtension::where('id', $topic->scientific_extension_id)->first();
			$explanation        = ScientificExplanation::where('id', $topic->scientific_explanation_id)->first();
			$organization       = json_decode($explanation->organization);
			$time               = json_decode($explanation->research_time);
			$time_new           = json_decode($extension->time_new);
			$pdf                = PDF::loadView('pdf.scientific_extension_pdf', compact('topic', 'extension', 'time', 'time_new', 'organization'));
			return $pdf->stream();
			// return view('admin.form_scientific_extension', compact('topic', 'scientific_extension', 'time', 'time_new', 'organization'));
		}
	}
	public function getRegisterOutlineFormDocumentAdmin($id)
	{
		// $id_user=Auth::user()->id;
		$doc = Documents::find($id);
		if ($doc != null) {
			$evalute_doc = EvaluteDoc::where('id_doc', $doc->id)->get();
			$score = [];
			foreach ($evalute_doc as $key => $eval) {
				if ($eval->position_council == 'president') {
					$score['president'] = $eval->total;
				} elseif ($eval->position_council == 'uv') {
					$score['uv'] = $eval->total;
				} elseif ($eval->position_council == 'pb1') {
					$score['pb1'] = $eval->total;
				} elseif ($eval->position_council == 'tk') {
					$score['tk'] = $eval->total;
				}
			}

			$outside_doc    = OutsideEvalute::where('id_doc', $doc->id)->first();
			$score['pb2']   = $outside_doc->total;
			$avg_score      = array_sum($score) / count($score);
			$id_user_doc    = $doc->users_id;
			$profile        = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree         = json_decode($profile->degree);
			$members        = json_decode($doc->members);
			$day            = json_decode($doc->registerdoc->time_process);
			$study          = StudyDocument::find($doc->registerdoc->study_document_id);
			return view('admin.form_evalute_report_doc', compact('doc', 'evalute_doc', 'outside_doc', 'profile', 'degree', 'members', 'day', 'study', 'score', 'avg_score'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}

	public function getFormCancelDocApproval($id)
	{
		$doc 		= Documents::find($id);
		$cancel_doc = DocumentCancel::find($doc->document_cancel_id);
		// dd($cancel_doc);
		return view('admin.form_cancel_doc', compact('doc', 'cancel_doc'));
	}
	public function getFormExtendDocApproval($id)
	{
		$doc 		= Documents::find($id);
		if (isset($doc)) {
			$extend_doc = DocumentExtension::find($doc->document_extension_id);
			// dd($cancel_doc);
			return view('admin.form_extend_doc', compact('doc', 'extend_doc'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function downloadRegisterOutlineFormDocumentAdmin($id)
	{
		// $id_user=Auth::user()->id;
		$doc = Documents::find($id);
		if ($doc != null) {
			$evalute_doc 	= EvaluteDoc::where('id_doc', $doc->id)->get();
			$score 			= [];
			foreach ($evalute_doc as $key => $eval) {
				if ($eval->position_council == 'president') {
					$score['president'] = $eval->total;
				} elseif ($eval->position_council == 'uv') {
					$score['uv'] = $eval->total;
				} elseif ($eval->position_council == 'pb1') {
					$score['pb1'] = $eval->total;
				} elseif ($eval->position_council == 'tk') {
					$score['tk'] = $eval->total;
				}
			}

			$outside_doc    = OutsideEvalute::where('id_doc', $doc->id)->first();
			$score['pb2']   = $outside_doc->total;
			$avg_score      = array_sum($score) / count($score);
			$id_user_doc    = $doc->users_id;
			$profile        = ScientificProfile::where('users_id', $id_user_doc)->first();
			$degree         = json_decode($profile->degree);
			$members        = json_decode($doc->members);
			$day            = json_decode($doc->registerdoc->time_process);
			$study          = StudyDocument::find($doc->registerdoc->study_document_id);
			$pdf = PDF::loadView('pdf.document_evalute_report_report_pdf', compact('doc', 'evalute_doc', 'outside_doc', 'profile', 'degree', 'members', 'day', 'study', 'score', 'avg_score'));
			return $pdf->stream();
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getScheduleRegister()
	{
		return view('admin.schedule_register');
	}


	public function postRequestAcceptanceDocApproval(Request $req)
	{
		// dd($req->all());
		$doc 					= Documents::find($req->id_doc);
		$doc->notice_acceptance = 2;
		$doc->save(); // dd($doc);
		$list_greed = json_decode($doc->registerdoc->greed_council); // dd($list_greed);
		$mails 		= [];
		$ids 		= [];
		foreach ($list_greed as $key => $gre) {
			$mail 		= User::where('name', $gre)
				->first();
			$mails[] 	= $mail->email;
			$ids[] 		= $mail->id;
		}
		// dd($ids);
		foreach ($ids as  $idd) {
			$acceptance_doc_old = AcceptanceDoc::where('id_doc', $req->id_doc)
				->where('id_user_acceptance', $idd)
				->get();

			if (count($acceptance_doc_old) == 0) {

				$acceptance_doc 						= new AcceptanceDoc();
				$acceptance_doc->id_doc 				= $doc->id;
				$acceptance_doc->id_user_acceptance 	= $idd;
				$acceptance_doc->accuracy 				= '0';
				$acceptance_doc->suitability 			= '0';
				$acceptance_doc->response_level 		= '0';
				$acceptance_doc->exercise_quality 		= '0';
				$acceptance_doc->logic 				    = '0';
				$acceptance_doc->image_quality 			= '0';
				$acceptance_doc->master_quality 		= '0';
				$acceptance_doc->references 			= '0';
				$acceptance_doc->total 					= '0';
				$acceptance_doc->opinion 				= '';
				$acceptance_doc->conclude 				= '';
				$acceptance_doc->position_council 		= '';

				$acceptance_doc->save();
			}
		}
		if (isset($doc->acceptance)) {
			$files = json_decode($doc->acceptance, true);
			//dd($files);
			// $url1  = Storage::disk('public')->url($files[0]);
			// $url2  = Storage::disk('public')->url($files[1]);
		}


		$data = [
			'name'    => Auth::user()->name,
			'id_doc'  => $doc->id,
			'mess'    => $req->message,
			'name_doc' => $doc->name_doc,
			'files' => $files,

		];
		// dd($mails);
		// ini_set('max_execution_time', 1800);
		try {
			Mail::send('acceptance_doc.email_acceptance_approval', $data, function ($message) 
				use ($mails, $doc) {
				$message->from(ENV('MAIL_USERNAME'), 'Thẩm định nghiệm thu tài liệu giảng dạy');
				// foreach ($files as $key => $file) {
				// 	$message->attach(Storage::disk('public')->url($file['path']));
				// }


				$message->to($mails, 'Tài liệu:' . $doc->name_doc);
				$message->subject('Tài liệu:' . $doc->name_doc);
			});
		} catch (\Exception $e) {
			Session::flash('error_message', 'Đã có lỗi trong quá trình gửi mail !');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Đã gửi mail thành công!');

		return redirect()->back();
	}
	public function postAgreeAcceptanceDocApproval(Request $req)
	{
		$doc         = Documents::find($req->id_doc);
		$doc->status = 5;
		$doc->save();
		return redirect()->back();
	}
	public function postScheduleRegisterTopic(Request $req)
	{
		$req->validate(
			[
				'date_start_register_topic' => 'required',
				'date_end_register_topic' => 'required',
			],
			[
				'required' => 'Không được để trống trường',
			]
		);
		try {
			$config = new ConfigEnv();
			$config->setEnvironmentValue('date_start_register_topic', $req->date_start_register_topic);
			$config->setEnvironmentValue('date_end_register_topic', $req->date_end_register_topic);
		} catch (\Exception $e) {
		}
		return redirect()->back()->with('notice', 'Đặt lịch đăng ký đề tài thành công');
	}
	public function postScheduleRegisterDoc(Request $req)
	{
		$req->validate(
			[
				'date_start_register_doc' => 'required',
				'date_end_register_doc' => 'required',
			],
			[
				'required' => 'Không được để trống trường',
			]
		);
		try {
			$config = new ConfigEnv();
			$config->setEnvironmentValue('date_start_register_doc', $req->date_start_register_doc);
			$config->setEnvironmentValue('date_end_register_doc', $req->date_end_register_doc);
		} catch (\Exception $e) {
		}
		return redirect()->back()->with('notice', 'Đặt lịch đăng ký tài liệu thành công');
	}
	public function getFormAcceptanceDocumentAdmin($id)
	{
		$i = 1;
		$doc = Documents::find($id);
		$list_greed = AcceptanceDoc::where('id_doc', $id)->get();
		$summary_acc = SummaryAcceptance::where('id_doc', $id)->first();
		if (isset($summary_acc)) {
			$greed_council = json_decode($summary_acc->greed_council);
			$score = json_decode($summary_acc->score);
		} else {
			$greed_council = null;
			$score = null;
		}




		// return view('admin.form_summary_acceptance', compact('doc','list_greed', 'summary_acc','greed_council','score','i'));
		$pdf = PDF::loadView('pdf.form_summary_acceptance_pdf', compact('doc', 'list_greed', 'summary_acc', 'greed_council', 'score', 'i'));
		return $pdf->stream();
	}
	public function postLiquidationDocApproval($id, Request $req)
	{
		$doc = Documents::find($id);
		$doc->status = 6;
		$doc->save();
		$greed_council 	= json_decode($doc->registerdoc->greed_council, true);
		$president_name = $greed_council['president'];
		$user_president = User::where('name', $president_name)->first();
		$mail 			= $user_president->email;
		if (isset($doc->liquidation)) {
			$files			= json_decode($doc->liquidation, true);
			
		}else{
			$files = null;
		}


		$data = [
			'name' => Auth::user()->name,
			'id_doc' => $doc->id,
			'mess' => $req->message,
			'name_doc' => $doc->name_doc,
			'files' => $files,

		];
		// ini_set('max_execution_time', 1800);
		try {
			Mail::send('liquidation_doc.email_liquidation_approval', $data, function ($message) use ($mail, $doc) {
				$message->from(ENV('MAIL_USERNAME'), 'Xem lại tài liệu sau khi chỉnh sửa nghiệm thu ');
				// foreach ($files as $key => $file) {
				// 	$message->attach(Storage::disk('public')->url($file['path']));
				// }



				$message->to($mail, 'Tài liệu:' . $doc->name_doc);
				$message->subject('Tài liệu:' . $doc->name_doc);
			});
		} catch (\Exception $e) {
			Session::flash('error_message', 'Đã có lỗi trong quá trình gửi mail !');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Đã gửi mail thành công!');

		return redirect()->back();
	}
	public function postRequestAcceptanceTopicApproval(Request $req)
	{
		// dd($req->all());
		$topic = TopicM::find($req->id_topic);
		$topic->notice_acceptance = 3;
		$topic->save();
		// dd($doc);
		$listcouncil = json_decode($topic->getRegisterTopic->council, true);
		// dd($listcouncil);
		$mails = [];
		$ids = [];
		foreach ($listcouncil as $key => $li) {
			$mail = User::where('name', $li)->first();
			$mails[] = $mail->email;
			$ids[] = $mail->id;
		}
		// dd($mails);
		foreach ($ids as  $idd) {
			$acceptance_topic_old = AcceptanceTopic::where('id_topic', $req->id_topic)
				->where('id_user_acceptance', $idd)
				->get();

			if (count($acceptance_topic_old) == 0) {

				$acc_topic = new AcceptanceTopic;
				$acc_topic->id_topic 						= $topic->id;
				$acc_topic->id_user_acceptance 				= $idd;
				$acc_topic->target 							= '0';
				$acc_topic->content  						= '0';
				$acc_topic->approach 						= '0';
				$acc_topic->product_application 			= '0';
				$acc_topic->scientific_products 			= '0';
				$acc_topic->training_products 				= '0';
				$acc_topic->scientific_value 				= '0';
				$acc_topic->application_value				= '0';
				$acc_topic->about_education_and_training 	= '0';
				$acc_topic->socio_economic 					= '0';
				$acc_topic->transfer_method 				= '0';
				$acc_topic->student_training 				= '0';
				$acc_topic->scientific_article 				= '0';
				$acc_topic->report_quality 					= '0';
				$acc_topic->total 							= '0';
				$acc_topic->classification 					= '0';
				$acc_topic->opinion 						= '';
				$acc_topic->position_council 				= '';
				$acc_topic->save();
			}
		}
		if (isset($topic->acceptance)) {
			$files = json_decode($topic->acceptance, true);

			// $url1 = Storage::disk('public')->url($files[0]['path']);
			// $url2 = Storage::disk('public')->url($files[1]['path']);
		}else{
			$files = null;
		}

		$data = [
			'name' => Auth::user()->name,
			'id_topic' => $topic->id,
			'mess' => $req->message,
			'name_topic' => $topic->name_topic,
			'files' => $files,

		];
		// dd($mails);
		// ini_set('max_execution_time', 1800);
		try {
			Mail::send('acceptance_topic.email_acceptance_approval', $data, function ($message) use ($mails, $topic) {
				$message->from(ENV('MAIL_USERNAME'), 'Thẩm định nghiệm thu đề tài cấp trường');

				// foreach ($files as $key => $file) {
				// 	$message->attach(Storage::disk('public')->url($file['path']));
				// }

				$message->to($mails, 'Đề tài:' . $topic->name_topic);
				$message->subject('Đề tài:' . $topic->name_topic);
			});
		} catch (\Exception $e) {
			Session::flash('error_message', 'Đã có lỗi trong quá trình gửi mail !');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Đã gửi mail thành công!');

		return redirect()->back();
	}
	public function getFormAcceptanceTopicAdmin($id)
	{
		$topic = TopicM::find($id);
		if (isset($topic)) {
			return view('admin.form_summary_topic', compact('topic'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postLiquidationTopicApproval($id, Request $req)
	{
		$topic = TopicM::find($id);
		$topic->status = 8;
		$topic->save();
		$user = User::find($topic->getRegisterTopic->id_user_approval);
		$mail = $user->email;
		if (isset($topic->liquidation)) {
			$files = json_decode($topic->liquidation, true);
			// $url1 = Storage::disk('public')->url($files[0]['path']);
			// $url2 = Storage::disk('public')->url($files[1]['path']);
		}else{
			$files = null;
		}


		$data = [
			'name' => Auth::user()->name,
			'id_topic' => $topic->id,
			'mess' => $req->message,
			'name_topic' => $topic->name_topic,
			'files' => $files,

		];
		// dd($mails);
		// ini_set('max_execution_time', 1800);
		try {
			Mail::send('liquidation_topic.email_liquidation_approval', $data, function ($message) use ($mail, $topic) {
				$message->from(ENV('MAIL_USERNAME'), 'Xem đề tài đã được chỉnh sửa sau khi nghiệm thu');


				// foreach ($files as $key => $file) {
				// 	$message->attach(Storage::disk('public')->url($file['path']));
				// }

				$message->to($mail, 'Đề tài:' . $topic->name_topic);
				$message->subject('Đề tài:' . $topic->name_topic);
			});
		} catch (\Exception $e) {
			Session::flash('error_message', 'Đã có lỗi trong quá trình gửi mail !');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Đã gửi mail thành công!');
		noticeMail($topic->id, 'Đề tài đã được hoàn thành');
		return redirect()->back();
	}
	public function getNoticeAdmin()
	{
		session_start();
		$_SESSION['CKFinder_UserRole'] = 'administrator';
		return view('admin.write_notice');
	}
	public function postNoticeAdmin(Request $req)
	{
		// dd($req->all());
		$req->validate(
			[
				'title' => 'required',
				'content' => 'required'
			],
			[
				'title.required' => 'Tiêu đề không được để trống',
				'content.required' => 'Nội dung thông báo không được để trống'
			]
		);
		$notice = new NoticeSystem;
		$notice->id_user_notice = $req->id_user;
		$notice->title = $req->title;
		$notice->content = $req->content;
		$notice->save();
		return redirect()->back();
	}
	public function getListNoticeAdmin()
	{
		$list_notice = NoticeSystem::all();
		if (isset($list_notice)) {
			return view('admin.list_notice_system', compact('list_notice'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getEditNoticeAdmin($id)
	{
		session_start();
		$_SESSION['CKFinder_UserRole'] = 'administrator';
		$notice = NoticeSystem::find($id);
		if (isset($notice)) {
			return view('admin.edit_notice_system', compact('notice'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postEditNoticeAdmin($id, Request $req)
	{
		// dd($req->all());
		$req->validate(
			[
				'title' => 'required',
				'content' => 'required'
			],
			[
				'title.required' => 'Tiêu đề không được để trống',
				'content.required' => 'Nội dung thông báo không được để trống'
			]
		);
		$new_title = $req->title;
		$new_content = $req->content;
		$notice = NoticeSystem::find($id);
		$notice->title = $new_title;
		$notice->content = $new_content;
		$notice->save();
		return redirect(route('lichsuthongbao'))
			->with('message', 'Đã cập nhật thông báo thành công');
	}
	public function postDeleteNoticeAdmin($id)
	{
		NoticeSystem::find($id)->delete();
		return redirect()->back()
			->with('message', 'Đã xóa thông báo thành công');
	}
}
