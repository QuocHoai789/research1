<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Topic;
use App\TopicM;
use App\RegisterTopic;
use App\Documents;
use App\Register_Documents;
use App\StudyDocument;
use App\ScientificProfile;
use App\DiscussDocument;
use App\EvaluteDoc;
use App\OutsideCouncil;
use App\OutsideEvalute;
use App\SummaryOutline;
use Auth;
use Mail;
use Session;

class ApprovalDocumentController extends Controller
{

	public function getLoginApprovalDoc()
	{
		if (session::has('backUrl1') && Session::get('backUrl1') != route('loginapprovaldoc')) {
		} else {
			Session::put('backUrl1', url()->previous());
		}
		return view('approval_doc.login_approval_doc');
	}
	public function postLoginApprovalDoc(Request $req)
	{
		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			if (session::has('backUrl1') && Session::get('backUrl1') != route('loginapprovaldoc')) {
				return redirect(Session::get('backUrl1'));
			} else
				return redirect()->intended();
		} else {
			return redirect()->route('loginapprovaldoc')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutApprovalDoc()
	{
		Auth::logout();

		return redirect()->route('loginapprovaldoc');
	}
	public function getRegisterDocumentApproval($id)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::find($id);
		// $evalute_doc = EvaluteDoc::where('id_user_evalute', $id_user)->where('id_doc', $id )->first();
		// $list_evalute = EvaluteDoc::where('id_doc', $id)->get();

		if ($doc->registerdoc->id_user_approval == $id_user) {

			if ($doc != null && ($doc->status == 1 || $doc->status == 2)) {
				$id_user = $doc->users_id;
				$users 	 = User::all();
				$profile = ScientificProfile::where('users_id', $id_user)->first();
				$degree  = json_decode($profile->degree);
				$members = json_decode($doc->members);
				$day 	 = json_decode($doc->registerdoc->time_process);
				$study 	 = StudyDocument::find($doc->registerdoc->study_document_id);

				return view('approval_doc.register_doc_approval', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'users'));
			} else {
				abort(404, 'Trang không tồn tại');
			}
		} else {
			return redirect()->route('loginapprovaldoc');
		}
	}
	public function postCouncilApproval(Request $req)
	{

		// dd($req->all());
		$coucil = $req->council;
		$doc = Documents::find($req->id_doc);
		$registerdoc 			= Register_Documents::where('id', $doc->register_id)->first();
		$registerdoc->council 	= json_encode($coucil);
		$registerdoc->save();
		// unset($coucil['president']);
		$outside = $coucil['pb2'];
		unset($coucil['pb2']);
		$users = [];
		$ids = [];
		$id_president = $req->id_president;
		$evalute_doc_pre_old = EvaluteDoc::where('id_doc', $req->id_doc)
			->where('id_user_evalute', $id_president)
			->get();

		if (count($evalute_doc_pre_old) == 0) {

			$evalute_doc_pre_old 						= new EvaluteDoc();
			$evalute_doc_pre_old->id_doc 				= $doc->id;
			$evalute_doc_pre_old->id_user_evalute 		= $id_president;
			$evalute_doc_pre_old->curriculum_structure 	= '0';
			$evalute_doc_pre_old->suitability 			= '0';
			$evalute_doc_pre_old->urgency 				= '0';
			$evalute_doc_pre_old->duplication 			= '0';
			$evalute_doc_pre_old->total 				= '0';
			$evalute_doc_pre_old->opinion 				= '';
			$evalute_doc_pre_old->conclude 				= '0';
			$evalute_doc_pre_old->classification 		= '0';
			$evalute_doc_pre_old->position_council 		= '';
			$evalute_doc_pre_old->save();
		}
		$evalute_doc_outside = OutsideEvalute::where('id_doc', $req->id_doc)
			->where('outside_email', $outside)
			->get();
		if (count($evalute_doc_outside) == 0) {
			$evalute_doc_outside 					    = new OutsideEvalute;
			$evalute_doc_outside->id_doc 				= $doc->id;
			$evalute_doc_outside->outside_email 		= $outside;
			$evalute_doc_outside->name 					= $req->outside_name;
			$evalute_doc_outside->curriculum_structure 	= '0';
			$evalute_doc_outside->suitability 			= '0';
			$evalute_doc_outside->urgency 				= '0';
			$evalute_doc_outside->duplication  			= '0';
			$evalute_doc_outside->total 				= '0';
			$evalute_doc_outside->opinion 				= '';
			$evalute_doc_outside->conclude 				= '0';
			$evalute_doc_outside->classification 		= '0';
			$evalute_doc_outside->save();
		}
		foreach ($coucil as $key => $cou) {
			// dd($coucil['uv']);
			$mail = User::where('email', $coucil[$key])->first();
			$ids[] = $mail->id;
			$users[] = $coucil[$key];
		}

		foreach ($ids as  $idd) {
			$evalute_doc_old = EvaluteDoc::where('id_doc', $req->id_doc)
				->where('id_user_evalute', $idd)
				->get();

			if (count($evalute_doc_old) == 0) {

				$evalute_doc 						= new EvaluteDoc();
				$evalute_doc->id_doc 				= $doc->id;
				$evalute_doc->id_user_evalute 		= $idd;
				$evalute_doc->curriculum_structure 	= '0';
				$evalute_doc->suitability 			= '0';
				$evalute_doc->urgency 				= '0';
				$evalute_doc->duplication 			= '0';
				$evalute_doc->total 				= '0';
				$evalute_doc->opinion 				= '';
				$evalute_doc->conclude 				= '0';
				$evalute_doc->position_council 		= '';
				$evalute_doc->classification 		= '0';
				$evalute_doc->save();
			}
		}
		$data = [
			'name' => Auth::user()->name,
			'id_doc' => $doc->id,
			'mess' => $req->message,
			'name_doc' => $doc->name_doc

		];
		// dd($users);
		// if ($topic->email != null) {
		try {
			Mail::send('approval_doc.email_evalute_approval', $data, function ($message) use ($users, $doc) {
				$message->from(ENV('MAIL_USERNAME'), 'Đánh giá đề cương biên soạn tài liệu giảng dạy');
				$message->to($users, 'Tài liệu:' . $doc->name_doc);
				$message->subject('Tài liệu:' . $doc->name_doc);
			});
		} catch (\Exception $e) {
			Session::flash('error_message', 'Gửi mail không thành công');
			return redirect()->back();
		}

		
		$data1 = [
			'name' 		 => Auth::user()->name,
			'id_outside' => $evalute_doc_outside->id,
			'mess' 		 => $req->message,
			'name_doc' 	 => $doc->name_doc

		];
		// dd($users);
		// if ($topic->email != null) {
		// 	try
		// 	{
		// 		Mail::send('approval_doc.email_evalute_approval',$data, function($message) use ($users,$doc){
		// 	$message->from( ENV('MAIL_USERNAME') ,'Đánh giá đề cương biên soạn tài liệu giảng dạy');
		// 	$message->to($users, 'Tài liệu:'.$doc->name_doc);
		// 	$message->subject('Tài liệu:'.$doc->name_doc);
		// });
		// 	}catch(Exception $e){
		// 		echo "Đã xảy ra lỗi: ".$e;
		// 	}


		try {
			Mail::send('approval_doc.outside_email_evalute_approval', $data1, function ($message) use ($outside, $doc) {
				$message->from(ENV('MAIL_USERNAME'), 'Đánh giá đề cương biên soạn tài liệu giảng dạy');
				$message->to($outside, 'Tài liệu:' . $doc->name_doc);
				$message->subject('Tài liệu:' . $doc->name_doc);
			});
		} catch (\Exception $e) {
			Session::flash('error_message', 'Gửi mail không thành công');
		}

		Session::flash('flash_message', 'Send message successfully!');

		return redirect()->back();
	}
	public function getCouncilDocumentApproval($id)
	{
		$i 			 = 1;
		$doc 		 = Documents::find($id);
		$registerdoc = Register_Documents::where('id', $doc->register_id)->first();
		$council 	 = json_decode($registerdoc->council);
		$users 	     = [];
		foreach ($council as $key =>  $cou) {
			$user 			= User::where('email', $cou)->first();
			$users[$key][]  = $user;
		}
		// dd($users);
		return view('approval_doc.list-council', compact('i', 'users'));
	}
	public function getFormEvaluteDocumentApproval($id, $id_eval)
	{
		// $id_user=Auth::user()->id;
		$doc = Documents::find($id);
		if ($doc != null) {
			$evalute_doc = 	EvaluteDoc::find($id_eval);
			$id_user_doc = $doc->users_id;
			$profile 	 = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree 	 = json_decode($profile->degree);
			$members 	 = json_decode($doc->members);
			$day 		 = json_decode($doc->registerdoc->time_process);
			$study 		 = StudyDocument::find($doc->registerdoc->study_document_id);
			$councils 	 = json_decode($doc->registerdoc->council);
			// dd($councils);
			$mail 		 = $evalute_doc->user->email;
			$position 	 = '';
			foreach ($councils as $key => $cou) {
				// dd($cou);
				if ($cou == $mail) {
					$position = $key;
				}
			}
			// dd($position);
			return view('evalute_doc.evalute_doc_review', compact('doc', 'evalute_doc', 'profile', 'degree', 'members', 'day', 'study', 'position'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getWriteReportEvaluteDocumentApproval($id)
	{
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

			$outside_doc  = OutsideEvalute::where('id_doc', $doc->id)->first();
			$score['pb2'] = $outside_doc->total;
			$avg_score 	  = array_sum($score) / count($score);
			$id_user_doc  = $doc->users_id;
			$profile 	  = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree  = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day 	 = json_decode($doc->registerdoc->time_process);
			$study 	 = StudyDocument::find($doc->registerdoc->study_document_id);
			return view('evalute_doc.write_evalute_report_doc', compact('doc', 'evalute_doc', 'outside_doc', 'profile', 'degree', 'members', 'day', 'study', 'score', 'avg_score'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getReportEvaluteDocumentApproval($id)
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

			$outside_doc  = OutsideEvalute::where('id_doc', $doc->id)->first();
			$score['pb2'] = $outside_doc->total;
			$avg_score 	  = array_sum($score) / count($score);
			$id_user_doc  = $doc->users_id;
			$profile 	  = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree  = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day 	 = json_decode($doc->registerdoc->time_process);
			$study 	 = StudyDocument::find($doc->registerdoc->study_document_id);
			return view('evalute_doc.evalute_report_doc', compact('doc', 'evalute_doc', 'outside_doc', 'profile', 'degree', 'members', 'day', 'study', 'score', 'avg_score'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postAcceptDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc 		 = Documents::find($req->id_doc);
		$doc->status = 2;
		$doc->save();

		$register_doc 							= Register_Documents::find($doc->register_id);
		$register_doc->message_of_user_approval = $req->message;
		$register_doc->save();

		return redirect()->back();
	}
	public function getAcceptOutlineDocumentApproval($id)
	{
		$id_user 	  = Auth::user()->id;
		$doc 		  = Documents::find($id);
		$evalute_doc  = EvaluteDoc::where('id_user_evalute', $id_user)->where('id_doc', $id)->first();
		$list_evalute = EvaluteDoc::where('id_doc', $id)->get();

		if ($doc->registerdoc->id_user_approval == $id_user) {

			if ($doc != null && ($doc->status == 1 || $doc->status == 2 || $doc->status == 3)) {
				$id_user  = $doc->users_id;
				$users 	  = User::all();
				$profile  = ScientificProfile::where('users_id', $id_user)->first();
				$degree   = json_decode($profile->degree);
				$members  = json_decode($doc->members);
				$day 	  = json_decode($doc->registerdoc->time_process);
				$study 	  = StudyDocument::find($doc->registerdoc->study_document_id);
				$councils = json_decode($doc->registerdoc->council);
				$position = [];
				if (isset($councils)) {
					foreach ($councils as $key => $cou) {
						// dd($cou);

						$position[] = $key;
					}
				}
				$flag = 0;
				$outside_council = OutsideEvalute::where('id_doc', $doc->id)->first();

				if (isset($outside_council) && $outside_council->status == 0) {
					$flag = 1;
				}
				if (count($list_evalute) < 4) {
					$flag = 1;
				}
				foreach ($list_evalute as $li) {
					if ($li->status == 0) {
						$flag = 1;
					}
				}
				// dd($flag);
				return view('approval_doc.register_outline_doc', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'users', 'evalute_doc', 'list_evalute', 'flag', 'position', 'councils', 'outside_council'));
			} else {
				abort(404, 'Trang không tồn tại');
			}
		} else {
			return redirect()->route('loginapprovaldoc');
		}
	}
	public function postAcceptOutlineDocumentApproval(Request $req)
	{
		// dd($req->all());


		$doc = Documents::find($req->id_doc);
		// dd($doc->registerdoc);
		if ($doc != null) {
			$evalute_doc = EvaluteDoc::where('id_doc', $doc->id)->get();
			$opinion 	 = [];
			$score 		 = [];
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
			foreach ($evalute_doc as $key => $eval) {
				if ($eval->position_council == 'president') {
					$opinion['president'] = $eval->opinion;
				} elseif ($eval->position_council == 'uv') {
					$opinion['uv'] = $eval->opinion;
				} elseif ($eval->position_council == 'pb1') {
					$opinion['pb1'] = $eval->opinion;
				} elseif ($eval->position_council == 'tk') {
					$opinion['tk'] = $eval->opinion;
				}
			}

			$outside_doc 	= OutsideEvalute::where('id_doc', $doc->id)->first();
			$score['pb2'] 	= $outside_doc->total;
			$opinion['pb2'] = $outside_doc->opinion;
			$avg_score 		= array_sum($score) / count($score);
			$id_user_doc 	= $doc->users_id;

			$profile = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree  = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day 	 = json_decode($doc->registerdoc->time_process);
			$study 	 = StudyDocument::find($doc->registerdoc->study_document_id);
			// return view('evalute_doc.evalute_report_doc', compact('doc','evalute_doc', 'outside_doc','profile','degree','members','day','study', 'score','avg_score'));
			// dd($opinion);
			$total = 0;
			foreach ($score as $key => $val) {
				$total +=  $val;
			}
			$avr = $total / count($score);
			// dd($total/count($score));
			$sumary_outline = new SummaryOutline;

			$sumary_outline->id_doc = $doc->id;
			$sumary_outline->councils = $doc->registerdoc->council;
			$sumary_outline->opinion = json_encode($opinion);
			$sumary_outline->score = json_encode($score);
			$sumary_outline->total = $avr;
			if ($avr >= 80) {
				$sumary_outline->conclude = '1';
			} elseif ($avr >= 70) {
				$sumary_outline->conclude = '2';
			} elseif ($avr >= 50) {
				$sumary_outline->conclude = '3';
			} else {
				$sumary_outline->conclude = '4';
			}


			$sumary_outline->time 		   = '';
			$sumary_outline->place		   = '';
			$sumary_outline->population    = '';
			$sumary_outline->other_opinion = '';
			$sumary_outline->save();

			$doc->summary_outline_id = $sumary_outline->id;
			$doc->save();

			// $doc->status = 3;
			// $doc->save();
			return redirect()->back();
		}
	}
	public function postCloseOutlineDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc = Documents::find($req->id_doc);


		// dd($doc->registerdoc);
		if ($doc != null) {
			$evalute_doc = EvaluteDoc::where('id_doc', $doc->id)->get();
			$opinion 	 = [];
			$score 		 = [];
			foreach ($evalute_doc as $key => $eval) {
				if ($eval->position_council == 'president') {
					$score['president']   = $eval->total;
					$opinion['president'] = $eval->opinion;
				} elseif ($eval->position_council == 'uv') {
					$score['uv']   = $eval->total;
					$opinion['uv'] = $eval->opinion;
				} elseif ($eval->position_council == 'pb1') {
					$score['pb1']   = $eval->total;
					$opinion['pb1'] = $eval->opinion;
				} elseif ($eval->position_council == 'tk') {
					$score['tk']   = $eval->total;
					$opinion['tk'] = $eval->opinion;
				}
			}


			$outside_doc 	= OutsideEvalute::where('id_doc', $doc->id)->first();
			$score['pb2'] 	= $outside_doc->total;
			$opinion['pb2'] = $outside_doc->opinion;
			$avg_score 		= array_sum($score) / count($score);
			$id_user_doc 	= $doc->users_id;
			$profile = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree  = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day 	 = json_decode($doc->registerdoc->time_process);
			$study 	 = StudyDocument::find($doc->registerdoc->study_document_id);
			$total   = 0;
			foreach ($score as $key => $val) {
				$total +=  $val;
			}
			$avr = $total / count($score);
			// dd($total/count($score));
			$sumary_outline = new SummaryOutline;

			$sumary_outline->id_doc   = $doc->id;
			$sumary_outline->councils = $doc->registerdoc->council;
			$sumary_outline->opinion  = json_encode($opinion);
			$sumary_outline->score    = json_encode($score);
			$sumary_outline->total    = $avr;
			if ($avr >= 80) {
				$sumary_outline->conclude = '1';
			} elseif ($avr >= 70) {
				$sumary_outline->conclude = '2';
			} elseif ($avr >= 50) {
				$sumary_outline->conclude = '3';
			} else {
				$sumary_outline->conclude = '4';
			}


			$sumary_outline->time 			= '';
			$sumary_outline->place 			= '';
			$sumary_outline->population 	= '';
			$sumary_outline->other_opinion 	= '';

			$sumary_outline->save();

			$doc->summary_outline_id = $sumary_outline->id;
			$doc->close = 2;
			$doc->save();
			return redirect()->back();
		}
	}
	public function postAcceptCancelDocApproval($id)
	{
		// dd($req->all());
		$doc 		= Documents::find($id);
		$doc->close = 2;
		$doc->save();
		noticeMailDoc($doc->id, 'Tài liệu biên soạn đã bị hủy!!!');
		return redirect()->back();
	}
	public function postAcceptCompilationDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc 		 = Documents::find($req->id_doc);
		$doc->status = 2;
		$doc->save();
		noticeMailDoc($doc->id, 'Tài liệu biên soạn đã được duyệt !!!');
		return redirect()->back();
	}
	public function postAcceptProcessDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc 		 = Documents::find($req->id_doc);
		$doc->status = 3;
		$doc->save();
		noticeMailDoc($doc->id, 'Bắt đầu biên soạn tài liệu giảng dạy !!!');
		return redirect()->back();
	}
	public function postAcceptProcessDocumentApproval2(Request $req)
	{
		// dd($req->all());
		$doc 				= Documents::find($req->id_doc);
		$doc->notice_report = 1;
		$doc->save();
		return redirect()->back();
	}
	public function postAcceptAcceptanceDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc = Documents::find($req->id_doc);
		// $user = User::find($req->id_user);
		// $data = [
		// 	'name' => Auth::user()->name,
		// 	'id_doc' => $doc->id,
		// 	'mess' => $req->message,
		// 	'name_doc' => $doc->name_doc

		// ];

		// try {
		// 	Mail::send('approval_doc.email_acceptance_doc', $data, function ($message) use ($user, $doc) {
		// 	$message->from(ENV('MAIL_USERNAME'), 'Thành lập hội đồng nghiệm thu tài liệu biên soạn');
		// 	$message->to($user->email, 'Tài liệu:' . $doc->name_doc);
		// 	$message->subject('Tài liệu:' . $doc->name_doc);
		// });
		// } catch (\Exception $e) { // Using a generic exception
		// 	Session::flash('flash_message', 'Gửi mail không thành công!');
		// 	return redirect()->back();
		// }


		$doc->status = 4;
		$doc->save();
		noticeMailDoc($doc->id, 'Tài liệu biên soạn đã được cho phép nghiệm thu !!!');
		return redirect()->back();
	}
	public function postCouncilAcceptanceDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc = Documents::find($req->id_doc);
		$user = User::find($req->id_user);
		$doc->notice_acceptance = 1;
		$doc->save();
		$data = [
			'name'     => Auth::user()->name,
			'id_doc'   => $doc->id,
			'name_doc' => $doc->name_doc

		];

		try {
			Mail::send('approval_doc.email_acceptance_doc', $data, function ($message) use ($user, $doc) {
				$message->from(ENV('MAIL_USERNAME'), 'Thành lập hội đồng nghiệm thu tài liệu biên soạn');
				$message->to($user->email, 'Tài liệu:' . $doc->name_doc);
				$message->subject('Tài liệu:' . $doc->name_doc);
			});
		} catch (\Exception $e) { // Using a generic exception
			Session::flash('error_message', 'Gửi mail không thành công!');
			return redirect()->back();
		}



		return redirect()->back();
	}
	public function getAcceptAcceptanceDocumentApproval($id)
	{
		$id_user = Auth::user()->id;
		$i = 1;
		$doc          = Documents::find($id);
		$evalute_doc  = EvaluteDoc::where('id_user_evalute', $id_user)->where('id_doc', $id)->first();
		$list_evalute = EvaluteDoc::where('id_doc', $id)->get();
		$list_greed   = json_decode($doc->registerdoc->greed_council);
		if ($doc->registerdoc->id_user_approval == $id_user) {

			if ($doc != null) {
				$id_user  = $doc->users_id;
				$users 	  = User::all();
				$profile  = ScientificProfile::where('users_id', $id_user)->first();
				$degree   = json_decode($profile->degree);
				$members  = json_decode($doc->members);
				$day 	  = json_decode($doc->registerdoc->time_process);
				$study 	  = StudyDocument::find($doc->registerdoc->study_document_id);
				$councils = json_decode($doc->registerdoc->council);
				$position = [];
				if (isset($councils)) {
					foreach ($councils as $key => $cou) {
						// dd($cou);

						$position[] = $key;
					}
				}
				$flag = 0;
				$outside_council = OutsideEvalute::where('id_doc', $doc->id)->first();

				if (isset($outside_council) && $outside_council->status == 0) {
					$flag = 1;
				}
				if (count($list_evalute) < 4) {
					$flag = 1;
				}
				foreach ($list_evalute as $li) {
					if ($li->status == 0) {
						$flag = 1;
					}
				}
				// dd($flag);
				return view('approval_doc.register_accept_doc', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'users', 'evalute_doc', 'list_evalute', 'flag', 'position', 'councils', 'outside_council', 'list_greed', 'i'));
			} else {
				abort(404, 'Trang không tồn tại');
			}
		} else {
			return redirect()->route('loginapprovaldoc');
		}
	}
	public function postListCouncilAcceptanceDocumentApproval(Request $req, $id)
	{
		// dd($req->all());greed_council
		$greed_council  			 = $req->council;
		$doc 						 = Documents::find($id);
		$register_doc   			 = Register_Documents::find($doc->register_id);
		$register_doc->greed_council = json_encode($greed_council);
		$register_doc->save();
		return redirect()->back();
	}
	public function getCouncilAcceptanceDocumentApproval(Request $req)
	{

		// dd($req->all());
		$doc 					= Documents::find($req->id_doc);
		$user 					= User::find($req->id_user);
		$doc->notice_acceptance = 1;
		$doc->save();
		$data = [
			'name' 	 	=> Auth::user()->name,
			'id_doc' 	=> $doc->id,
			'mess' 		=> $req->message,
			'name_doc' 	=> $doc->name_doc

		];

		try {
			Mail::send('approval_doc.email_acceptance_doc', $data, function ($message) use ($user, $doc) {
				$message->from(ENV('MAIL_USERNAME'), 'Thành lập hội đồng nghiệm thu tài liệu biên soạn');
				$message->to($user->email, 'Tài liệu:' . $doc->name_doc);
				$message->subject('Tài liệu:' . $doc->name_doc);
			});
		} catch (\Exception $e) { // Using a generic exception
			Session::flash('error_message', 'Gửi mail không thành công!');
			return redirect()->back();
		}

		Session::flash('flash_message', 'Gửi mail thành công!');

		return redirect()->back();
		// dd($req->all());
		// $doc = Documents::find($req->id_doc);
		// $registerdoc = Register_Documents::find($doc->register_id);
		// $registerdoc->greed_council = json_encode($req->council);
		// $registerdoc->save();
		// return redirect()->back();
	}



	public function postAcceptLiquidationDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc 		 = Documents::find($req->id_doc);
		$doc->status = 5;
		$doc->save();
		noticeMailDoc($doc->id, 'Tài liệu biên soạn đã được cho phép thanh lý !!!');
		return redirect()->back();
	}
	public function  NoticeLateDocApproval($id)
	{
		$doc 			  = Documents::find($id);
		$doc->notice_late = 1;
		$doc->save();
		return redirect()->back();
	}
	public function  acceptExtensionDocApproval($id)
	{
		$doc 			  = Documents::find($id);
		$doc->notice_late = 2;
		$doc->save();
		return redirect()->back();
	}
	public function postLiquidationDocumentApproval(Request $req)
	{
		// dd($req->all());
		$doc 		 = Documents::find($req->id_doc);
		$doc->status = 6;
		$doc->save();
		noticeMailDoc($doc->id, 'Tài liệu biên soạn đã hoàn thành !!!');
		return redirect()->back();
	}
}
