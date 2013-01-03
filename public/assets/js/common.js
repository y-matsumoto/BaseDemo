/* ===================================================================

 * スムーススクロール

=================================================================== */
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 400;// ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $($.browser.safari ? 'body' : 'html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});


/* ===================================================================

 * 画像のロールオーバー

=================================================================== */
$.fn.rollover = function() {
   return this.each(function() {
      // 画像名を取得
      var src = $(this).attr('src');
      //すでに画像名に「_on.」が付いていた場合、ロールオーバー処理をしない
      if (src.match('_on.')) return;
      // ロールオーバー用の画像名を取得（_onを付加）
      var src_on = src.replace(/^(.+)(\.[a-z]+)$/, "$1_on$2");
      // 画像のプリロード（先読み込み）
      $('').attr('src', src_on);
      // ロールオーバー処理
      $(this).hover(
         function() { $(this).attr('src', src_on); },
         function() { $(this).attr('src', src); }
      );
   });
};


// 画像をロールオーバーする箇所を指定
$(function() {
   $('.rollover').rollover();
});


