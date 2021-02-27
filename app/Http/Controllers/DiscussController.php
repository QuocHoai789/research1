<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscussTopicRequest;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Topic;
use App\TopicM;
use App\DiscussTopic;
use Auth;
use Mail;
use Session;

class DiscussController extends Controller
{
	public function getLoginDiscuss()
	{
		if (session::has('backUrl2') && Session::get('backUrl2') != route('logindiscuss')) {
		} else {
			Session::put('backUrl2', url()->previous());
		}
		return view('discuss.login_discuss');
	}
	public function postLoginDiscuss(Request $req)
	{
		$credentials = array('msgv' => $req->msgv, 'password' => $req->password);
		if (Auth::attempt($credentials)) {
			if (session::has('backUrl2') && Session::get('backUrl2') != route('logindiscuss')) {
				return redirect(Session::get('backUrl2'));
			} else
				return redirect()->intended();
		} else {
			return redirect()->route('logindiscuss')->with(['flag' => 'danger', 'message' => 'Mã giảng viên hoặc mật khẩu chưa đúng']);
		}
	}
	public function getLogoutDiscuss()
	{
		Auth::logout();
		return redirect()->route('logindiscuss');
	}
	public function getDiscussTopic($id)
	{

		$discuss_topic = DiscussTopic::find($id);
		$topic = TopicM::with('user')->find($discuss_topic->id_topic);

		// dd($discuss_topic);
		return view('discuss.discuss_topic', compact('topic', 'discuss_topic'));
	}
	public function postDiscussTopic($id, DiscussTopicRequest $req)
	{

		$all_star = 0;
		$all_star = (int)$req->overview['rate'] + (int)$req->urgency['rate'] + (int)$req->target['rate'] + (int)$req->approach['rate']
			+ (int)$req->content_and_process['rate'] + (int)$req->product_of_topic['rate']
			+ (int)$req->product_outstanding_of_topic['rate1'] + (int)$req->product_outstanding_of_topic['rate2']
			+ (int)$req->effective['rate'] + (int)$req->study_experience_['rate'] + (int)$req->rationality['rate'];
		if ($all_star >= 35) {
			$ability_to_perform = 1;
		} elseif ($all_star >= 25) {
			$ability_to_perform = 2;
		} elseif ($all_star < 25) {
			$ability_to_perform = 3;
		}

		$overview					  = json_encode($req->overview);
		$urgency					  = json_encode($req->urgency);
		$target						  = json_encode($req->target);
		$approach 					  = json_encode($req->approach);
		$content_and_process 		  = json_encode($req->content_and_process);
		$product_of_topic 			  = json_encode($req->product_of_topic);
		$product_outstanding_of_topic = json_encode($req->product_outstanding_of_topic);
		$effective 					  = json_encode($req->effective);
		$study_experience 			  = json_encode($req->study_experience_);
		$rationality 				  = json_encode($req->rationality);
		$another_opinion 			  = $req->another_opinion;
		$conclude 					  = $req->conclude;
		$expense 					  = $req->expense;
		$value_expense 				  = $req->value_expense;

		$discuss 							   = DiscussTopic::find($id);
		$discuss->overview					   = $overview;
		$discuss->urgency					   = $urgency;
		$discuss->target					   = $target;
		$discuss->approach 					   = $approach;
		$discuss->content_and_process 		   = $content_and_process;
		$discuss->product_of_topic 			   = $product_of_topic;
		$discuss->product_outstanding_of_topic = $product_outstanding_of_topic;
		$discuss->effective 		           = $effective;
		$discuss->study_experience 			   = $study_experience;
		$discuss->rationality 		 		   = $rationality;
		$discuss->another_opinion 	 		   = $another_opinion;
		$discuss->conclude 			 		   = $conclude;
		$discuss->ability_to_perform   		   = $ability_to_perform;
		$discuss->expense 			 		   = $expense;
		$discuss->value_expense 	 		   = $value_expense;
		$discuss->status 			 		   = 1;
		$discuss->save();
		return redirect()->back();
	}
	public function getFormDiscussTopic($id)
	{
		$discuss_topic = DiscussTopic::find($id);
		// dd($discuss_topic);
		$topic		   = TopicM::with('user')->find($discuss_topic->id_topic);
		return view('discuss.form_danh_gia_de_tai', compact('discuss_topic', 'topic'));
	}
}
