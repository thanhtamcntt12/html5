//////////////////////////////スマホ/タブレット判別
var _ua = (function(u){
  return {
    Tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1)
      || u.indexOf("ipad") != -1
      || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
      || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
      || u.indexOf("kindle") != -1
      || u.indexOf("silk") != -1
      || u.indexOf("playbook") != -1,
    Mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
      || u.indexOf("iphone") != -1
      || u.indexOf("ipod") != -1
      || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
      || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
      || u.indexOf("blackberry") != -1
  }
})(window.navigator.userAgent.toLowerCase());
//if(_ua.Mobile){};

var osVer;
osVer = "Android";

//if (navigator.userAgent.indexOf(osVer)>0){
//} 

var breakNum=767;
var breakNum2=752;
//////////////////////////////////////init
$(function() {
	//setCarousel01();
	setScroll();
	startScroll();
	//setPageTop();
	svg4everybody();
	setHeadFixed();
	setSpToggle();
	fileUploader();
	setTopLogoLink();
	//setAcc_01();
	//setInstagram_01();
	//setInstagram_02();
	if(!$('#wrapper').hasClass('home')){
	}
	/////////////
	if(_ua.Tablet || _ua.Mobile){
	}else{
	}
	/////////////
	if(!_ua.Mobile){
	}else{
	}
});

//$(window).on('load', function () {
//	//heightLineGroup();
//	//spNav();
//	//setCarousel02();
//	if(!$('#wrapper').hasClass('home')){
//	}
//	if(!_ua.Mobile){
//	//setLoadEff();
//	}else{
//	}
//});

////////////////////////////////ヘッダ制御
function setHeadFixed() {
	var timer = false;
	fixedHeader();

	$(window).scroll(function () {
		fixedHeader();
	});
	
	function fixedHeader(){
		h =$(".topbar").height();
		baseHeight=h;
		if($(this).scrollTop() <= baseHeight){
			$(".fixedUI").removeClass("fixedHeader");
			$(".fixedUI").attr("style","");
		}else if ($(this).scrollTop() > baseHeight) {
			$(".fixedUI").addClass("fixedHeader");
			$(".fixedUI").slideDown('fast');
			$(".fixedUI").css('top',h);
		}
	}
 };

////////////////////////////////iPadでのロゴリンクオーバーライド回避
function setTopLogoLink() {
	if(!_ua.Mobile&&!_ua.Tablet){
		$('#topLogo').on("click", function() {
			window.location.href = "./";
		});
	}
};

////////////////////////////////メニュークリック
function setSpToggle() {
	$('.button-menu-mobile').on("click", function() {
		$(this).toggleClass('menuSw');
		$('#wrapper').toggleClass('menuSw');
	});
};

//////////////////////////////////ファイルアップローダー
var fileUploader = function(){
    //ラッパーのdiv
    var target = $('.fileUploder');
     
    //イベント割り当て
    target.each(function(){
        //ダミーのテキストフィールド
        var txt = $(this).find('.txt');
        //ファイルアップロードボタン
        var btn = $(this).find('.btn');
        //input[type=file]の実体
        var uploader = $(this).find('.uploader');
 
        //実体が変更された時
        uploader.bind('change',function(){
            //テキストフィールドに値をいれる
            txt.val($(this).val());
        });
 
        //ボタンのイベントは無効にしておく
        btn.bind('click',function(event){
            //イベントキャンセル
            event.preventDefault();
            //一応モダンじゃないブラウザ用
            return false;
        });
         
        //ホバー処理（上にかぶせているので反応しないため）
        //ここはデザインの都合上いれている処理のため適宜変更を
        //class切り替えでやったほうがいいです。
        $(this).bind('mouseover',function(){
            btn.css('background-position','0 100%');
        });
        $(this).bind('mouseout',function(){
            btn.css('background-position','0 0');
        });
         
    }); 
	$('.fileClear').on("click", function() {
		$(this).parent().find('.uploader').each(function() {
			$(this).val('');
			$(this).prev('.txt').val('');
			fileUploader();
		});
	});
}

///////////////////////////////スムーススクロール
var setMrg = $('header').height()+20;
function setScroll(){
   // #で始まるアンカーをクリックした場合に処理
   $('.unq').click(function() {
//	   if($('header').hasClass('fixedHeader')){
//		   setMrg = $('header').height();
//	   }else{
//		   setMrg = $('header').height();
//		   //setMrg = navH;
//	   }
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href").replace('./','');
	  
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
	if(!_ua.Mobile){
     var position = target.offset().top;
	}else{
     var position = target.offset().top;
	}
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });

//   $('a[href^="./menu.html#"]').click(function() {
//      // スクロールの速度
//      var speed = 400; // ミリ秒
//      // アンカーの値取得
//      var href= $(this).attr("href").replace('./menu.html','');
//      // 移動先を取得
//      var target = $(href == "#" || href == "" ? 'html' : href);
//      // 移動先を数値で取得
//	if(!_ua.Mobile){
//     var position = target.offset().top-setMrg;
//	}else{
//     var position = target.offset().top-setMrg;
//	}
//      // スムーススクロール
//      $('body,html').animate({scrollTop:position}, speed, 'swing');
//      return false;
//   });
 }
 
 function startScroll(){
	   if($('header').hasClass('fixedHeader')){
		   setMrg = $('header').height();
	   }else{
		   setMrg = $('header').height();
		   //setMrg = navH;
	   }
	var timer = false;
	if (timer !== false) {
		clearTimeout(timer);
	}
	timer = setTimeout(function() {
	var hashID=  $(location).attr('hash');
	if(hashID){
	  var speed = 400; // ミリ秒
		var href= hashID;
		var target = $(href == "#" || href == "" ? 'html' : href);
		 var position = target.offset().top-setMrg;
		$('body,html').animate({scrollTop:position}, speed, 'swing');
	}
	}, 1000);
}

////////////////////スクロールストップイベント生成
$(function(){
  var scrollStopEvent = new $.Event("scrollstop");
  var delay = 200;
  var timer;
 
  function scrollStopEventTrigger(){
    if (timer) {
      clearTimeout(timer);
    }
    timer = setTimeout(function(){$(window).trigger(scrollStopEvent)}, delay);
  }
  $(window).on("scroll", scrollStopEventTrigger);
  $("body").on("touchmove", scrollStopEventTrigger);
});

//////////////////////////////////////投稿ブランクリンクアイコン
function setBlankIcon(){
	$(".tblDl_01 a").each(function() {
		if($(this).attr("target")=="_blank"){
			$(this).addClass("ex");
		};
	});
};

//////////////////////////////////////ランドスケープ判定
var isLandscape = function(){
	if (window.innerHeight > window.innerWidth) {
		$("body").addClass("portrait");
		$("body").removeClass("landscape");
	}else{
		$("body").addClass("landscape");
		$("body").removeClass("portrait");
	}
}
	
if(_ua.Mobile){
	$(window).resize(function(){
		isLandscape();
	});
	isLandscape();
}

///////////////////リサイズアクション
function setResizeAction(){
	var timer = false;
	$(window).on('resize', function(){
		if (timer !== false) {
			clearTimeout(timer);
		}
		timer = setTimeout(function() {
		}, 200);
	});
};
