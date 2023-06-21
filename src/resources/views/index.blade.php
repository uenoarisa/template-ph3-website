<!DOCTYPE html>
<html lang="ja">
<x-head>

</x-head>

<body>
  <x-header>
    
  </x-header>
  <main class="l-main">
    <section class="p-top-hero">
      <div class="p-top-hero__inner">
        <div class="p-top-hero__body">
          <h1 class="p-top-hero__body__title">学生プログラミングコミュニティ POSSE（ポッセ）</h1>
          <span class="p-top-hero__body__catchcopy">自分史上最高<br>を仲間と。</span>
        </div>
        <picture class="p-top-hero__image">
          <img src="{{ asset('img/img-hero.jpg') }}" alt="">
        </picture>
        <div class="p-top-hero__scroll">Scroll Down</div>
      </div>
    </section>
    <!-- /.p-top-hero -->

    <div class="p-top-container">
      <section class="l-section p-top-about">
        <div class="l-container">
          <h2 class="p-heading">
            POSSEとは<span class="p-heading__caption" lang="en" aria-hidden="true">About POSSE</span>
          </h2>
          <div class="p-top-about__body">
            <picture class="p-top-about__image">
              <img src="../../public/img/img-about.jpg" alt="POSSEメンバー集合写真">
            </picture>
            <div class="p-top-about__content">
              <p>
                学生プログラミングコミュニティ「POSSE(ポッセ)」は、人格とプログラミング、二つの面での成長をスローガンに活動しており、大学生だけが集まって学びを深めるコミュニティです。<br>プログラミングだけではありません。オフラインでのイベントや、旅行など様々な企画を行っています！<br>それらを通じて、夏休みの大半をPOSSEで出来た仲間と過ごす人もたくさんいるほどメンバーとの仲が深まります。
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- /.l-section p-top-about -->
    </div>
  </main>

  <div class="p-line">
    <div class="l-container">
      <div class="p-line__body">
        <div class="p-line__body__inner">
          <h2 class="p-heading -light p-line__title"><i class="u-icon__line"></i>POSSE 公式LINE</h2>
          <div class="p-line__content">
            <p>公式LINEにてご質問を随時受け付けております。<br>詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので<br>下記ボタンより友達追加をお願いします！</p>
          </div>
          <div class="p-line__footer">
            <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer"
              class="p-line__button">LINE追加<i class="u-icon__link"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <x-footer>
    'components.footer'
  </x-footer>
  
</body>

</html>
