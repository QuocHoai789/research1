<?php

namespace App\Http\Controllers;

use App\RegisterTopic;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use App\TopicM;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Session;
use Hash;
use Auth;
use Artisan;
use Mail;
use Closure;
use App\User;
use App\Topic;
use App\ConfigEnv;
use App\Config as ConfigMD;
use App\Http\Requests\RegisterTopicRequest;
use App\Http\Requests\ScientificProfileRequest;
use App\Http\Requests\ScientificExplanationRequest;
use App\Http\Requests\ScientificDeployReportRequest;
use App\Http\Requests\ScientificExtensionRequest;
use App\Http\Requests\ScientificCancelRequest;
use App\Http\Requests\RegisterDocumentRequest;
use App\Http\Requests\DocumentExtensionRequest;
use App\ScientificProfile;
use Facade\IgnitionContracts\Solution;
use App\ScientificExplanation;
use App\ScientificDeployReport;
use App\ScientificExtension;
use App\ScientificCancel;
use App\WorkUnit;
use App\Documents;
use App\Register_Documents;
use App\StudyDocument;
use App\DocumentExtension;
use App\DocumentCancel;
use App\AcceptanceDoc;
use App\SummaryAcceptance;
use App\NoticeSystem;
use Illuminate\Support\Facades\Storage;
use PDF;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class PageController extends Controller
{
	public function __construct()
	{

		setEnvironmentValue('MAIL_USERNAME', ConfigEnv::getUserNameGmail());
		setEnvironmentValue('MAIL_PASSWORD', ConfigEnv::getPasswordGmail());
	}
	public function getIndex()
	{
		$notices 	= NoticeSystem::paginate(8);
		$topics 	= TopicM::with('getRegisterTopic')->orderBy('created_at', 'desc')->paginate(8);
		$documents  = Documents::with('registerdoc')->orderBy('created_at', 'desc')->paginate(8);
		return view('page.index', compact('notices', 'topics', 'documents'));
	}
	public function getContact()
	{
		return view('page.contact');
	}

	public function getSchool()
	{
		$id_user = Auth::user()->id;
		$i = 1;
		$level_school = TopicM::where('users_id', $id_user)
			->where('type_topic', 2)
			->orderBy('id', 'desc')
			->paginate(10);
		return view('page.level_school', compact('level_school', 'i'));
	}

	public function getLogin()
	{
		return view('page.login');
	}

	public function postLogin(Request $req)
	{
		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			return redirect()->intended();
		} else {
			return redirect()->route('login')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function changePasswordUser()
	{
		$users_id =  Auth::user()->id;
		$user = User::where('id', $users_id)->first();
		return view('page.change-password-user')->with('user', $user);
	}
	public function postChangePasswordUser(Request $request)
	{
		$request->validate(
			[
				'user_password' => 'required|min:6',
				'new_user_password' => 'required|same:re_new_user_password',
				're_new_user_password' => 'required',
			],
			[
				'required' => 'Không được để trống trường',
				'user_password.min' => 'Mật khẩu không nhỏ hơn 6 ký tự',
				'new_user_password.same' => 'Xác nhận mật khẩu mới không khớp',
			]
		);
		$users_id =  Auth::user()->id;
		$user = User::find($users_id);
		$password = $user->password;

		if (Hash::check($request->user_password, $password)) {
			$newpassword = Hash::make($request->new_user_password);
			$user->update(['password' => $newpassword]);
			Auth::logout();
			return redirect()->route('login')->with('message', 'Đã đổi mật khẩu mới');
		} else {
			return redirect()->back()->with('message', 'Mật khẩu hiện tại không đúng');
		}
	}
	public function changeInformationUser()
	{
		$user_id = Auth::user()->id;
		$infor_user = User::where('id', $user_id)->first();
		$list_unit = WorkUnit::all();
		return view('page.change-infor-user', compact('infor_user', 'list_unit'));
	}
	public function postChangeInformationUser(Request $request)
	{
		$request->validate(
			[
				'new_username' => 'required',
				'new_email' => 'required|email',
				'new_phone' => 'required',
				'new_more_information' => 'max:500',
			],
			[
				'new_username.required' => 'Không được để trống họ tên',
				'new_email.required' => 'Không được để trống email',
				'new_phone.required' => 'Không được để trống số điện thoại',
				'new_more_information.max' => 'Thông tin thêm không được vượt quá 500 ký tự',
				'new_email.email' => 'Sai định dạng email',
			]
		);
		$name = $request->new_username;
		$email = $request->new_email;
		$phone = $request->new_phone;
		if (!empty($request->new_more_information)) {
			$more_user_information = $request->new_more_information;
		} else {
			$more_user_information = ' ';
		}
		$work_unit_id = $request->new_work_unit_id;
		$new_degree = $request->new_degree;
		User::find(Auth::user()->id)->update(['name' => $name, 'email' => $email, 'phone_number' => $phone, 'more_user_information' => $more_user_information, 'work_unit_id' => $work_unit_id, 'degree' => $new_degree]);
		return redirect()->route('trangchu')->with('message', 'Đã cập nhập thông tin cá nhân thành công!');
	}
	public function getLogout()
	{
		Auth::logout();
		Artisan::call('view:clear');
		return redirect()->route('trangchu');
	}


	public function getDetailTopic($slug)
	{
		$id_user = Auth::user()->id;
		$topic = TopicM::where('users_id', $id_user)
			->where('slug_name_topic', $slug)
			->first();
		$fileAcceptance = json_decode($topic->acceptance, true);
		$fileLiquidation = json_decode($topic->liquidation, true);
		if ($topic != null) {
			return view('page.detail_topic', compact('topic', 'fileAcceptance', 'fileLiquidation'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getRegisterTopicSchool()
	{
		if (status_date_time_register_system('date_start_register_topic', 'date_end_register_topic')) {
			$id_user = Auth::user()->id;
			$user = User::where('scientific_profile_id', 0)
				->find($id_user);
			if ($user) {
				return redirect()->route('dangkydetaichunhiemdetai');
			} else {
				return view('page.register_topic_school');
			}
		} else
			return view('page.error-system');
	}
	public function postRegisterTopicSchool(RegisterTopicRequest $req)
	{

		if (status_date_time_register_system('date_start_register_topic', 'date_end_register_topic')) {

			$count = $req->magazine_internation + $req->magazine_domestic + $req->publish;
			if ($count == 0) {
				return back()->withErrors('Sản phẩm khoa học phải chọn 1 loại')->withInput($req->all());
			}
			$register 						= new RegisterTopic();
			$register->research_type 		= json_encode($req->type);
			$register->importance 			= $req->importance;
			$register->target 				= $req->target;
			$register->content_topic 		= $req->content;
			$register->magazine_internation = $req->magazine_internation;
			$register->magazine_domestic 	= $req->magazine_domestic;
			$register->publish 				= $req->publish;
			$register->specialized 			= $req->specialized;
			$register->master 				= $req->master;
			$register->doctor 				= $req->doctor;
			$register->application 			= $req->application;
			$register->application_diff 	= $req->application_diff;
			$register->effective 			= $req->effective;
			$register->time 				= $req->time;
			$register->expense 				= $req->expense;
			$register->id_user_approval 	= 0;
			$register->save();

			//store topic_m
			$topic 					= new TopicM();
			$slug_name 				= '';
			$topic->name_topic 		= $req->name_topic;
			$topic->slug_name_topic = $slug_name;
			$topic->register_id 	= $register->id;
			$topic->users_id 		= Auth::user()->id;
			$topic->status 			= 1;
			$topic->type_topic 		= 2;
			$topic->save();
			$slug_name 				= Str::slug($req->name_topic, '-') . '-' . $topic->id;
			$topic->slug_name_topic = $slug_name;
			$topic->save();
			//send mail notification
			$data = [
				'name' => Auth::user()->name,
				'name_topic' => "$req->name_topic",
				// 'email'=> "$req->email"
			];
			try {
				Mail::send('page.email', $data, function ($message) {
					$message->from(env('MAIL_USERNAME'), 'Đăng Ký Đề Tài Khoa học');
					$message->to(env('MAIL_USERNAME'), 'Đăng Ký Đề Tài Khoa học');
					$message->subject('Đăng ký đề tài khoa học');
				});
			} catch (\Exception $e) { // Using a generic exception
				Session::flash('flash_message', 'Đăng ký thành công (NSM)');
				return redirect()->route('nghiencuukhoahoccaptruong');
			}
			Session::flash('flash_message', 'Đăng ký thành công');
			return redirect()->route('nghiencuukhoahoccaptruong');
		} else {
			return view('page.error-system');
		}
	}
	public function getScientificProfile()
	{

		$user = User::where('id', Auth::user()->id)->first();

		if ($user->scientific_profile_id != 0) {
			return redirect()->route('detaichunhiemdetai');
		} else {
			return view('page.scientific_profile');
		}
	}
	public function postScientificProfile(ScientificProfileRequest $req)
	{
		$id_user = Auth::user()->id;
		$document 	= [];
		$article 	= [];
		$prize 		= [];
		$solution 	= $req->solution;
		$application = $req->application;
		$show 		= $req->show;
		$seminorShow = $req->seminorShow;
		$workUniversity = $req->workUniversity;
		$experience = $req->experience;
		$license = $req->license;
		$studentAwards = $req->studentAwards;
		$academic = $req->academic;
		foreach ($solution as $key => $item) {
			if ($item['name'] == null && $item['product'] == null && $item['code'] == null && $item['time'] == null && $item['address'] == null && $item['author'] == null) {
				unset($solution[$key]);
			}
		}
		foreach ($application as $key => $item) {
			if ($item['name'] == null && $item['forms'] == null && $item['time'] == null && $item['product'] == null) {
				unset($application[$key]);
			}
		}
		foreach ($show as $key => $item) {
			if ($item['name'] == null && $item['time'] == null && $item['title'] == null) {
				unset($show[$key]);
			}
		}
		foreach ($seminorShow as $key => $item) {
			if ($item['name'] == null && $item['time'] == null && $item['title'] == null) {
				unset($seminorShow[$key]);
			}
		}
		foreach ($workUniversity as $key => $item) {
			if ($item['name'] == null && $item['time'] == null && $item['content'] == null) {
				unset($workUniversity[$key]);
			}
		}
		foreach ($experience as $key => $item) {
			if ($item['name'] == null && $item['level'] == null && $item['forms'] == null) {
				unset($experience[$key]);
			}
		}

		foreach ($license as $key => $item) {
			if ($item['name'] == null && $item['product'] == null && $item['code'] == null && $item['time'] == null && $item['address'] == null && $item['author'] == null) {
				unset($license[$key]);
			}
		}
		foreach ($studentAwards as $key => $item) {
			if ($item['nameTopic'] == null && $item['nameStudent'] == null && $item['result'] == null && $item['time'] == null && $item['prize'] == null) {
				unset($studentAwards[$key]);
			}
		}
		if ($academic['name'] == null && $academic['time'] == null) {
			unset($academic[$key]);
		}
		$table 						= new ScientificProfile();
		$table->users_id 			= $id_user;
		$table->name 				= $req->name;
		$table->gender 				= $req->gender;
		$table->birthplace 			= $req->birthplace;
		$table->birthday 			= date('Y-1-1', strtotime($req->birthday));
		$table->academic 			= json_encode($academic);
		$table->degree 				= json_encode($req->degree);
		$table->position 			= $req->position;
		$table->contact 			= json_encode($req->contact);
		$table->work_place 			= json_encode($req->workPlace);
		$table->edu_process 		= json_encode($req->eduProcess);
		$table->language_level 		= json_encode($req->language);
		$table->working_process 	= json_encode($req->work);
		$table->areas_of_expertise  = json_encode($req->areasOfExpertise);
		$table->topic_science 		= json_encode($req->science);
		$table->guide_student 		= json_encode($req->guide);
		$table->document 			= json_encode($document);
		$table->article 			= json_encode($article);
		$table->student_awards 		= json_encode($studentAwards);
		$table->license 			= json_encode($license);
		$table->solution 			= json_encode($solution);
		$table->application 		= json_encode($application);
		$table->prize 				= json_encode($req->prize);
		$table->show 				= json_encode($show);
		$table->seminor_show 		= json_encode($seminorShow);
		$table->work_university 	= json_encode($workUniversity);
		$table->experience 			= json_encode($experience);
		$table->save();
		//store file documet
		$document 			= $req->document;
		$document_path 		= $req->file('document.file')->storeAs('scientific_profile/' . date('Y_m_d') . '_' . $table->id, date('Y_m_d') . '_' . $table->id . '_giao_trinh_tai_lieu_hoc_tap');
		$document['file'] 	= $document_path;
		//store file article
		$article 			= $req->article;
		$article_path 		= $req->file('article.file')->storeAs('scientific_profile/' . date('Y_m_d') . '_' . $table->id, date('Y_m_d') . '_' . $table->id . '_bai_bao_da_cong_bo');
		$article['file'] 	= $article_path;
		//store file prize
		$prize = $req->prize;
		if (isset($prize['file'])) {
			$prize_path 	= $req->file('prize.file')->storeAs('scientific_profile/' . date('Y_m_d') . '_' . $table->id, date('Y_m_d') . '_' . $table->id . '_giai_thuong_ve_hoat_dong_khoa_hoc');
			$prize['file']  = $prize_path;
		}
		foreach ($prize as $key => $item) {
			if ($key = 'file') continue;
			if ($item['content'] == null && $item['address'] == null && $item['time'] == null) {
				unset($prize[$key]);
			}
		}
		$table->document = json_encode($document);
		$table->article  = json_encode($article);
		$table->prize 	 = json_encode($prize);
		$table->save();

		$user = User::find($id_user);
		$user->scientific_profile_id = $table->id;
		$user->save();
		return redirect()->route('detaichunhiemdetai');
	}
	public function getIndexScientificProfile()
	{
		$data 			  = ScientificProfile::where('users_id', Auth::user()->id)->first();
		$academic 		  = json_decode($data->academic);
		$degree 		  = json_decode($data->degree);
		$contact 		  = json_decode($data->contact);
		$workPlace 	   	  = json_decode($data->work_place);
		$eduProcess 	  = json_decode($data->edu_process);
		$workProcess 	  = json_decode($data->working_process);
		$document 		  = json_decode($data->document, true);
		$article 		  = json_decode($data->article, true);
		$topicScience 	  = json_decode($data->topic_science);
		$guideStudent  	  = json_decode($data->guide_student);
		$countDiploma 	  = json_decode($data->count_diploma);
		$prize   		  = json_decode($data->prize, true);
		$language 		  = json_decode($data->language_level);
		$areasOfExpertise = json_decode($data->areas_of_expertise);
		$studentAwards 	  = json_decode($data->student_awards);
		$license 		  = json_decode($data->license);
		$solution 		  = json_decode($data->solution);
		$application 	  = json_decode($data->application);
		$show 			  = json_decode($data->show);
		$seminorShow 	  = json_decode($data->seminor_show);
		$workUniversity   = json_decode($data->work_university);
		$experience 	  = json_decode($data->experience);
		return view(
			'page.scientific_profile_review',
			compact(
				'data',
				'academic',
				'degree',
				'contact',
				'workPlace',
				'eduProcess',
				'workProcess',
				'document',
				'article',
				'topicScience',
				'guideStudent',
				'countDiploma',
				'prize',
				'language',
				'areasOfExpertise',
				'studentAwards',
				'license',
				'solution',
				'application',
				'show',
				'seminorShow',
				'workUniversity',
				'experience'
			)
		);
	}
	public function downloadScientificProfile()
	{
		$data 				= ScientificProfile::where('users_id', Auth::user()->id)->first();
		$academic 			= json_decode($data->academic);
		$degree 			= json_decode($data->degree);
		$contact 			= json_decode($data->contact);
		$workPlace 			= json_decode($data->work_place);
		$eduProcess 		= json_decode($data->edu_process);
		$workProcess 		= json_decode($data->working_process);
		$document 			= json_decode($data->document, true);
		$article 			= json_decode($data->article, true);
		$topicScience 		= json_decode($data->topic_science);
		$guideStudent 		= json_decode($data->guide_student);
		$countDiploma 		= json_decode($data->count_diploma);
		$prize 				= json_decode($data->prize, true);
		$language 			= json_decode($data->language_level);
		$areasOfExpertise 	= json_decode($data->areas_of_expertise);
		$studentAwards  	= json_decode($data->student_awards);
		$license 			= json_decode($data->license);
		$solution 			= json_decode($data->solution);
		$application 		= json_decode($data->application);
		$show 				= json_decode($data->show);
		$seminorShow 		= json_decode($data->seminor_show);
		$workUniversity 	= json_decode($data->work_university);
		$experience 		= json_decode($data->experience);

		$pdf 				= PDF::loadView('pdf.scientific_profile_pdf', compact('data', 'academic', 'degree', 'contact', 'workPlace', 'eduProcess', 'workProcess', 'document', 'article', 'topicScience', 'guideStudent', 'countDiploma', 'prize', 'language', 'areasOfExpertise', 'studentAwards', 'license', 'solution', 'application', 'show', 'seminorShow', 'workUniversity', 'experience'));
		$pdf->setOptions([
			'defaultFont' => 'serif',
		]);
		return $pdf->stream();
	}
	public function editScientificProfile()
	{
		$data 				= ScientificProfile::where('users_id', Auth::user()->id)->first();
		$academic 			= json_decode($data->academic);
		$degree 			= json_decode($data->degree);
		$contact 			= json_decode($data->contact);
		$workPlace 			= json_decode($data->work_place);
		$eduProcess 		= json_decode($data->edu_process);
		$workProcess 		= json_decode($data->working_process, true);
		$document 			= json_decode($data->document, true);
		$article 			= json_decode($data->article, true);
		$topicScience 		= json_decode($data->topic_science, true);
		$guideStudent 		= json_decode($data->guide_student, true);
		$countDiploma 		= json_decode($data->count_diploma);
		$prize 				= json_decode($data->prize, true);
		$language 			= json_decode($data->language_level, true);
		$areasOfExpertise 	= json_decode($data->areas_of_expertise);
		$studentAwards 		= json_decode($data->student_awards, true);
		$license 			= json_decode($data->license, true);
		$solution 			= json_decode($data->solution, true);
		$application 		= json_decode($data->application, true);
		$show 				= json_decode($data->show, true);
		$seminorShow 		= json_decode($data->seminor_show, true);
		$workUniversity 	= json_decode($data->work_university, true);
		$experience 		= json_decode($data->experience, true);
		return view('page.edit_scientific_profile', compact('data', 'academic', 'degree', 'contact', 'workPlace', 'eduProcess', 'workProcess', 'document', 'article', 'topicScience', 'guideStudent', 'countDiploma', 'prize', 'language', 'areasOfExpertise', 'studentAwards', 'license', 'solution', 'application', 'show', 'seminorShow', 'workUniversity', 'experience'));
	}
	public function updateScientificProfile(ScientificProfileRequest $req)
	{
		$id_user 		= Auth::user()->id;
		$language 		= $req->language;
		$solution 		= $req->solution;
		$application 	= $req->application;
		$show 			= $req->show;
		$seminorShow 	= $req->seminorShow;
		$workUniversity = $req->workUniversity;
		$experience 	= $req->experience;
		$license 		= $req->license;
		$studentAwards 	= $req->studentAwards;
		$academic 		= $req->academic;
		if (isset($language)) {
			foreach ($language as $key => $item) {
				if ($item['name'] == null || $item['level'] == null) {
					unset($language[$key]);
				}
			}
		}
		if (isset($solution)) {
			foreach ($solution as $key => $item) {
				if ($item['name'] == null && $item['product'] == null && $item['code'] == null && $item['address'] == null && $item['author'] == null) {
					unset($solution[$key]);
				}
			}
		}
		if (isset($application)) {
			foreach ($application as $key => $item) {
				if ($item['name'] == null && $item['forms'] == null && $item['product'] == null) {
					unset($application[$key]);
				}
			}
		}
		if (isset($show)) {
			foreach ($show as $key => $item) {
				if ($item['name'] == null) {
					unset($show[$key]);
				}
			}
		}
		if (isset($seminorShow)) {
			foreach ($seminorShow as $key => $item) {
				if ($item['name'] == null && $item['title'] == null) {
					unset($seminorShow[$key]);
				}
			}
		}
		if (isset($workUniversity)) {
			foreach ($workUniversity as $key => $item) {
				if ($item['name'] == null && $item['content'] == null) {
					unset($workUniversity[$key]);
				}
			}
		}
		if (isset($experience)) {
			foreach ($experience as $key => $item) {
				if ($item['name'] == null && $item['level'] == null && $item['forms'] == null) {
					unset($experience[$key]);
				}
			}
		}
		if (isset($license)) {
			foreach ($license as $key => $item) {
				if ($item['name'] == null && $item['product'] == null && $item['code'] == null && $item['address'] == null && $item['author'] == null) {
					unset($license[$key]);
				}
			}
		}
		if (isset($studentAwards)) {
			foreach ($studentAwards as $key => $item) {
				if ($item['nameTopic'] == null && $item['nameStudent'] == null && $item['result'] == null && $item['prize'] == null) {
					unset($studentAwards[$key]);
				}
			}
		}
		if ($academic['name'] == null) {
			unset($academic[$key]);
		}
		$table 						= ScientificProfile::where('users_id', $id_user)->get()->first();
		$table->name 				= $req->name;
		$table->gender 				= $req->gender;
		$table->birthplace 			= $req->birthplace;
		$table->birthday 			= date('Y-1-1', strtotime($req->birthday));
		$table->academic 			= json_encode($academic);
		$table->degree 				= json_encode($req->degree);
		$table->position 			= $req->position;
		$table->contact 			= json_encode($req->contact);
		$table->work_place 			= json_encode($req->workPlace);
		$table->edu_process 		= json_encode($req->eduProcess);
		$table->language_level 		= json_encode($language);
		$table->working_process 	= json_encode($req->work);
		$table->areas_of_expertise  = json_encode($req->areasOfExpertise);
		$table->topic_science 		= json_encode($req->science);
		$table->guide_student 		= json_encode($req->guide);
		$table->student_awards 		= json_encode($studentAwards);
		$table->license 			= json_encode($license);
		$table->solution 			= json_encode($solution);
		$table->application 		= json_encode($application);
		$table->show 				= json_encode($show);
		$table->seminor_show 		= json_encode($seminorShow);
		$table->work_university 	= json_encode($workUniversity);
		$table->experience 			= json_encode($experience);
		//store file documet
		$document 			= $req->document;
		$document_path 		= json_decode($table->document)->file;
		$document['file']   = $document_path;
		//store file article
		$article 		 = $req->article;
		$article_path 	 = json_decode($table->article)->file;
		$article['file'] = $article_path;
		//store file prize
		$prize = $req->prize;
		if (isset(json_decode($table->prize)->file)) {
			$prize_path = json_decode($table->prize)->file;
		}
		if (isset($prize)) {
			foreach ($prize as $key => $item) {
				if ($item['content'] == null && $item['address'] == null) {
					unset($prize[$key]);
				}
			}
		}
		$prize['file'] 	 = $prize_path;
		$table->document = json_encode($document);
		$table->article  = json_encode($article);
		$table->prize 	 = json_encode($prize);
		$table->save();
		return redirect()->route('detaichunhiemdetai');
	}
	public function getScientificExplanation(Request $req)
	{
		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		if (!isset($topicM)) {
			return redirect()->back();
		}
		if (isset($topicM->scientific_explanation_id)) {
			return redirect()->route('getthuyetminhdetainghiencuukhoahoc', $topicM->id);
		}
		$profile 		= ScientificProfile::where('users_id', Auth::user()->id)->get()->first();
		$basicSalary 	= ConfigMD::where('key', 'basic_salary')->get()->first();
		$researchType 	= json_decode($topicM->getRegisterTopic->research_type, true);
		$degree 		= json_decode($profile->degree, true);
		return view('page.scientific_explanation', compact('topicM', 'researchType', 'basicSalary', 'degree'));
	}
	public function postScientificExplanation(ScientificExplanationRequest $req)
	{
		try {
			$member 	  = $req->member;
			$coordination = $req->coordination;
			$progress 	  = $req->progress;
			$labor 		  = $req->labor;
			$resources 	  = $req->resources;
			$repair 	  = $req->repair;
			$member 	  = $req->member;
			$coordination = $req->coordination;
			$progress 	  = $req->progress;
			$labor 		  = $req->labor;
			$resources 	  = $req->resources;
			$repair 	  = $req->repair;
			$costDiff 	  = $req->costDiff;
			if (isset($member)) {
				foreach ($member as $key => $item) {
					if ($item['name'] == null) {
						unset($member[$key]);
					}
				}
			}
			if (isset($coordination)) {
				foreach ($coordination as $key => $item) {
					if ($item['nameUnit'] == null) {
						unset($coordination[$key]);
					}
				}
			}
			if (isset($progress)) {
				foreach ($progress as $key => $item) {
					if ($item['content'] == null) {
						unset($progress[$key]);
					}
				}
			}
			if (isset($labor)) {
				foreach ($labor as $key => $item) {
					if ($key == 'total') {
						$labor[$key] = str_replace([',', '.'], '', $item);
						continue;
					}
					$labor[$key]['worker'] = str_replace([',', '.'], '', $item['worker']);
					$labor[$key]['total']  = str_replace([',', '.'], '', $item['total']);
					$labor[$key]['salary'] = str_replace([',', '.'], '', $item['salary']);
					if ($item['content'] == null) {
						unset($labor[$key]);
					}
				}
			}
			if (isset($resources)) {
				foreach ($resources as $key => $item) {
					if ($key == 'total') {
						$resources[$key] = str_replace([',', '.'], '', $item);
						continue;
					}
					$resources[$key]['quantily'] = str_replace([',', '.'], '', $item['quantily']);
					$resources[$key]['price']    = str_replace([',', '.'], '', $item['price']);
					$resources[$key]['total']    = str_replace([',', '.'], '', $item['total']);
					if ($item['content'] == null) {
						unset($resources[$key]);
					}
				}
			}
			if (isset($repair)) {
				foreach ($repair as $key => $item) {
					if ($key == 'total') {
						$repair[$key] = str_replace([',', '.'], '', $item);
						continue;
					}
					$repair[$key]['quantily'] = str_replace([',', '.'], '', $item['quantily']);
					$repair[$key]['price']    = str_replace([',', '.'], '', $item['price']);
					$repair[$key]['total']    = str_replace([',', '.'], '', $item['total']);
					if ($item['content'] == null) {
						unset($repair[$key]);
					}
				}
			}
			if (isset($costDiff)) {
				foreach ($costDiff as $key => $item) {
					if ($key == 'total') {
						$costDiff[$key] = str_replace([',', '.'], '', $item);
						continue;
					}
					$costDiff[$key]['quantily'] = str_replace([',', '.'], '', $item['quantily']);
					$costDiff[$key]['price']    = str_replace([',', '.'], '', $item['price']);
					$costDiff[$key]['total']    = str_replace([',', '.'], '', $item['total']);
					if ($item['content'] == null) {
						unset($costDiff[$key]);
					}
				}
			}
			$table 					= new ScientificExplanation();
			$table->users_id 		= Auth::user()->id;
			$table->research_level 	= json_encode($req->level);
			$table->research_time 	= json_encode($req->time);
			$table->organization 	= json_encode($req->organization);
			$table->topic_manager 	= json_encode($req->topicManager);
			$table->member 			= json_encode($member);
			$table->coordination 	= json_encode($coordination);
			$table->necessity 		= $req->necessity;
			$table->target 			= json_encode($req->target);
			$table->research 		= json_encode($req->research);
			$table->progress 		= json_encode($progress);
			$table->product_science = json_encode($req->productScience);
			$table->product_educate = json_encode($req->productEducate);
			$table->product_app 	= json_encode($req->productApp);
			$table->product_diff 	= $req->productDiff;
			$table->effective 		= $req->effective;
			$table->method 			= $req->method;
			$table->labor 			= json_encode($labor);
			$table->resources 		= json_encode($resources);
			$table->repair 			= json_encode($repair);
			$table->costDiff 		= json_encode($costDiff);
			$table->save();
			//topic
			$topicM 							= TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
			$topicM->status 					= 3;
			$topicM->scientific_explanation_id  = $table->id;
			$topicM->save();
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		} catch (\Throwable $th) {
			return abort(404, 'Trang không tồn tại');
		}
	}
	public function getIndexScientificExplanation(Request $req)
	{
		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		if (!isset($topicM)) {
			return redirect()->back();
		}
		$researchType 			= json_decode($topicM->getRegisterTopic->research_type, true);
		$scientificExplanation  = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', Auth::user()->id)->get()->first();
		if (!isset($scientificExplanation)) {
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		}
		$researchLevel 	= json_decode($scientificExplanation->research_level, true);
		$researchTime 	= json_decode($scientificExplanation->research_time);
		$organization 	= json_decode($scientificExplanation->organization);
		$topicManager 	= json_decode($scientificExplanation->topic_manager);
		$member 		= json_decode($scientificExplanation->member);
		$coordination 	= json_decode($scientificExplanation->coordination);
		$target 		= json_decode($scientificExplanation->target);
		$research 		= json_decode($scientificExplanation->research);
		$progress 		= json_decode($scientificExplanation->progress);
		$productScience = json_decode($scientificExplanation->product_science, true);
		$productEducate = json_decode($scientificExplanation->product_educate, true);
		$productApp 	= json_decode($scientificExplanation->product_app, true);
		$productDiff 	= $scientificExplanation->product_diff;
		$labor 			= json_decode($scientificExplanation->labor);
		$resources 		= json_decode($scientificExplanation->resources);
		$repair 		= json_decode($scientificExplanation->repair);
		$costDiff 		= json_decode($scientificExplanation->costDiff);
		return view('page.scientific_explanation_review', compact('topicM', 'researchType', 'scientificExplanation', 'researchLevel', 'researchTime', 'organization', 'topicManager', 'member', 'coordination', 'target', 'research', 'progress', 'productScience', 'productEducate', 'productApp', 'labor', 'resources', 'repair', 'costDiff'));
	}
	public function downloadScientificExplanation(Request $req)
	{
		$topicM = TopicM::find($req->id);
		if (!isset($topicM)) {
			return redirect()->back();
		}
		$researchType = json_decode($topicM->getRegisterTopic->research_type, true);
		$scientificExplanation = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->get()->first();
		if (!isset($scientificExplanation)) {
			return redirect()->back();
		}
		$researchLevel 	= json_decode($scientificExplanation->research_level, true);
		$researchTime 	= json_decode($scientificExplanation->research_time);
		$organization 	= json_decode($scientificExplanation->organization);
		$topicManager 	= json_decode($scientificExplanation->topic_manager);
		$member 		= json_decode($scientificExplanation->member);
		$coordination 	= json_decode($scientificExplanation->coordination);
		$target 		= json_decode($scientificExplanation->target);
		$research 		= json_decode($scientificExplanation->research);
		$progress 		= json_decode($scientificExplanation->progress);
		$productScience = json_decode($scientificExplanation->product_science, true);
		$productEducate = json_decode($scientificExplanation->product_educate, true);
		$productApp 	= json_decode($scientificExplanation->product_app, true);
		$productDiff 	= $scientificExplanation->product_diff;
		$labor 			= json_decode($scientificExplanation->labor);
		$resources 		= json_decode($scientificExplanation->resources);
		$repair 		= json_decode($scientificExplanation->repair);
		$costDiff 		= json_decode($scientificExplanation->costDiff);

		$pdf = PDF::loadView('pdf.scientific_explanation_pdf', compact('topicM', 'researchType', 'scientificExplanation', 'researchLevel', 'researchTime', 'organization', 'topicManager', 'member', 'coordination', 'target', 'research', 'progress', 'productScience', 'productEducate', 'productApp', 'labor', 'resources', 'repair', 'costDiff'));
		return $pdf->stream();
	}
	public function editScientificExplanation(Request $req)
	{
		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		if (!isset($topicM)) {
			return redirect()->back();
		}
		if ($topicM->status != 2 && $topicM->status != 3) {
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		}
		$researchType = json_decode($topicM->getRegisterTopic->research_type, true);
		$scientificExplanation = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', Auth::user()->id)->first();
		if (!isset($scientificExplanation)) {
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		}
		$researchLevel 	= json_decode($scientificExplanation->research_level, true);
		$researchTime  	= json_decode($scientificExplanation->research_time);
		$organization  	= json_decode($scientificExplanation->organization);
		$topicManager 	= json_decode($scientificExplanation->topic_manager);
		$member 		= json_decode($scientificExplanation->member, true);
		$coordination 	= json_decode($scientificExplanation->coordination, true);
		$target 		= json_decode($scientificExplanation->target);
		$research 		= json_decode($scientificExplanation->research);
		$progress 		= json_decode($scientificExplanation->progress, true);
		$productScience = json_decode($scientificExplanation->product_science, true);
		$productEducate = json_decode($scientificExplanation->product_educate, true);
		$productApp 	= json_decode($scientificExplanation->product_app, true);
		$productDiff 	= $scientificExplanation->product_diff;
		$labor 			= json_decode($scientificExplanation->labor, true);
		$resources 		= json_decode($scientificExplanation->resources, true);
		$repair 		= json_decode($scientificExplanation->repair, true);
		$costDiff 		= json_decode($scientificExplanation->costDiff, true);
		$basicSalary 	= ConfigMD::where('key', 'basic_salary')->first();
		$profile 		= ScientificProfile::where('users_id', Auth::user()->id)->first();
		$degree 		= json_decode($profile->degree);

		return view(
			'page.edit_scientific_explanation',
			compact(
				'topicM',
				'researchType',
				'scientificExplanation',
				'researchLevel',
				'researchTime',
				'organization',
				'topicManager',
				'member',
				'coordination',
				'target',
				'research',
				'progress',
				'productScience',
				'productEducate',
				'productApp',
				'labor',
				'resources',
				'repair',
				'costDiff',
				'basicSalary',
				'degree'
			)
		);
	}
	public function updateScientificExplanation(ScientificExplanationRequest $req)
	{
		$member 		= $req->member;
		$coordination   = $req->coordination;
		$progress 		= $req->progress;
		$labor 			= $req->labor;
		$resources 		= $req->resources;
		$repair 		= $req->repair;
		$costDiff 		= $req->costDiff;
		if (isset($member)) {
			foreach ($member as $key => $item) {
				if ($item['name'] == null) {
					unset($member[$key]);
				}
			}
		}
		if (isset($coordination)) {
			foreach ($coordination as $key => $item) {
				if ($item['nameUnit'] == null) {
					unset($coordination[$key]);
				}
			}
		}
		if (isset($progress)) {
			foreach ($progress as $key => $item) {
				if ($item['content'] == null) {
					unset($progress[$key]);
				}
			}
		}
		if (isset($labor)) {
			foreach ($labor as $key => $item) {
				if ($key == 'total') {
					$labor[$key] = str_replace([',', '.'], '', $item);
					continue;
				}
				$labor[$key]['worker']  = str_replace([',', '.'], '', $item['worker']);
				$labor[$key]['total'] 	= str_replace([',', '.'], '', $item['total']);
				$labor[$key]['salary'] 	= str_replace([',', '.'], '', $item['salary']);
				if ($item['content'] == null) {
					unset($labor[$key]);
				}
			}
		}
		if (isset($resources)) {
			foreach ($resources as $key => $item) {
				if ($key == 'total') {
					$resources[$key] = str_replace([',', '.'], '', $item);
					continue;
				}
				$resources[$key]['quantily'] = str_replace([',', '.'], '', $item['quantily']);
				$resources[$key]['price'] 	 = str_replace([',', '.'], '', $item['price']);
				$resources[$key]['total'] 	 = str_replace([',', '.'], '', $item['total']);
				if ($item['content'] == null) {
					unset($resources[$key]);
				}
			}
		}
		if (isset($repair)) {
			foreach ($repair as $key => $item) {
				if ($key == 'total') {
					$repair[$key] = str_replace([',', '.'], '', $item);
					continue;
				}
				$repair[$key]['quantily']   = str_replace([',', '.'], '', $item['quantily']);
				$repair[$key]['price'] 		= str_replace([',', '.'], '', $item['price']);
				$repair[$key]['total'] 		= str_replace([',', '.'], '', $item['total']);
				if ($item['content'] == null) {
					unset($repair[$key]);
				}
			}
		}
		if (isset($costDiff)) {
			foreach ($costDiff as $key => $item) {
				if ($key == 'total') {
					$costDiff[$key] = str_replace([',', '.'], '', $item);
					continue;
				}
				$costDiff[$key]['quantily'] = str_replace([',', '.'], '', $item['quantily']);
				$costDiff[$key]['price'] 	= str_replace([',', '.'], '', $item['price']);
				$costDiff[$key]['total'] 	= str_replace([',', '.'], '', $item['total']);
				if ($item['content'] == null) {
					unset($costDiff[$key]);
				}
			}
		}
		$topicM 				= TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		$table 					= ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', Auth::user()->id)->get()->first();
		$table->users_id 		= Auth::user()->id;
		$table->research_level 	= json_encode($req->level);
		$table->research_time 	= json_encode($req->time);
		$table->organization 	= json_encode($req->organization);
		$table->topic_manager 	= json_encode($req->topicManager);
		$table->member 			= json_encode($member);
		$table->coordination 	= json_encode($coordination);
		$table->necessity 		= $req->necessity;
		$table->target 			= json_encode($req->target);
		$table->research 		= json_encode($req->research);
		$table->progress 		= json_encode($progress);
		$table->product_science = json_encode($req->productScience);
		$table->product_educate = json_encode($req->productEducate);
		$table->product_app 	= json_encode($req->productApp);
		$table->product_diff 	= $req->productDiff;
		$table->effective 		= $req->effective;
		$table->method 			= $req->method;
		$table->labor 			= json_encode($labor);
		$table->resources 		= json_encode($resources);
		$table->repair 			= json_encode($repair);
		$table->costDiff 		= json_encode($costDiff);
		$table->save();
		return redirect()->route('theodoidetai', $topicM->slug_name_topic)->with('flash_message', 'Cập nhật thành công');
	}
	public function getScientificDeployReport(Request $req)
	{
		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		if (!isset($topicM)) {
			return redirect()->back();
		}
		if ($topicM->status != 5) {
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		}
		if (isset($topicM->scientific_deploy_report_id)) {
			$scientificDeployReport = ScientificDeployReport::where('id', $topicM->scientific_deploy_report_id)->get()->first();
			$content = json_decode($scientificDeployReport->content, true);
			$product = json_decode($scientificDeployReport->product, true);
			$expense = json_decode($scientificDeployReport->expense);
		} else {
			$content = null;
			$product = null;
			$expense = null;
		};
		$scientificExplanation  = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', Auth::user()->id)->get()->first();
		$topicManager 			= json_decode($scientificExplanation->topic_manager);
		$organization 			= json_decode($scientificExplanation->organization);
		$time 					= json_decode($scientificExplanation->research_time);
		$progress 				= json_decode($scientificExplanation->progress, true);
		$labor 					= json_decode($scientificExplanation->labor);
		$resources 				= json_decode($scientificExplanation->resources);
		$repair 				= json_decode($scientificExplanation->repair);
		$costDiff 				= json_decode($scientificExplanation->costDiff);
		$total 					= $topicM->getRegisterTopic->expense;

		return view('page.scientific_deploy_report', compact('topicM', 'topicManager', 'organization', 'time', 'total', 'progress', 'content', 'product', 'expense'));
	}
	public function postScientificDeployReport(ScientificDeployReportRequest $req)
	{
		$content = $req->content;
		$product = $req->product;
		$expense = $req->expense;
		$finish  = $req->finish;
		$plan 	 = $req->plan;
		$opinion = $req->opinion;
		if (!isset($opinion)) {
			$opinion = '';
		}
		if (isset($content)) {
			foreach ($content as $key => $item) {
				if ($item['contentExplanation'] == null && $item['contentCombination'] == null && $item['finish'] == null) {
					unset($content[$key]);
				}
			}
		}
		if (isset($product)) {
			foreach ($product as $key => $item) {
				if ($item['productExplanation'] == null && $item['make'] == null && $item['finish'] == null) {
					unset($product[$key]);
				}
			}
		}
		if (isset($expense)) {
			foreach ($expense as $key => $value) {
				if (isset($expense[$key])) {
					$expense[$key] = str_replace([',', '.'], '', $value);
				}
			}
		}
		if (isset($plan)) {
			if (isset($plan['expense'])) {
				$plan['expense'] = str_replace([',', '.'], '', $plan['expense']);
			}
		}
		$table 			 = new ScientificDeployReport();
		$table->users_id = Auth::user()->id;
		$table->content  = json_encode($content);
		$table->product  = json_encode($product);
		$table->expense  = json_encode($expense);
		$table->finish   = $finish;
		$table->plan     = json_encode($plan);
		$table->opinion  = $opinion;
		$table->save();
		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		if (isset($topicM->scientific_deploy_report_id)) {
			$scientific_deploy_report_id_old = $topicM->scientific_deploy_report_id;
		}
		$topicM->scientific_deploy_report_id = $table->id;
		$topicM->save();
		if (isset($scientific_deploy_report_id_old)) {
			ScientificDeployReport::find($scientific_deploy_report_id_old)->delete();
		}
		return redirect()->route('theodoidetai', $topicM->slug_name_topic);
	}

	public function downloadScientificDeployReport(Request $req)
	{
		$topic = TopicM::where('id', $req->id)->first();
		if (!isset($topic->scientific_explanation_id)) {
			abort(404, 'Trang không tồn tại');
		}
		if (isset($topic)) {
			$scientificExplanation  = ScientificExplanation::where('id', $topic->scientific_explanation_id)->first();
			$topicManager 			= json_decode($scientificExplanation->topic_manager);
			$organization 			= json_decode($scientificExplanation->organization);
			$time 					= json_decode($scientificExplanation->research_time);
			//expense
			$total 		= $topic->getRegisterTopic->expense;;
			$labor 		= json_decode($scientificExplanation->labor);
			$resources  = json_decode($scientificExplanation->resources);
			$repair 	= json_decode($scientificExplanation->repair);
			$costDiff 	= json_decode($scientificExplanation->costDiff);
			$report 	= ScientificDeployReport::where('id', $topic->scientific_deploy_report_id)->first();
			$content 	= json_decode($report->content);
			$product 	= json_decode($report->product);
			$expense 	= json_decode($report->expense);
			$plan 		= json_decode($report->plan);

			$pdf = PDF::loadView('pdf.scientific_deploy_report_pdf', compact('topic', 'topicManager', 'organization', 'time', 'total', 'report', 'content', 'product', 'expense', 'plan'));
			return $pdf->stream();
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}

	public function getScientificExtension(Request $req)
	{
		$maxExtension 		= 2;
		$scientificProfile  = ScientificProfile::where('users_id', Auth::user()->id)->get()->first();
		if (isset($scientificProfile)) {
			$workPlace 		= json_decode($scientificProfile->work_place, true);
		} else {
			$workPlace = null;
		}

		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		$registerTopic = RegisterTopic::find($topicM->register_id);
		if (!isset($topicM)) {
			return redirect()->back();
		}
		if ($topicM->status != 5 || $topicM->count_extension == $maxExtension) {
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		}
		$scientificExplanation = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', Auth::user()->id)->get()->first();
		$time = json_decode($scientificExplanation->research_time);
		//expense

		$total = $registerTopic->expense;

		return view('page.scientific_extension', compact('scientificProfile', 'workPlace', 'topicM', 'total', 'time'));
	}
	public function postScientificExtension(ScientificExtensionRequest $req)
	{
		//max extension
		$maxExtension = 2;

		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		if ($topicM->count_extension == $maxExtension) {
			return redirect()->route('theodoidetai', $topicM->slug_name_topic);
		}
		$table 			 = new ScientificExtension();
		$table->users_id = Auth::user()->id;
		$table->position = $req->position;
		$table->time_new = json_encode($req->timeNew);
		$table->content  = $req->content;
		$table->reason 	 = $req->reason;
		if (isset($req->expenseDiff)) {
			$expenseDiff = str_replace([',', '.'], '', $req->expenseDiff);
			$table->expense_diff = $expenseDiff;
		}
		//check extension and count extension
		if (isset($topicM->scientific_extension_id)) {
			$topicM->count_extension = $topicM->count_extension + 1;
			$extensionOld 			 = $topicM->scientific_extension_id;
		} else {
			$topicM->count_extension = 1;
		}
		$table->save();
		$topicM->scientific_extension_id = $table->id;
		$topicM->save();
		if (isset($extensionOld)) {
			ScientificExtension::find($extensionOld)->delete();
		}
		return redirect()->route('theodoidetai', $topicM->slug_name_topic);
	}
	public function downloadScientificExtension($id)
	{
		$topic = TopicM::where('id', $id)->first();
		if (!isset($topic->scientific_extension_id)) {
			abort(404, 'Trang không tồn tại');
		}
		if (isset($topic)) {
			$extension 	  = ScientificExtension::where('id', $topic->scientific_extension_id)->first();
			$explanation  = ScientificExplanation::where('id', $topic->scientific_explanation_id)->first();
			$organization = json_decode($explanation->organization);
			$time 		  = json_decode($explanation->research_time);
			$time_new 	  = json_decode($extension->time_new);
			$pdf 		  = PDF::loadView('pdf.scientific_extension_pdf', compact('topic', 'extension', 'time', 'time_new', 'organization'));
			return $pdf->stream();
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getScientificCancel(Request $req)
	{
		$scientificProfile  = ScientificProfile::where('users_id', Auth::user()->id)->get()->first();
		$workPlace 			= json_decode($scientificProfile->work_place);
		$topicM 			= TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		$registerTopic 		= RegisterTopic::find($topicM->register_id);
		if (!isset($topicM)) {
			return redirect()->back();
		}
		if ($topicM->close == 1) {
			return redirect()->route('nghiencuukhoahoccapbo');
		}
		if (isset($topicM->scientific_explanation_id)) {
			$scientificExplanation = ScientificExplanation::where('id', $topicM->scientific_explanation_id)->where('users_id', Auth::user()->id)->get()->first();
			$time = json_decode($scientificExplanation->research_time);
		} else {
			$time = null;
		}
		//expense
		$total = $registerTopic->expense;
		return view('page.scientific_cancel', compact('scientificProfile', 'workPlace', 'topicM', 'total', 'time'));
	}
	public function postScientificCancel(ScientificCancelRequest $req)
	{
		$expense = str_replace([',', '.'], '', $req->expense);
		//save data table ScientificCancel
		$table 			 = new ScientificCancel();
		$table->users_id = Auth::user()->id;
		$table->position = $req->position;
		$table->expense  = $expense;
		$table->reason   = $req->reason;
		$table->save();

		$topicM = TopicM::where('id', $req->id)->where('users_id', Auth::user()->id)->get()->first();
		$topicM->scientific_cancel_id = $table->id;
		$topicM->close = 1;
		$topicM->save();
		return redirect()->back();
	}


	public function getTeachingDocument()
	{

		$id_user = Auth::user()->id;
		$documents = Documents::where('users_id', $id_user)->get();
		$i = 1;
		return view('page.teaching_document', compact('documents', 'i'));
	}
	public function getRegisterTeachingDocument()
	{


		if (status_date_time_register_system('date_start_register_doc', 'date_end_register_doc')) {
			$id_user = Auth::user()->id;
			$user = User::where('scientific_profile_id', 0)
				->find($id_user);
			if ($user) {
				return redirect()->route('dangkydetaichunhiemdetai');
			} else {
				$profile  = ScientificProfile::where('users_id', $id_user)->first();
				$degree   = json_decode($profile->degree);
				$studies  = StudyDocument::all();
				$workunit = WorkUnit::all();
				return view('page.register-teaching-document', compact('profile', 'degree', 'studies', 'workunit'));
			}
		} else
			return view('page.error-system');
	}
	public function getEditRegisterDocument($slug)
	{
		if (status_date_time_register_system('date_start_register_doc', 'date_end_register_doc')) {
			$document = Documents::where('slug_doc', $slug)->first();
			$user = User::find(Auth::user()->id);
			if (isset($document) && $user->scientific_profile_id != 0 && $document->status == 1) {
				$studies = StudyDocument::all();
				$recognition = json_decode($document->registerdoc->recognition, true);
				$members = json_decode($document->members, true);
				$study = StudyDocument::find($document->registerdoc->study_document_id);
				$day = json_decode($document->registerDoc->time_process, true);
				return view('page.edit_register_teaching_document', compact('document', 'studies', 'recognition', 'members', 'study', 'day'));
			} else {
				abort(404, 'Trang không tồn tại');
			}
		} else
			return view('page.error-system');
	}
	public function postEditRegisterTeachingDocument($slug, Request $req)
	{

		$document = Documents::where('slug_doc', $slug)->first();

		if ($document && $document->status == 1) {
			$register_doc =  Register_Documents::find($document->register_id);

			$user_name = $req->user_name;
			$falcuty = $req->falcuty;
			$degree = $req->degree;
			$national = $req->national;
			$recognition = $req->recognition;
			$members = ($req->member != null) ? $req->member : '';
			$work_unit_id = $req->work_unit_id;

			$subjects = $req->subjects;
			$name_document = $req->name_document;
			$type_doc = $req->type_doc;
			$credits = $req->credits;
			$lesson = $req->lesson;
			$page_number = $req->page_number;
			$objects_of_use = $req->objects_of_use;
			$time_process = $req->day;

			$preface = $req->preface;
			$table_of_contents = $req->table_of_contents;
			$table_of_symbols = $req->table_of_symbols;
			$table_abbreviation = $req->table_abbreviation;
			$chapters = $req->chapters;
			$answer = $req->answer;
			$references = $req->references;
			$appendix = $req->appendix;
			$glossary_of_terminology = $req->glossary_of_terminology;
			$key_works = $req->key_works;
			$level_of_difference = $req->level_of_difference;

			$register_doc->study_document_id = $subjects;
			$register_doc->national = $national;
			$register_doc->recognition = json_encode($recognition);
			$register_doc->time_process = json_encode($time_process);
			$register_doc->objects_of_use = $objects_of_use;
			$register_doc->page_numbers = $page_number;
			$register_doc->preface = $preface;
			$register_doc->table_of_contents = $table_of_contents;
			$register_doc->table_of_symbols = $table_of_symbols;
			$register_doc->table_abbreviation = $table_abbreviation;
			$register_doc->chapters = $chapters;
			$register_doc->answer = $answer;
			$register_doc->references = $references;
			$register_doc->appendix = $appendix;
			$register_doc->glossary_of_terminology = $glossary_of_terminology;
			$register_doc->key_works = $key_works;
			$register_doc->level_of_difference = $level_of_difference;
			$register_doc->save();

			$slug_doc = Str::slug($name_document, '-') . '-' . $register_doc->id;

			$document->name_doc = $name_document;
			$document->slug_doc = $slug_doc;
			$document->type_doc = $type_doc;
			$document->users_id = Auth::user()->id;
			$document->members = json_encode($members);
			$document->save();

			return redirect()->route('biensoantailieugiangday');
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getAjaxStudy($id)
	{
		if ($id == 0) {
			$arr = array();
			array_push($arr, ['credit' => '', 'lesson' => '']);

			echo json_encode($arr);
		} else {
			$term = StudyDocument::find($id);
			$cre = $term->number_of_credits;
			$lesson = $term->number_of_lessons;
			$arr = array();
			array_push($arr, ['credit' => $cre, 'lesson' => $lesson]);

			echo json_encode($arr);
		}
	}
	public function postRegisterTeachingDocument(RegisterDocumentRequest $req)
	{
		if (status_date_time_register_system('date_start_register_doc', 'date_end_register_doc')) {
			$user_name = $req->user_name;
			$falcuty = $req->falcuty;
			$degree = $req->degree;
			$national = $req->national;
			$recognition = $req->recognition;
			$members = ($req->member != null) ? $req->member : '';
			$work_unit_id = $req->work_unit_id;

			$subjects = $req->subjects;
			$name_document = $req->name_document;
			$type_doc = $req->type_doc;
			$credits = $req->credits;
			$lesson = $req->lesson;
			$page_number = $req->page_number;
			$objects_of_use = $req->objects_of_use;
			$time_process = $req->day;

			$preface = $req->preface;
			$table_of_contents = $req->table_of_contents;
			$table_of_symbols = $req->table_of_symbols;
			$table_abbreviation = $req->table_abbreviation;
			$chapters = $req->chapters;
			$answer = $req->answer;
			$references = $req->references;
			$appendix = $req->appendix;
			$glossary_of_terminology = $req->glossary_of_terminology;
			$key_works = $req->key_works;
			$level_of_difference = $req->level_of_difference;


			$register_doc = new Register_Documents;
			$register_doc->id_user_approval = 0;
			$register_doc->study_document_id = $subjects;
			$register_doc->national = $national;
			$register_doc->recognition = json_encode($recognition);
			$register_doc->time_process = json_encode($time_process);
			$register_doc->objects_of_use = $objects_of_use;
			$register_doc->page_numbers = $page_number;
			$register_doc->preface = $preface;
			$register_doc->table_of_contents = $table_of_contents;
			$register_doc->table_of_symbols = $table_of_symbols;
			$register_doc->table_abbreviation = $table_abbreviation;
			$register_doc->chapters = $chapters;
			$register_doc->answer = $answer;
			$register_doc->references = $references;
			$register_doc->appendix = $appendix;
			$register_doc->glossary_of_terminology = $glossary_of_terminology;
			$register_doc->key_works = $key_works;
			$register_doc->level_of_difference = $level_of_difference;
			$register_doc->save();

			$slug_doc = Str::slug($name_document, '-') . '-' . $register_doc->id;

			$document = new Documents;
			$document->name_doc = $name_document;
			$document->slug_doc = $slug_doc;
			$document->type_doc = $type_doc;
			$document->users_id = Auth::user()->id;
			$document->members = json_encode($members);
			$document->register_id = $register_doc->id;
			$document->status = 1;
			$document->save();

			return redirect()->route('biensoantailieugiangday');
		} else
			return view('page.error-system');
	}
	public function postTopicMAcceptance(Request $req)
	{
		$topic = TopicM::find($req->id);
		if (!isset($topic)) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy topic');
		}
		if ($topic->status != 6) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy trang');
		}
		if (isset($topic->acceptance)) {
			$fileOld = json_decode($topic->acceptance);
		}
		$name_file1 = trim($req->file1->getClientOriginalName(), '.pdf');
		$name_file2 = trim($req->file2->getClientOriginalName(), '.pdf');
		$slug1 = Str::slug($name_file1, '-');
		$slug2 = Str::slug($name_file2, '-');
		$path1 = $req->file1->storeAs('topic_m/' . date('Y_m_d') . '_' . $req->id, date('Y_m_d') . '_' . $req->id . '_file1_' . $slug1 . '.pdf');
		$path2 = $req->file2->storeAs('topic_m/' . date('Y_m_d') . '_' . $req->id, date('Y_m_d') . '_' . $req->id . '_file2_' . $slug2 . '.pdf');
		$path = [
			[
				'filename' => $req->file1->getClientOriginalName(),
				'path' => $path1,
			],
			[
				'filename' => $req->file2->getClientOriginalName(),
				'path' => $path2,
			],
		];
		$topic->acceptance = json_encode($path);
		$topic->save();
		if (isset($fileOld)) {
			$pathOld = [];
			foreach ($fileOld as $key => $item) {
				array_push($pathOld, $item->path);
			}
			Storage::delete($pathOld);
		}
		return redirect()->back()->with('flash_message', 'Đã nộp file thành công');
	}
	public function downloadTopicMAcceptance(Request $req)
	{
		$index = $req->index;
		$id = $req->id;
		$topic = TopicM::find($id);
		if (isset($topic->acceptance)) {
			$files = json_decode($topic->acceptance, true);
			switch ($index) {
				case 0:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
				case 1:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
			}
		}
	}
	public function downloadTopicLiquidation(Request $req)
	{
		$index = $req->index;
		$id = $req->id;
		$topic = TopicM::find($id);
		if (isset($topic->liquidation)) {
			$files = json_decode($topic->liquidation, true);
			switch ($index) {
				case 0:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
				case 1:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
			}
		}
	}
	public function downloadDocumentAcceptance(Request $req)
	{
		$index = $req->index;
		$id = $req->id;
		$doc = Documents::find($id);
		if (isset($doc->acceptance)) {
			$files = json_decode($doc->acceptance, true);
			switch ($index) {
				case 0:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
				case 1:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
			}
		}
	}
	public function downloadDocumentLiquidation(Request $req)
	{
		$index = $req->index;
		$id = $req->id;
		$doc = Documents::find($id);
		if (isset($doc->liquidation)) {
			$files = json_decode($doc->liquidation, true);
			switch ($index) {
				case 0:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
				case 1:
					return Storage::download($files[$index]['path'], $files[$index]['filename']);
					break;
			}
		}
	}
	public function getFormScientificExtension($id)
	{
		$topic = TopicM::where('id', $id)->first();
		if (!isset($topic->scientific_extension_id)) {
			abort(404, 'Trang không tồn tại');
		}
		if (isset($topic)) {
			$extension = ScientificExtension::where('id', $topic->scientific_extension_id)->first();
			$explanation = ScientificExplanation::where('id', $topic->scientific_explanation_id)->first();
			$organization = json_decode($explanation->organization);
			$time = json_decode($explanation->research_time);
			$time_new = json_decode($extension->time_new);
			return view('page.form-scientific-extension', compact('topic', 'extension', 'time', 'time_new', 'organization'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getFormScientificDeployReport($id)
	{
		$topic = TopicM::where('id', $id)->first();
		if (!isset($topic->scientific_explanation_id)) {
			abort(404, 'Trang không tồn tại');
		}
		if (isset($topic)) {
			$scientificExplanation = ScientificExplanation::where('id', $topic->scientific_explanation_id)->first();
			$topicManager = json_decode($scientificExplanation->topic_manager);
			$organization = json_decode($scientificExplanation->organization);
			$time = json_decode($scientificExplanation->research_time);
			//expense
			$total = $topic->getRegisterTopic->expense;
			$labor = json_decode($scientificExplanation->labor);
			$resources = json_decode($scientificExplanation->resources);
			$repair = json_decode($scientificExplanation->repair);
			$costDiff = json_decode($scientificExplanation->costDiff);
			$report = ScientificDeployReport::where('id', $topic->scientific_deploy_report_id)->first();
			$content = json_decode($report->content);
			$product = json_decode($report->product);
			$expense = json_decode($report->expense);
			$plan = json_decode($report->plan);
			return view('page.form-scientific-deploy-report', compact('topic', 'topicManager', 'organization', 'time', 'total', 'report', 'content', 'product', 'expense', 'plan'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}

	public function getDetailDocument($slug)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::where('users_id', $id_user)
			->where('slug_doc', $slug)
			->first();
		if ($doc != null) {
			$acceptance = json_decode($doc->acceptance, true);
			$liquidation = json_decode($doc->liquidation, true);
			return view('page.detail_doc', compact('doc', 'acceptance', 'liquidation'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function formRegisterTeachingDocument($id)
	{
		$document = Documents::find($id);
		if (isset($document)) {
			$id_user = $document->users_id;
			$profile = ScientificProfile::where('users_id', $id_user)->first();
			$degree = json_decode($profile->degree);
			$members = json_decode($document->members);
			$day = json_decode($document->registerdoc->time_process);
			$study = StudyDocument::find($document->registerdoc->study_document_id);
			return view('page.register_teaching_document_review', compact('document', 'degree', 'members', 'day', 'study'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}

	public function getExtensionTeachingDocument($id)
	{
		$document = Documents::find($id);
		// dd($document);
		if (!isset($document)) {
			return redirect('/');
		}
		if ($document->status != 3 || isset($document->document_extension_id)) {
			return redirect()->route('theodoitailieu', $document->slug_doc);
		}
		$register_doc = Register_Documents::where('id', $document->register_id)->get()->first();
		$time = json_decode($register_doc->time_process);
		return view('page.document_extension', compact('document', 'time'));
	}
	public function postExtensionTeachingDocument(DocumentExtensionRequest $req, $id)
	{
		$document = Documents::find($id);
		try {
			$table = new DocumentExtension();
			$table->users_id = Auth::user()->id;;
			$table->content = $req->content;
			$table->reason = $req->reason;
			$table->time = $req->time;
			$table->save();

			$document->document_extension_id = $table->id;
			$document->save();
			Session::flash('flash_message', 'Đăng ký gia hạn thành công');
		} catch (Throwable $th) {
			Session::flash('flag_error', 'Đăng ký gia hạn không thành công');
		}
		return redirect()->route('theodoitailieu', $document->slug_doc);
	}
	public function getFormExtensionTeachingDocument($id)
	{
		$document = Documents::find($id);
		if (isset($document)) {
			$time_process = json_decode($document->registerdoc->time_process);
			$extension_doc = DocumentExtension::find($document->document_extension_id);
			return view('page.form_gia_han_bien_soan', compact('document', 'extension_doc', 'time_process'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getCancelTeachingDocument($id)
	{
		$document = Documents::find($id);
		if (!isset($document)) {
			return redirect('/');
		}
		if ($document->close == 1 || $document->close == 2 || isset($document->document_cancel_id)) {
			return redirect()->route('biensoantailieugiangday');
		}
		$register_doc = Register_Documents::where('id', $document->register_id)->get()->first();
		$time = json_decode($register_doc->time_process);
		return view('page.document_cancel', compact('document', 'time'));
	}
	public function postCancelTeachingDocument(Request $req, $id)
	{
		$req->validate(
			[
				'reason' => 'bail|required',
			],
			[
				'required' => 'Không được để trống lý do',
			]
		);
		$document = Documents::find($id);
		try {
			$table = new DocumentCancel();
			$table->users_id = Auth::user()->id;
			$table->reason = $req->reason;
			$table->save();

			$document->document_cancel_id = $table->id;
			$document->close = 1;
			$document->save();
			Session::flash('flag_success', 'Đăng ký hủy thành công');
		} catch (Throwable $th) {
			Session::flash('flag_error', 'Đăng ký hủy không thành công');
		}
		return redirect()->route('biensoantailieugiangday');
	}
	public function postDeployReportTeachingDocument(Request $req, $id)
	{
		// dd($req->all());
		try {
			$doc = Documents::find($id);
			$doc->deploy_report = $req->result;
			$doc->save();
			Session::flash('flag_success', 'Báo cáo tiến độ thành công');
		} catch (Throwable $th) {
			Session::flash('flag_error', 'Báo cáo tiến độ không thành công');
		}
		return redirect()->back();
	}
	public function postLiquidationTopic(Request $req, $id)
	{
		$topic = TopicM::find($id);
		if (!isset($topic)) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy topic');
		}
		if ($topic->status != 7) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy trang');
		}
		if (isset($topic->liquidation)) {
			$fileOld = json_decode($topic->liquidation);
		}
		$name_file1 = trim($req->file1->getClientOriginalName(), '.pdf');
		$name_file2 = trim($req->file2->getClientOriginalName(), '.pdf');
		$slug1 = Str::slug($name_file1, '-');
		$slug2 = Str::slug($name_file2, '-');
		$path1 = $req->file1->storeAs('topic_m/' . date('Y_m_d') . '_' . $req->id, date('Y_m_d') . '_' . $req->id . '_file1_liquidation_' . $slug1 . '.pdf');
		$path2 = $req->file2->storeAs('topic_m/' . date('Y_m_d') . '_' . $req->id, date('Y_m_d') . '_' . $req->id . '_file2_liquidation_' . $slug2 . '.pdf');
		$path = [
			[
				'filename' => $req->file1->getClientOriginalName(),
				'path' => $path1,
			],
			[
				'filename' => $req->file2->getClientOriginalName(),
				'path' => $path2,
			],
		];
		$topic->liquidation = json_encode($path);
		$topic->save();
		if (isset($fileOld)) {
			$pathOld = [];
			foreach ($fileOld as $key => $item) {
				array_push($pathOld, $item->path);
			}
			Storage::delete($pathOld);
		}
		return redirect()->back()->with('flash_message', 'Đã nộp file thành công');
	}
	
	public function postDeployReportTeachingDocument2(Request $req, $id)
	{
		try {
			$doc = Documents::find($id);
			$doc->deploy_report = $req->result;
			$doc->notice_report = 2;
			$doc->save();
			Session::flash('flag_success', 'Báo cáo tiến độ thành công');
		} catch (Throwable $th) {
			Session::flash('flag_error', 'Báo cáo tiến độ không thành công');
		}
		return redirect()->back();
	}
	public function postAcceptanceDocument($id, Request $req)
	{
		// dd($req->all());
		$doc = Documents::find($id);
		if (!isset($doc)) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy tài liệu');
		}
		if (isset($doc->acceptance)) {
			$fileOld = json_decode($doc->acceptance);
		}
		if ($doc->status != 4) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy trang');
		}
		$name_file1 = trim($req->file1->getClientOriginalName(), '.pdf');
		$name_file2 = trim($req->file2->getClientOriginalName(), '.pdf');
		$slug1 = Str::slug($name_file1, '-');
		$slug2 = Str::slug($name_file2, '-');

		$path1 = $req->file1->storeAs('doc_/' . date('Y_m_d') . '_' . $id, date('Y_m_d') . '_' . $id . '_file1/' . $slug1 . '.pdf');
		$path2 = $req->file2->storeAs('doc_/' . date('Y_m_d') . '_' . $id, date('Y_m_d') . '_' . $id . '_file2/' . $slug2 . '.pdf');
		$path = [
			[
				'filename' => $req->file1->getClientOriginalName(),
				'path' => $path1,
			],
			[
				'filename' => $req->file2->getClientOriginalName(),
				'path' => $path2,
			],
		];
		$doc->acceptance = json_encode($path);
		$doc->save();
		if (isset($fileOld)) {
			$pathOld = [];
			foreach ($fileOld as $key => $item) {
				array_push($pathOld, $item->path);
			}
			Storage::delete($pathOld);
		}
		return redirect()->back()->with('flash_message', 'Đã nộp file thành công');;
	}
	public function postUploadEditDocument($id, Request $req)
	{
		// dd($req->all());
		// $req->validate(['file1'=>'size:5000','file2'=>'size:5000']);
		$doc = Documents::find($id);
		if (!isset($doc)) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy tài liệu');
		}
		if (isset($doc->liquidation)) {
			$fileOld = json_decode($doc->liquidation);
		}
		if ($doc->status != 5) {
			return redirect()->back()->with('flag_error', 'Không tìm thấy trang');
		}
		try {
			$name_file1 = trim($req->file1->getClientOriginalName(), '.pdf');
			$name_file2 = trim($req->file2->getClientOriginalName(), '.pdf');
			$slug1 = Str::slug($name_file1, '-');
			$slug2 = Str::slug($name_file2, '-');
			$path1 = $req->file1->storeAs('doc_edit/' . date('Y_m_d') . '_' . $id, date('Y_m_d') . '_' . $id . '_file1/' . $slug1 . '.pdf');
			$path2 = $req->file2->storeAs('doc_edit/' . date('Y_m_d') . '_' . $id, date('Y_m_d') . '_' . $id . '_file2/' .  $slug2 . '.pdf');
			$path = [
				[
					'filename' => $req->file1->getClientOriginalName(),
					'path' => $path1,
				],
				[
					'filename' => $req->file2->getClientOriginalName(),
					'path' => $path2,
				],
			];
			$doc->liquidation = json_encode($path);
			$doc->save();
			if (isset($fileOld)) {
				$pathOld = [];
				foreach ($fileOld as $key => $item) {
					array_push($pathOld, $item->path);
				}
				Storage::delete($pathOld);
			}
			return redirect()->back();
		} catch (\Exception $e) {
			Session::flash('error_message', 'Upload file không thành công');
		}
	}
	public function getFormAcceptanceDocumentUser($slug)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::where('users_id', $id_user)
			->where('slug_doc', $slug)
			->first();
		if (isset($doc)) {
			$list_greed = AcceptanceDoc::where('id_doc', $doc->id)->get();
			$summary_acc = SummaryAcceptance::where('id_doc', $doc->id)->first();
			$greed_council = json_decode($summary_acc->greed_council);
			$score = json_decode($summary_acc->score);
			$i = 1;
			return view(
				'page.form_summary_acceptance_review',
				compact('doc', 'list_greed', 'summary_acc', 'greed_council', 'score', 'i')
			);
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}

	public function downloadPdfScientificProfile(Request $req)
	{
		$profile = ScientificProfile::where('users_id', $req->id)->get()->first();
		$type = $req->type;
		if (!isset($profile)) {
			return redirect()->back();
		}
		switch ($type) {
			case 'document':
				$document = json_decode($profile->document);
				return Storage::download($document->file);
				break;
			case 'article':
				$article = json_decode($profile->article);
				return Storage::download($article->file);
				break;
			case 'prize':
				$prize = json_decode($profile->prize);
				if (isset($prize->file)) {
					return Storage::download($prize->file);
				} else {
					return redirect()->back();
				}
				break;
		}
	}
	public function getRegisterFormDetailTopic($id)
	{
		$topic_m = TopicM::with('getRegisterTopic')->find($id);
		if (Auth::user()->id == $topic_m->users_id || Auth::user()->id == $topic_m->getRegisterTopic->id_user_approval) {
			$topic = TopicM::find($id);
			$researchType = json_decode($topic->getRegisterTopic->research_type, true);
			return view('admin.form_register_topic', compact('topic', 'researchType'));
		} else {
			return redirect()->route('login');
		}
	}
	public function getDetailNotice($id)
	{
		$notice = NoticeSystem::find($id);
		return view('page.detail_notice_system', compact('notice'));
	}
	public function getSearchInformation(Request $req)
	{
		// dd($req->all());
		$search = trim($req->indexsearch);
		if (!empty($search)) {
			$docs = Documents::where('name_doc', 'LIKE', '%' . $search . '%')->paginate(5);
			$topics = TopicM::where('name_topic', 'LIKE', '%' . $search . '%')->paginate(5);
			$notices = NoticeSystem::where('title', 'LIKE', '%' . $search . '%')->paginate(5);
			return view('page.search', compact('docs', 'topics', 'notices'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
}
