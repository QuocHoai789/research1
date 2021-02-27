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
use App\AcceptanceTopic;
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
use App\SummaryAccTopic;
use PDF;
use Storage;

class AcceptanceTopicController extends Controller
{
	public function getLoginAcceptanceTopic()
	{
		if (session::has('backUrle') && Session::get('backUrle') != route('loginacceptancetopic')) {
		} else {
			Session::put('backUrle', url()->previous());
		}
		return view('acceptance_topic.loginacceptancetopic');
	}
	public function postLoginAcceptanceTopic(Request $req)
	{

		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			if (session::has('backUrle') && Session::get('backUrle') != route('loginacceptancetopic')) {

				return redirect(Session::get('backUrle'));
			} else {

				return redirect()->intended();
			}
		} else {
			return redirect()->route('loginacceptancetopic')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutAcceptanceTopic()
	{
		Auth::logout();
		return redirect()->route('loginacceptancetopic');
	}
	public function getAcceptanceTopic($id)
	{
		$id_user = Auth::user()->id;
		$topic = TopicM::find($id);

		if ($topic != null && ($topic->status == 6)) {
			$role = 0;
			$council = json_decode($topic->getRegisterTopic->council, true);
			foreach ($council  as $key => $cou) {
				if ($cou == Auth::user()->name && $key == 'president') {
					$role = 1;
				}
			}
			$acceptance_topic = 	AcceptanceTopic::where('id_topic', $topic->id)
				->where('id_user_acceptance', $id_user)
				->first();
			$list_acceptance_topic = AcceptanceTopic::where('id_topic', $topic->id)->get();
			// dd($acceptance_doc);
			$id_user_topic = $topic->users_id;
			// $users = User::all();
			$profile = ScientificProfile::where('users_id', $id_user_topic)
				->first();
			$degree = json_decode($profile->degree);
			// $members = json_decode($topic->members);
			// $day = json_decode($topic->registerdoc->time_process);

			if ($role == 0) {
				return view('acceptance_topic.user_acceptance_topic', compact('topic', 'profile', 'degree', 'acceptance_topic'));
			} elseif ($role == 1) {

				$flag = 0;

				if (count($list_acceptance_topic) < 5) {
					$flag = 1;
				}
				foreach ($list_acceptance_topic as $li) {
					if ($li->status == 0) {
						$flag = 1;
					}
				}
				return view('acceptance_topic.president_acceptance_topic', compact('topic', 'profile', 'degree', 'acceptance_topic', 'flag'));
			}
		} else {
			abort(404, 'Page not found');
		}
	}
	public function postSendAcceptanceTopic($id, Request $req)
	{
		// dd($req->all());
		$name 											= Auth::user()->name;
		$position										= '';
		$topic 				 							= TopicM::find($id);
		$target						 					= $req->target;
		$content 					 					= $req->content;
		$approach 			 							= $req->approach;
		$product_application 							= $req->product_application;
		$scientific_products		 					= $req->scientific_products;
		$training_products 	 							= $req->training_products;
		$scientific_value    							= $req->scientific_value;
		$application_value  		 					= $req->application_value;
		$about_education_and_training 					= $req->about_education_and_training;
		$socio_economic 								= $req->socio_economic;
		$transfer_method 								= $req->transfer_method;
		$student_training 								= $req->student_training;
		$scientific_article 							= $req->scientific_article;
		$report_quality 								= $req->report_quality;
		$opinion 										= $req->opinion;
		$total											= $target + $content + $approach + $product_application
			+ $scientific_products + $training_products + $scientific_value
			+ $application_value + $about_education_and_training
			+ $socio_economic + $transfer_method + $student_training
			+ $scientific_article + $report_quality;
		$council = json_decode($topic->getRegisterTopic->council, true);
		if (isset($council)) {
			foreach ($council as $key => $co) {
				if ($name == $co) {
					$position = $key;
				}
			}
		}

		$acceptance_topic 								= AcceptanceTopic::find($req->id_acceptance_topic);
		$acceptance_topic->target 						= $target;
		$acceptance_topic->content 						= $content;
		$acceptance_topic->approach 					= $approach;
		$acceptance_topic->product_application  		= $product_application;
		$acceptance_topic->scientific_products  		= $scientific_products;
		$acceptance_topic->training_products 			= $training_products;
		$acceptance_topic->scientific_value 			= $scientific_value;
		$acceptance_topic->application_value 			= $application_value;
		$acceptance_topic->about_education_and_training = $about_education_and_training;
		$acceptance_topic->socio_economic 				= $socio_economic;
		$acceptance_topic->transfer_method 				= $transfer_method;
		$acceptance_topic->student_training 			= $student_training;
		$acceptance_topic->scientific_article 			= $scientific_article;
		$acceptance_topic->report_quality 				= $report_quality;
		$acceptance_topic->total 						= $total;
		$acceptance_topic->classification 				= classificationTopic($total);
		$acceptance_topic->opinion 						= $opinion;
		$acceptance_topic->position_council				= $position;
		$acceptance_topic->status 						= 1;
		$acceptance_topic->save();
		return redirect()->back();
	}
	public function getFormAcceptanceTopic($id, $id_acc)
	{
		$topic  = TopicM::find($id);
		$acceptance_topic = AcceptanceTopic::find($id_acc);
		if (isset($topic) && isset($acceptance_topic)) {
			return view(
				'acceptance_topic.form_acceptance_topic',
				compact('topic', 'acceptance_topic')
			);
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getFormSummaryAcceptanceTopic($id)
	{
		$topic = TopicM::find($id);
		if (isset($topic)) {
			return view('acceptance_topic.form_summary_acc_topic', compact('topic'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postSendSummaryAcceptanceTopic($id)
	{
		$topic = TopicM::find($id);
		if ($topic != null) {
			$acceptance_topic = AcceptanceTopic::where('id_topic', $topic->id)->get();
			$opinion = [];
			$score = [];
			foreach ($acceptance_topic as $key => $acc) {
				if ($acc->position_council == 'president') {
					$score['president'] = $acc->total;
					$opinion['president'] = $acc->opinion;
				} elseif ($acc->position_council == 'uv') {
					$score['uv'] = $acc->total;
					$opinion['uv'] = $acc->opinion;
				} elseif ($acc->position_council == 'pb1') {
					$score['pb1'] = $acc->total;
					$opinion['pb1'] = $acc->opinion;
				} elseif ($acc->position_council == 'pb2') {
					$score['pb2'] = $acc->total;
					$opinion['pb2'] = $acc->opinion;
				} elseif ($acc->position_council == 'tk') {
					$score['tk'] = $acc->total;
					$opinion['tk'] = $acc->opinion;
				}
			}

			$avg_score = array_sum($score) / count($score);
			$id_user_topic = $topic->users_id;
			$profile = ScientificProfile::where('users_id', $id_user_topic)
				->first();

			$total = 0;
			foreach ($score as $key => $val) {
				$total +=  $val;
			}
			$avr = $total / count($score);

			$sumary_acc = new SummaryAccTopic;

			$sumary_acc->id_topic = $topic->id;
			$sumary_acc->council  = $topic->getRegisterTopic->council;
			$sumary_acc->score 	  = json_encode($score);
			$sumary_acc->total 	  = $avr;
			$sumary_acc->save();

			$topic->sumary_acc_id = $sumary_acc->id;
			$topic->save();
			return redirect()->back();
		}
	}
}
