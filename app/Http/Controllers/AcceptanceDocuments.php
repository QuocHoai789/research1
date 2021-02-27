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
use App\SummaryAcceptance;
use PDF;
use Storage;

class AcceptanceDocuments extends Controller
{
	public function getLoginAcceptance()
	{
		if (session::has('backUrle') && Session::get('backUrle') != route('loginacceptance')) {
		} else {
			Session::put('backUrle', url()->previous());
		}
		return view('acceptance_doc.loginacceptance');
	}
	public function postLoginAcceptance(Request $req)
	{

		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			if (session::has('backUrle') && Session::get('backUrle') != route('loginacceptance')) {

				return redirect(Session::get('backUrle'));
			} else {

				return redirect()->intended();
			}
		} else {
			return redirect()->route('loginacceptance')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutAcceptance()
	{
		Auth::logout();
		return redirect()->route('loginacceptance');
	}

	public function getAcceptanceDocument($id)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::find($id);

		if ($doc != null && ($doc->status == 4)) {
			$role = 0;
			$greed_council = json_decode($doc->registerdoc->greed_council);
			foreach ($greed_council  as $key => $gre) {
				if ($gre == Auth::user()->name && $key == 'president') {
					$role = 1;
				}
			}
			$acceptance_doc = 	AcceptanceDoc::where('id_doc', $doc->id)
								->where('id_user_acceptance', $id_user)
								->first();
			$list_acceptance_doc = AcceptanceDoc::where('id_doc', $doc->id)->get();
			// dd($acceptance_doc);
			$id_user_doc = $doc->users_id;
			// $users = User::all();
			$profile 	= ScientificProfile::where('users_id', $id_user_doc)
							->first();
			$degree 	= json_decode($profile->degree);
			$members 	= json_decode($doc->members);
			$day 		= json_decode($doc->registerdoc->time_process);
			$study 		= StudyDocument::find($doc->registerdoc->study_document_id);

			if ($role == 0) {
				return view('acceptance_doc.acceptance_document', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'acceptance_doc'));
			} elseif ($role == 1) {

				$flag = 0;

				if (count($list_acceptance_doc) < 5) {
					$flag = 1;
				}
				foreach ($list_acceptance_doc as $li) {
					if ($li->status == 0) {
						$flag = 1;
					}
				}
				return view('acceptance_doc.president_acceptance_document', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'acceptance_doc', 'flag'));
			}
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postAcceptanceDocument($id, Request $req)
	{
		// dd($req->all());

		$name = Auth::user()->name;
		$doc = Documents::find($id);
		$greed_council = json_decode($doc->registerdoc->greed_council);
		$position = '';
		if (isset($greed_council)) {
			foreach ($greed_council as $key => $co) {
				if ($name == $co) {
					$position = $key;
				}
			}
		}

		$doc 				= Documents::find($id);
		$total 				= 0;
		$accuracy 			= $req->accuracy;
		$suitability 		= $req->suitability;
		$response_level 	= $req->response_level;
		$exercise_quality 	= $req->exercise_quality;
		$logic 				= $req->logic;
		$image_quality 		= $req->image_quality;
		$master_quality 	= $req->master_quality;
		$references 		= $req->references;
		$opinion 			= $req->opinion;
		$conclude 			= $req->conclude;
		$total 				= $accuracy + $suitability + $response_level + $exercise_quality + $logic
								+ $image_quality + $master_quality + $references;

		$acceptance_doc 				  = AcceptanceDoc::find($req->id_acceptance_doc);
		// dd($acceptance_doc);
		$acceptance_doc->accuracy 		  = $accuracy;
		$acceptance_doc->suitability  	  = $suitability;
		$acceptance_doc->response_level   = $response_level;
		$acceptance_doc->exercise_quality = $exercise_quality;
		$acceptance_doc->logic 			  = $logic;
		$acceptance_doc->image_quality    = $image_quality;
		$acceptance_doc->master_quality   = $master_quality;
		$acceptance_doc->references 	  = $references;
		$acceptance_doc->opinion 		  = $opinion;
		$acceptance_doc->conclude 		  = $conclude;
		$acceptance_doc->total 			  = $total;
		$acceptance_doc->position_council = $position;
		$acceptance_doc->status 		  = 1;
		$acceptance_doc->save();
		return redirect()->back();
	}
	public function getFormAcceptanceDocument($id, $id_acc)
	{
		$doc = Documents::find($id);

		if ($doc != null) {
			$acceptance_doc = AcceptanceDoc::find($id_acc);
			$id_user_doc    = $doc->users_id;
			$profile 		= ScientificProfile::where('users_id', $id_user_doc)
							  ->first();
			$degree			= json_decode($profile->degree);
			$members 		= json_decode($doc->members);
			$day 			= json_decode($doc->registerdoc->time_process);
			$study 			= StudyDocument::find($doc->registerdoc->study_document_id);
			$councils 		= json_decode($doc->registerdoc->greed_council);
			// dd($councils);
			$position = '';
			foreach ($councils as $key => $cou) {
				// dd($cou);
				if ($cou == Auth::user()->name) {
					$position = $key;
				}
			}
			// dd($position);
			return view('acceptance_doc.form_acceptance_doc', compact('doc', 'acceptance_doc', 'profile', 'degree', 'members', 'day', 'study', 'position'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
		//return view('acceptance_doc.form_acceptance_doc', compact('doc', 'acceptance_doc'));
	}
	public function getFormSummaryAcceptanceDocument($id)
	{
		$i = 1;
		$doc = Documents::find($id);
		$acceptance_doc = AcceptanceDoc::where('id_doc', $doc->id)->get();
		$score = [];
		foreach ($acceptance_doc as $key => $acc) {
			if ($acc->position_council == 'president') {
				$score['president'] = $acc->total;
			} elseif ($acc->position_council == 'uv') {
				$score['uv'] = $acc->total;
			} elseif ($acc->position_council == 'pb1') {
				$score['pb1'] = $acc->total;
			} elseif ($acc->position_council == 'pb2') {
				$score['pb2'] = $acc->total;
			} elseif ($acc->position_council == 'tk') {
				$score['tk'] = $acc->total;
			}
		}
		$avg_score = array_sum($score) / count($score);
		return view('acceptance_doc.summary_acceptance', compact('doc', 'acceptance_doc', 'score', 'avg_score', 'i'));
	}
	public function postAgreeAcceptanceDocument($id, Request $req)
	{
		$doc = Documents::find($id);


		// dd($doc->registerdoc);
		if ($doc != null) {
			$acceptance_doc = AcceptanceDoc::where('id_doc', $doc->id)->get();
			$opinion = [];
			$score = [];
			foreach ($acceptance_doc as $key => $acc) {
				if ($acc->position_council == 'president') {
					$score['president'] = $acc->total;
				} elseif ($acc->position_council == 'uv') {
					$score['uv'] = $acc->total;
				} elseif ($acc->position_council == 'pb1') {
					$score['pb1'] = $acc->total;
				} elseif ($acc->position_council == 'pb2') {
					$score['pb2'] = $acc->total;
				} elseif ($acc->position_council == 'tk') {
					$score['tk'] = $acc->total;
				}
			}
			foreach ($acceptance_doc as $key => $acc) {
				if ($acc->position_council == 'president') {
					$opinion['president'] = $acc->opinion;
				} elseif ($acc->position_council == 'uv') {
					$opinion['uv'] = $acc->opinion;
				} elseif ($acc->position_council == 'pb1') {
					$opinion['pb1'] = $acc->opinion;
				} elseif ($acc->position_council == 'pb2') {
					$opinion['pb2'] = $acc->opinion;
				} elseif ($acc->position_council == 'tk') {
					$opinion['tk'] = $acc->opinion;
				}
			}



			$avg_score 		= array_sum($score) / count($score);
			$id_user_doc    = $doc->users_id;
			$profile 		= ScientificProfile::where('users_id', $id_user_doc)
							  ->first();
			$degree 		= json_decode($profile->degree);
			$members 		= json_decode($doc->members);
			$day 			= json_decode($doc->registerdoc->time_process);
			$study 			= StudyDocument::find($doc->registerdoc->study_document_id);

			$total = 0;
			foreach ($score as $key => $val) {
				$total +=  $val;
			}
			$avr = $total / count($score);

			$sumary_acc 				= new SummaryAcceptance;
			$sumary_acc->id_doc 		= $doc->id;
			$sumary_acc->greed_council  = $doc->registerdoc->greed_council;
			$sumary_acc->score 			= json_encode($score);
			$sumary_acc->total 			= $avr;
			if ($avr >= 80) {
				$sumary_acc->conclude = '1';
			} elseif ($avr >= 70) {
				$sumary_acc->conclude = '2';
			} elseif ($avr >= 50) {
				$sumary_acc->conclude = '3';
			} else {
				$sumary_acc->conclude = '4';
			}

			$sumary_acc->save();
			$doc->sumary_acc_id = $sumary_acc->id;
			$doc->save();
			return redirect()->back();
		}
	}
	public function postCancelDocument($id, Request $req)
	{
		$doc 		= Documents::find($id);
		$doc->close = 2;
		$doc->save();
		return redirect()->back();
	}
}
