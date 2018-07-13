<?php
$imgAvatar = (empty($user['profile_pic1'])) ? "/assets/images/avater.jpg" : "http://lorempixel.com/400/400";
?>

<section class="profileUnit m-t-20 card-box">
    <div class="sportIcons">
        <ul>
            <li><i class="fa icon-a15_sport-01" aria-hidden="true"></i></li>
            <li><i class="fa icon-a16_sport-02" aria-hidden="true"></i></li>
            <li><i class="fa icon-a17_sport-03" aria-hidden="true"></i></li>
        </ul>
    </div>
    <div class="inner">
        <div class="avaterCol">
            <div><img src="{{ $imgAvatar }}" alt=""></div>
        </div>
        <!-- .avaterCol-->
        <div class="infoCol">
            <div class="ttlUnit">
                <div class="dlWrap_01">
                    <dl>
                        <dt>会員番号</dt>
                        <dd>{{ $user['login_id'] }}</dd>
                    </dl>
                </div>
                <h2>勅使河原 二郎三郎之助</h2>
            </div>
            <!-- .ttlUnit-->
            <div class="contentCol">
                <div class="inner">
                    <div class="leftCol">
                        <div class="dlWrap_01">
                            <dl>
                                @if($user['gender_type'] == \Config::get('constants.gender.MALE'))
                                    <?php
                                    $gender = '男性';
                                    ?>
                                @else
                                    <?php
                                    $gender = '女性';
                                    ?>
                                @endif
                                <dt>性別</dt>
                                <dd><?php echo $gender; ?></dd>
                            </dl>
                            <dl>
                                <dt>生年月日</dt>
                                <dd>{{ date('Y/m/d', strtotime($user['birthday'])) }}</dd>
                            </dl>
                            <dl>
                                <?php
                                $year_birth_date = date('Y', strtotime($user['birthday']));
                                $year_now = date('Y', time());
                                ?>
                                <dt>年齢</dt>
                                <dd>{{ $year_now - $year_birth_date }}歳</dd>
                            </dl>
                        </div>
                    </div>
                    <!-- .contentCol .leftCol-->
                    <div class="rightCol">
                        <div class="dlWrap_01">
                            <dl>
                                <dt>住所</dt>
                                <dd>{{ $user['address1'] }}</dd>
                            </dl>
                            <dl>
                                <dt>メールアドレス</dt>
                                <dd>{{ $user['email'] }}</dd>
                            </dl>
                            <dl>
                                <dt>現在のスポーツ</dt>
                                <dd>{{ $user['sports_history'] }}</dd>
                            </dl>
                            <dl>
                                <dt>現在の所属</dt>
                                <dd>勅使河原東第三高校サッカー部</dd>
                            </dl>
                        </div>
                    </div>
                    <!-- .contentCol .rightCol-->
                </div>
                <!-- .contentCol .inner-->
            </div>
            <!-- .contentCol-->
        </div>
        <!-- .infoCol-->
    </div>
    <!-- .profileUnit .inner-->
    <div class="subCol">
        <div class="inner">
            <div class="dlWrap_01">
                <dl>
                    <dt>所属医療機関</dt>
                    <dd>札幌医科大学付属病院 , 小樽病院</dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- .subCol-->
</section>