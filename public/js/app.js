//ハンバーガーメニュー
$(function () {
    $('.js-toggle-sp-menu').on('click', function () {
        $(this).toggleClass('active');
        $('.js-toggle-sp-menu-target').toggleClass('active');
    });
});

//footer固定
$(function(){
    var $ftr = $('.footer');
    if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
        $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
    }
});


//画像アップロード
    //変数
    let $dropArea = $('.area_drop');
    let $fileInput = $('.js-input-file');
    let $text = $('.js-text');

    //dragoverイベントはファイルがターゲット上にドラッグされた時に発火する
    $dropArea.on('dragover',function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).removeClass('register_label-file').addClass('register_label-file-active');
        $(this).css('color','#efefef');
    });

    $dropArea.on('dragleave',function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).removeClass('register_label-file-active').addClass('register_label-file');
        $(this).css('color','#777777');
    });

    $fileInput.on('change',function (e) {
        $dropArea.css('border','none');

        let file = this.files[0],
            $img = $(this).siblings('.prev-img'),
            fileReader = new FileReader();

        fileReader.onload = function (event) {
            //読み込んだ画像データをimgに変換
            $img.attr('src',event.target.result).show();
        };

        fileReader.readAsDataURL(file);
    });

//詳細画面でサムネイル入れ替え

//クリックする箇所　js-click-img
//変更ターゲット js-change-target

$('.js-click-img1').on('click',function () {

    let target = $('.js-change-target');
    target.attr({
        'src':'img/icon-women.png', //要リファクタ
        'alt':'1枚目',
    });
});

$('.js-click-img2').on('click',function () {

    let target = $('.js-change-target');
    target.attr({
        'src':'img/icon_men.png',　//要リファクタ
        'alt':'2枚目',
    });
});

$('.js-click-img3').on('click',function () {

    let target = $('.js-change-target');
    target.attr({
        'src':'img/iconrensyu.png',　//要リファクタ
        'alt':'2枚目',
    });
});


//フラッシュメッセージ
$(function () {
    $('.alert').fadeOut(3000);
});


