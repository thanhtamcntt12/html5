<?php
if (!function_exists('getUserInfo')) {
    function getUserInfo($that, $user_id)
    {
        //お知らせ取得
        /*$response = $that->api_request(
            'GET',
            'users/' . $user_id
        );*/

        $response = (object) array();
        $response->items = array();
        $response->items['customer_id'] = 1;
        $response->items['profile_pic1'] = 'プロフィール写真';
        $response->items['user_type'] = 'ユーザータイプ';
        $response->items['member_type'] = 1;
        $response->items['member_status'] = 1;
        $response->items['started_date'] = '2015-01-01';
        $response->items['branch_id'] = 1;
        $response->items['name1'] = '名前（姓）';
        $response->items['name2'] = '名前（名）';
        $response->items['name_kana1'] = 'フリガナ（セイ）';
        $response->items['name_kana2'] = 'フリガナ（メイ）';
        $response->items['login_id'] = 1;
        $response->items['login_pw'] = 'gs42g25sg5';
        $response->items['gender_type'] = 1;
        $response->items['birthday'] = '2000-01-01';
        $response->items['email'] = 'XXXXXX@email.com';
        $response->items['zip'] = '111-1111';
        $response->items['pref_id'] = 13;
        $response->items['address1'] = '住所１';
        $response->items['address2'] = '住所２';
        $response->items['tel'] = '000-000-0000';
        $response->items['mobile_phone'] = '000-0000-0000';
        $response->items['mobile_email'] = 'mobile@email.com';
        $response->items['job_company'] = 'XXXXXXX';
        $response->items['job_id'] = 1;
        $response->items['job_zip'] = '000';
        $response->items['job_address1'] = '住所１';
        $response->items['job_address2'] = '住所２';
        $response->items['job_tel'] = 'XX-XXXX-XXXX';
        $response->items['guardian_name'] = '保護者氏名';
        $response->items['emergency_tel'] = 'XXX-XXXX-XXXX';
        $response->items['emergency_name'] = '緊急連絡先名';
        $response->items['dm_type'] = 1;
        $response->items['regist_date'] = '2010-01-01';
        $response->items['member_code_apply_date'] = '2010-02-01';
        $response->items['hobby'] = '趣味';
        $response->items['magazine'] = 'よく読む雑誌';
        $response->items['publish'] = 1;
        $response->items['note'] = 'メモ';
        $response->items['reserve_limit_flag'] = 1;
        $response->items['objective_public_flag'] = 1;
        $response->items['assesment_public_flag'] = 1;
        $response->items['remarks'] = '備考欄';
        $response->items['profile_img_file1'] = '全身写真１';
        $response->items['profile_img_file2'] = '全身写真２';
        $response->items['bloodtype'] = 1;
        $response->items['plusorminus'] = 1;
        $response->items['nationality'] = 1;
        $response->items['height'] = 180;
        $response->items['weight'] = 60;
        $response->items['father_height'] = 170;
        $response->items['mother_height'] = 160;
        $response->items['dominant_hand'] = 1;
        $response->items['dominant_foot'] = 1;
        $response->items['birth_place'] = 1;
        $response->items['relationship'] = '父';
        $response->items['profile_pic'] = '画像';
        $response->items['started_age'] = 10;
        $response->items['current_school'] = 1;
        $response->items['elementary_school'] = 1;
        $response->items['juniorhigh_school'] = 1;
        $response->items['high_school'] = 1;
        $response->items['university'] = 1;
        $response->items['sports_history'] = 1;
        $response->items['created_at'] = '2018-04-01 00:00:00';
        $response->items['updated_at'] = '2018-04-01 00:00:00';
        $response->code = 200;

        if (!$response || $response->code !== 200) {
            //ログイン失敗
            return redirect()->route('admin-home');
        }

        //表示用データ調整
        return $response->items;
    }
}