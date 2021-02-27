<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Topic;
use App\TopicM;
use App\RegisterTopic;
use App\topicuments;
use App\Register_topicuments;
use App\Studytopicument;
use App\ScientificProfile;
use App\DiscussTopic;
use App\Discusstopicument;
use App\OutsideCouncil;
use App\AcceptanceTopic;
use Auth;
use Mail;
use Session;

class ApprovalController extends Controller
{
	public function getLoginApproval()
	{
		if (session::has('backUrl') && Session::get('backUrl') != route('loginapproval')) {
		} else {
			Session::put('backUrl', url()->previous());
		}
		return view('approval.login_approval');
	}
	public function postLoginApproval(Request $req)
	{
		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			if (session::has('backUrl') && Session::get('backUrl') != route('loginapproval')) {
				return redirect(Session::get('backUrl'));
			} else
				return redirect()->intended();
		} else {
			return redirect()->route('loginapproval')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutApproval()
	{
		Auth::logout();

		return redirect()->route('loginapproval');
	}

	public function getRegisterApproval()
	{
		$id_user = Auth::user()->id;
		// $topic = TopicM::find($id);
		$topic_register = TopicM::join('register_topic', 'topic_m.register_id', '=', 'register_topic.id')
			->where('register_topic.id_user_approval', $id_user)
			->where('topic_m.status', 1)
			->orWhere('topic_m.status', 2)
			->get('topic_m.*');
		// $topic = $topic_register[0];
		// dd($topic_register);
		// if($topic->getRegisterTopic->id_user_approval == $id_user){

		// 	if ($topic != null && ($topic->status == 1 || $topic->status == 2)) {
		// $researchType = json_decode($topic->getRegisterTopic->research_type, true);
		return view('approval.register_approval', compact('topic_register'));
		// }else
		// {
		// 	abort(404, 'Page not found');
		// }
		// }
		// else{
		// 	return redirect()->route('loginapproval');
		// }

	}

	public function postAcceptTopicApproval(Request $req)
	{
		// dd($req->message);
		$topic = TopicM::find($req->id_topic);
		$user = User::find($topic->users_id);
		$topic->status = 2;
		$topic->message_user_approval = $req->message;


		$topic->save();
		// dd($topic);

		noticeMail($topic->id, 'Đề tài đã được xét duyệt !!!');
		return redirect()->back();
	}

	public function postCancelTopicApproval(Request $req)
	{
		$topic = TopicM::find($req->id_topic);
		$topic->close = 2;
		$topic->message_user_approval = $req->message;
		$topic->save();
		noticeMail($topic->id, 'Đề tài đã bị hủy !!!');
		return redirect()->back();
	}

	public function getCouncilAcceptanceTopicApproval($id)
	{
		$topic = TopicM::find($id);
		$users = User::all();
		$list_council = json_decode($topic->getRegisterTopic->council);
		$i = 1;
		return view('approval.council_topic', compact('topic', 'users', 'list_council', 'i'));
	}
	public function postListCouncilAcceptanceTopicApproval($id, Request $req)
	{
		// dd($req->all());
		$council = $req->council;
		$topic = TopicM::find($id);
		$topic->notice_acceptance = 2;
		$topic->save();
		$register_topic = RegisterTopic::find($topic->register_id);
		$register_topic->council = json_encode($council);
		$register_topic->save();

		return redirect()->back();
	}
}
