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
use App\OutsideCouncil;
use Auth;
use Mail;
use Session;

class DocumentController extends Controller
{

	public function getLoginDoc()
	{
		if (session::has('backUrls') && Session::get('backUrls') != route('logindoc')) {
		} else {
			Session::put('backUrls', url()->previous());
		}
		return view('document.login_doc');
	}
	public function postLoginDoc(Request $req)
	{

		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			if (session::has('backUrls') && Session::get('backUrls') != route('logindoc')) {
				//dd(Session::get('backUrls'));
				return redirect("http://localhost:8080/research/public/danh-gia-tai-lieu/7");
			} else {

				return redirect()->intended();
			}
		} else {
			return redirect()->route('logindoc')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutDoc()
	{
		Auth::logout();
		return redirect()->route('logindoc');
	}

	public function getDiscussDocumentApproval($id)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::find($id);

		if ($doc != null && ($doc->status == 1 || $doc->status == 2)) {
			$discuss_doc = 	DiscussDocument::where('id_doc', $doc->id)
				->where('id_user_discuss', $id_user)
				->first();
			// dd($discuss_doc);
			$id_user_doc = $doc->users_id;
			// $users = User::all();
			$profile = ScientificProfile::where('users_id', $id_user_doc)
										->first();
			$degree  = json_decode($profile->degree);
			$members = json_decode($doc->members);
			$day 	 = json_decode($doc->registerdoc->time_process);
			$study 	 = StudyDocument::find($doc->registerdoc->study_document_id);
			return view('document.discuss_doc', compact('doc', 'profile', 'degree', 'members', 'day', 'study', 'discuss_doc'));
		} else {
			abort(404, 'Trang không tồn tại');
		}

	}
	public function postDiscussDocumentApproval(Request $req, $id)
	{
		$discuss_doc 						= DiscussDocument::find($req->id_discuss_doc);
		$discuss_doc_content 				= $req->discuss_doc_content;
		$discuss_doc->discuss_doc_content 	= $discuss_doc_content;
		$discuss_doc->status 				= 1;
		$discuss_doc->save();
		return redirect()->back();
	}
	public function getFormDiscussDocumentApproval($id)
	{
		$id_user = Auth::user()->id;
		$doc = Documents::find($id);
		if ($doc != null) {
			$discuss_doc = 	DiscussDocument::where('id_doc', $doc->id)
											->where('id_user_discuss', $id_user)
											->first();
			$id_user_doc = $doc->users_id;
			$profile 	= ScientificProfile::where('users_id', $id_user_doc)
											->first();
			$degree 	= json_decode($profile->degree);
			$members 	= json_decode($doc->members);
			$day 		= json_decode($doc->registerdoc->time_process);
			$study 		= StudyDocument::find($doc->registerdoc->study_document_id);
			return view('document.discuss_doc_review', compact('doc', 'discuss_doc', 'profile', 'degree', 'members', 'day', 'study'));
		} else {
			abort(404, 'Trang không tồn tại');
		}
	}
}
