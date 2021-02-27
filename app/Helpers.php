<?php

use Illuminate\Support\Facades\Session;
use App\RegisterTopic;
use App\TopicM;
use App\WorkUnit;
use App\User;
use App\ScientificProfile;
use App\ConfigEnv;
use App\Documents;
use Carbon\Carbon;
use App\ScientificExplanation;
use Illuminate\Support\Facades\Mail;

function getActiveStatus($status, $statusActive)
{
    if ($status > $statusActive) {
        return 'cd-timeline__img--picture';
    } else
    if ($status == $statusActive) {
        return 'cd-timeline__img--location';
    } else
    if ($status < $statusActive) {
        return 'cd-timeline__img--movie';
    }
}
function typeTopic($type_topic)
{

    if ($type_topic == 1) {
        echo 'Cấp bộ';
    }
    if ($type_topic == 2) {
        echo 'Cấp trường';
    }
    if ($type_topic == 3) {
        echo 'Sinh viên';
    }
}
function statusTopic($status, $close, $late = null)
{
    if ($close == 1) {
        echo '<span class="badge-dot badge-danger">Đang chờ hủy</span>';
    } elseif ($close == 2) {
        echo '<span class="badge-dot badge-danger">Đã hủy</span>';
    } else {
        switch ($status) {
            case 1:
                echo '<span class="badge-dot badge-warning">Đang chờ xét duyệt</span>';
                break;
            case 2:
                echo '<span class="badge-dot badge-success">Đã được xét duyệt</span>';
                break;
            case 3:
                echo '<span class="badge-dot badge-info">Thuyết minh</span>';
                break;
            case 4:
                echo '<span class="badge-dot badge-info">Thực hiện đề tài</span>';
                break;
            case 5:
                if (isset($late) && $late == 1) {
                    echo '<span class="badge-dot badge-danger">Đã trễ hạn</span>';
                } else {
                    echo '<span class="badge-dot badge-success"> Báo cáo tiến độ đề tài</span>';
                }
                break;
            case 6:
                echo '<span class="badge-dot badge-warning">Nghiệm thu đề tài</span>';
                break;
            case 7:
                echo '<span class="badge-dot badge-warning">Thanh lý đề tài</span>';
                break;
            case 8:
                echo '<span class="badge-dot badge-success">Hoàn thành đề tài</span>';
                break;
            default:
                if ($status > 8) {
                    echo '<span class="badge-dot badge-success">Hoàn thành đề tài</span>';
                }
                break;
        }
    }
}
function checkedStar($rate, $value)
{
    if ($rate == $value) {
        echo "checked";
    }
}
function setEnvironmentValue($envKey, $envValue)
{
    $envFile = app()->environmentFilePath();
    $str = file_get_contents($envFile);

    $oldValue = env($envKey);

    $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}", $str);

    $fp = fopen($envFile, 'w');
    fwrite($fp, $str);
    fclose($fp);
}
function typeDoc($type)
{
    switch ($type) {
        case 1:
            echo 'Giáo trình';
            break;
        case 2:
            echo 'Bài giảng';
            break;
        case 3:
            echo 'Sách chuyên khảo';
            break;
        case 4:
            echo 'Tài liệu tham khảo';
            break;
    }
}
function statusDoc($status, $close, $late = null)
{
    if ($close == 1) {
        echo '<span class="badge-dot badge-danger">Đang chờ hủy</span>';
    } elseif ($close == 2) {
        echo '<span class="badge-dot badge-danger">Đã hủy</span>';
    } else {
        switch ($status) {
            case 1:
                echo '<span class="badge-dot badge-warning">Đang chờ xét duyệt</span>';
                break;
            case 2:
                echo '<span class="badge-dot badge-info">Đang thực hiện biên soạn</span>';
                break;
            case 3:
                if ($late == 1) {
                    echo '<span class="badge-dot badge-danger">Đã trễ hạn</span>';
                } else {
                    echo '<span class="badge-dot badge-info">Kiểm tra tiến độ</span>';
                }
                break;
            case 4:
                echo '<span class="badge-dot badge-success">Nghiệm thu tài liệu biên soạn</span>';
                break;
            case 5:
                echo '<span class="badge-dot badge-warning">Thanh lý tài liệu biên soạn</span>';
                break;
            case 6:
                echo '<span class="badge-dot badge-success">Hoàn thành biên soạn</span>';
                break;
            default:
                if ($status > 6) {
                    echo '<span class="badge-dot badge-warning">Hoàn thành biên soạn</span>';
                }
                break;
        }
    }
}
function unit($id)
{
    $unit = WorkUnit::find($id);
    echo $unit->unit_name;
}
function position_evalute($value)
{
    if ($value == 'president') {
        echo 'Chủ tịch hội đồng';
    } elseif ($value == 'uv') {
        echo 'Ủy viên';
    } elseif ($value == 'pb1') {
        echo 'Ủy viên, phản biện 1';
    } elseif ($value == 'pb2') {
        echo 'Ủy viên, phản biện 2';
    } elseif ($value == 'tk') {
        echo 'Uỷ viên, Thư ký hội đồng';
    }
}
function name($id)
{
    $user = User::find($id);
    echo $user->name;
}
function getYear($year)
{
    $y = explode("-", $year);
    echo $y['0'];
}
function recognition($value)
{
    $arr = json_decode($value);

    echo '<span class="font-weight-bold">Số: </span>' . $arr->number . '<span class="font-weight-bold p-l-60">  Ngày công nhận: </span>' . $arr->day;
}
function degree($val)
{
    $profile = ScientificProfile::where('users_id', $val)->first();
    $degree = json_decode($profile->degree);
    echo $degree->name;
}
function day_register_doc($day)
{
    $day = json_decode($day);
    echo 'Từ ' . $day->begin . ' đến ' .  $day->finish;
}
function date_time_register($key)
{
    $config = new ConfigEnv();
    return $config->getEnvironmentValue($key);
}
function status_date_time_register($key_start, $key_end)
{
    if (strtotime(date_time_register($key_start)) > strtotime(Carbon::now())) {
        echo '<span class="badge-dot badge-warning">Sắp mở</span>';
    } else if (strtotime(date_time_register($key_start)) <= strtotime(Carbon::now()) && strtotime(date_time_register($key_end)) >= strtotime(Carbon::now())) {
        echo '<span class="badge-dot badge-success">Đang mở</span>';
    } else
if (strtotime(date_time_register($key_end)) <= strtotime(Carbon::now())) {
        echo '<span class="badge-dot badge-info">Đã đóng</span>';
    }
}
function status_date_time_register_system($key_start, $key_end)
{
    if (strtotime(date_time_register($key_start)) <= strtotime(Carbon::now()) && strtotime(date_time_register($key_end)) >= strtotime(Carbon::now())) {
        return true;
    } else
        return false;
}
function classificationTopic($val)
{
    if ($val >= 95) {
        return 1;
    } elseif ($val >= 85 && $val <= 94) {
        return 2;
    } elseif ($val <= 84 && $val >= 70) {
        return 3;
    } elseif ($val <= 69 && $val >= 50) {
        return 4;
    } elseif ($val < 50) {
        return 5;
    }
}
function ratingsTopic($val)
{
    switch ($val) {
        case 1:
            echo ' Xuất sắc';
            break;
        case 2:
            echo 'Tốt';
            break;
        case 3:
            echo 'Khá';
            break;
        case 4:
            echo 'Đạt';
            break;
        case 5:
            echo 'Không đạt';
            break;
    }
}
function managerTopic($id)
{
    $scientific = ScientificExplanation::find($id);
    $topic_manager = json_decode($scientific->topic_manager, true);
    return $topic_manager['name'];
}
function positionTopic($id)
{
    $scientific = ScientificExplanation::find($id);
    $topic_manager = json_decode($scientific->topic_manager, true);
    return $topic_manager['name'];
}
function oganizationTopic($id)
{
    $scientific = ScientificExplanation::find($id);
    $organization = json_decode($scientific->organization, true);
    return $organization['name'];
}
function degreeName($val)
{
    if ($val == 1) {
        echo 'Kỹ sư';
    } elseif ($val == 2) {
        echo 'Thạc sĩ';
    } elseif ($val == 3) {
        echo 'Tiến sĩ';
    }
}
function noticeMail($id, $val)
{
    $topic = TopicM::find($id);
    $mail = $topic->user->email;
    $data = [

        'id_topic'     => $topic->id,
        'mess'         => $val,
        'name_topic'     => $topic->name_topic,
        'slug' => $topic->slug_name_topic,

    ];
    try {
        Mail::send('admin.email_notice_status_topic', $data, function ($message) use ($mail) {
            $message->from(ENV('MAIL_USERNAME'), 'Thông báo tình trạng đề tài nghiên cứu khoa học');
            $message->to($mail, 'Thông báo tình trạng đề tài:');
            $message->subject(' Thông báo tình trạng đề tài:');
        });
    } catch (\Exception $e) {
        Session::flash('error_message', 'Đã có lỗi trong quá trình gửi mail !');
        return redirect()->back();
    }

    Session::flash('flash_message', 'Đã gửi mail thành công !');
}
function noticeMailDoc($id, $val)
{
    $doc = Documents::find($id);
    $mail = $doc->user->email;
    $data = [

        'id_doc'     => $doc->id,
        'mess'         => $val,
        'name_doc'     => $doc->name_doc,
        'slug' => $doc->slug_doc,

    ];
    try {
        Mail::send('admin.email_notice_status_doc', $data, function ($message) use ($mail) {
            $message->from(ENV('MAIL_USERNAME'), 'Thông báo tình trạng tài liệu biên soạn giảng dạy ');
            $message->to($mail, 'Thông báo tình trạng tài liệu:');
            $message->subject(' Thông báo tình trạng tài liệu:');
        });
    } catch (\Exception $e) {
        Session::flash('error_message', 'Đã có lỗi trong quá trình gửi mail  !');
        return redirect()->back();
    }

    Session::flash('flash_message', 'Đã gửi mail thành công !');
}
 function user_notice($id)
{
    $user = User::find($id);
    return $user->name;
}
