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
use App\EvaluteDoc;
use App\OutsideEvalute;
use Auth;
use Mail;
use Session;

class EvaluateDocController extends Controller
{
	public function getLoginEvalute()
	{
		if (session::has('backUrle') && Session::get('backUrle') != route('loginevalute')) {
		} else {
			Session::put('backUrle', url()->previous());
		}
		return view('evalute_doc.loginevalute');
	}
	public function postLoginEvalute(Request $req)
	{

		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			if (session::has('backUrle') && Session::get('backUrle') != route('loginevalute')) {

				return redirect(Session::get('backUrle'));
			} else {

				return redirect()->intended();
			}
		} else {
			return redirect()->route('loginevalute')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutEvalute()
	{
		Auth::logout();
		return redirect()->route('loginevalute');
	}

	public function getEvaluteDocumentApproval($id)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::find($id);

		if ($doc != null && ($doc->status == 1 || $doc->status == 2)) {
			$evalute_doc = 	EvaluteDoc::where('id_doc', $doc->id)
				->where('id_user_evalute', $id_user)
				->first();
			// dd($discuss_doc);
			$id_user_doc = $doc->users_id;
			// $users = User::all();
			$profile = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day = json_decode($doc->registerdoc->time_process);
			$study = StudyDocument::find($doc->registerdoc->study_document_id);
			return view('evalute_doc.evalute_document', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'evalute_doc'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postEvaluteDocumentApproval(Request $req, $id)
	{
		// dd($req->all());
		$email = Auth::user()->email;
		$doc = Documents::find($id);
		$councils = json_decode($doc->registerdoc->council);
		$position = '';
		if (isset($councils)) {
			foreach ($councils as $key => $co) {
				if ($email == $co) {
					$position = $key;
				}
			}
		}





		$total = 0;
		$curriculum_structure = $req->curriculum_structure;
		$suitability = $req->suitability;
		$urgency = $req->urgency;
		$duplication = $req->duplication;
		$opinion = $req->opinion;
		$total = $curriculum_structure + $suitability + $urgency + $duplication;
		if ($total >= 80) {
			$classification = 1;
			$conclude = 1;
		} elseif ($total >= 70) {
			$classification = 2;
			$conclude = 2;
		} elseif ($total >= 50) {
			$classification = 3;
			$conclude = 2;
		}
		$evalute_doc = EvaluteDoc::find($req->id_evalute_doc);
		$evalute_doc->curriculum_structure = $curriculum_structure;
		$evalute_doc->suitability = $suitability;
		$evalute_doc->urgency = $urgency;
		$evalute_doc->duplication = $duplication;
		$evalute_doc->opinion = $opinion;
		$evalute_doc->conclude = $conclude;
		$evalute_doc->total = $total;
		$evalute_doc->position_council = $position;
		$evalute_doc->classification = $classification;
		$evalute_doc->status = 1;
		$evalute_doc->save();
		return redirect()->back();
	}

	public function getFormEvaluteDocumentApproval($id, $id_eval)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::find($id);
		if ($doc != null) {
			$evalute_doc = 	EvaluteDoc::find($id_eval);
			$id_user_doc = $doc->users_id;
			$profile = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day = json_decode($doc->registerdoc->time_process);
			$study = StudyDocument::find($doc->registerdoc->study_document_id);
			$councils = json_decode($doc->registerdoc->council);
			// dd($councils);
			$position = '';
			foreach ($councils as $key => $cou) {
				// dd($cou);
				if ($cou == Auth::user()->email) {
					$position = $key;
				}
			}
			// dd($position);
			return view('evalute_doc.evalute_doc_review', compact('doc', 'evalute_doc', 'profile', 'degree', 'members', 'day', 'study', 'position'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function getOutsideEvaluteDocumentApproval($id)
	{
		$outside = OutsideEvalute::find($id);
		$doc = Documents::find($outside->id_doc);
		if ($doc != null && ($doc->status == 1 || $doc->status == 2)) {

			// dd($discuss_doc);
			$id_user_doc = $doc->users_id;
			// $users = User::all();
			$profile = ScientificProfile::where('users_id', $id_user_doc)
				->first();
			$degree = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day = json_decode($doc->registerdoc->time_process);
			$study = StudyDocument::find($doc->registerdoc->study_document_id);
			return view('evalute_doc.outside_evalute_document', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'outside'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
	public function postOutsideEvaluteDocumentApproval(Request $req, $id)
	{
		// dd($req->all());
		$total = 0;
		$curriculum_structure = $req->curriculum_structure;
		$suitability = $req->suitability;
		$urgency = $req->urgency;
		$duplication = $req->duplication;
		$opinion = $req->opinion;
		$total = $curriculum_structure + $suitability + $urgency + $duplication;
		if ($total >= 80) {
			$classification = 1;
			$conclude = 1;
		} elseif ($total >= 70) {
			$classification = 2;
			$conclude = 2;
		} elseif ($total >= 50) {
			$classification = 3;
			$conclude = 2;
		}
		$evalute_outside = OutsideEvalute::find($id);
		$evalute_outside->curriculum_structure = $curriculum_structure;
		$evalute_outside->suitability = $suitability;
		$evalute_outside->urgency = $urgency;
		$evalute_outside->duplication = $duplication;
		$evalute_outside->opinion = $opinion;
		$evalute_outside->conclude = $conclude;
		$evalute_outside->total = $total;
		$evalute_outside->classification = $classification;
		$evalute_outside->status = 1;
		$evalute_outside->save();
		return redirect()->back();
	}
	public function getOutsideFormEvaluteDocumentApproval($id)
	{

		$evalute_outside = OutsideEvalute::find($id);
		$doc 			 = Documents::find($evalute_outside->id_doc);
		if ($doc != null) {
			$id_user_doc = $doc->users_id;
			$profile 	 = ScientificProfile::where('users_id', $id_user_doc)
											->first();
			$degree 	 = json_decode($profile->degree);
			$members 	 = json_decode($doc->members);
			$day 		 = json_decode($doc->registerdoc->time_process);
			$study 		 = StudyDocument::find($doc->registerdoc->study_document_id);
			$councils 	 = json_decode($doc->registerdoc->council);
			return view('evalute_doc.outside_evalute_doc_review', compact('doc', 'evalute_outside', 'profile', 'degree', 'members', 'day', 'study'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
}
