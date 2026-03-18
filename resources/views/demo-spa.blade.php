@verbatim
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>易居空間 YIHOUSE - 粉紅超跑庇佑精神 SPA Demo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700;900&family=Playfair+Display:wght@600;700&family=Barlow:wght@400;600;800&family=Cormorant+Garamond:wght@500;700&display=swap" rel="stylesheet">
  <style>
    :root { --bg:#f7f7f3; --surface:#fff; --text:#252525; --muted:#616161; --line:#e6e3dd; --brand:#d65f8f; --radius:18px; }
    * { box-sizing:border-box; }
    body { margin:0; font-family:"Noto Sans TC",sans-serif; color:var(--text); background:radial-gradient(circle at 92% -8%, #ffd9e8 0%, rgba(255,217,232,0) 40%),radial-gradient(circle at -10% 108%, #f7ecd6 0%, rgba(247,236,214,0) 33%),var(--bg); }
    .app { max-width:1180px; margin:0 auto; padding:18px 16px 40px; }
    .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; gap:8px; }
    .brand { font-weight:900; }
    .hero { border-radius:24px; color:#fff; background:linear-gradient(120deg,#b84473 0%,#de739f 45%,#2f6e73 100%); padding:24px; }
    .hero h1 { margin:0; font-size:clamp(1.7rem,4.2vw,2.8rem); }
    .hero p { margin:10px 0 0; line-height:1.8; }
    .switch { margin-top:14px; display:flex; gap:8px; flex-wrap:wrap; }
    .switch button { border-radius:999px; border:1px solid rgba(255,255,255,.45); background:rgba(255,255,255,.18); color:#fff; padding:8px 12px; font-weight:800; cursor:pointer; }
    .switch button.active { background:#fff; color:#8b3343; border-color:#fff; }
    .layout { margin-top:16px; display:grid; grid-template-columns:260px 1fr; gap:14px; }
    .side { background:#fff; border:1px solid var(--line); border-radius:var(--radius); padding:12px; height:fit-content; }
    .menu { list-style:none; margin:0; padding:0; display:grid; gap:8px; }
    .menu button { width:100%; border:1px solid var(--line); background:#fff; border-radius:12px; padding:10px; text-align:left; font-weight:700; cursor:pointer; }
    .menu button.active { background:var(--brand); border-color:var(--brand); color:#fff; }
    .section { display:none; background:#fff; border:1px solid var(--line); border-radius:var(--radius); padding:16px; }
    .section.active { display:block; }
    .lead { color:var(--muted); line-height:1.8; }
    .photo-grid { display:grid; gap:12px; grid-template-columns:repeat(2,minmax(0,1fr)); }
    .photo-card { border:1px solid var(--line); border-radius:12px; overflow:hidden; }
    .photo-card img { width:100%; height:190px; object-fit:cover; display:block; }
    .photo-meta { padding:10px; }
    .photo-meta p { margin:0; color:var(--muted); line-height:1.7; font-size:14px; }
    .spot-list { line-height:1.9; }
    @media (max-width:980px){ .layout{grid-template-columns:1fr;} }
    @media (max-width:760px){ .photo-grid{grid-template-columns:1fr;} }
  </style>
</head>
<body>
  <main class="app">
    <div class="topbar"><div class="brand">易居空間 YIHOUSE · Laravel 版 SPA Demo</div><a href="/" style="text-decoration:none;border:1px solid var(--line);padding:8px 12px;border-radius:999px;color:#444;">回首頁</a></div>
    <section class="hero">
      <h1>YiHouse Blessing Journey SPA</h1>
      <p>整合「粉紅超跑庇佑精神」、「詩詞美學」與「科技實作」的單頁 Demo，供 9000 開發網址直接展示。</p>
      <div class="switch">
        <button class="active">Taiwan Chic</button><button>Forest Calm</button><button>Block Mono</button>
      </div>
    </section>
    <div class="layout">
      <aside class="side">
        <ul class="menu">
          <li><button class="active">品牌理念 (結緣摘要)</button></li>
          <li><button>五大詩詞切字美學</button></li>
          <li><button>AI 智慧物聯 + Laravel 架構</button></li>
          <li><button>Google 週邊 10 大景點</button></li>
        </ul>
      </aside>
      <section>
        <article class="section active">
          <h3>品牌理念 (結緣摘要)</h3>
          <p class="lead">「易居」與「白沙屯粉紅超跑」精神連結是品牌靈魂：順應、庇佑、哪裡需要就往哪裡去。</p>
          <div class="photo-grid">
            <article class="photo-card"><img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1400&q=80" alt="官網首頁風格照片"><div class="photo-meta"><p>官網首頁風格照（實際圖片地址）</p></div></article>
            <article class="photo-card"><img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=1400&q=80" alt="品牌理念照片"><div class="photo-meta"><p>粉紅超跑庇佑精神</p></div></article>
          </div>
        </article>
        <article class="section active" style="margin-top:12px;">
          <h3>Google 週邊 10 大熱門景點（苗栗海線提案）</h3>
          <ol class="spot-list">
            <li><a href="https://maps.google.com/?q=白沙屯拱天宮" target="_blank" rel="noopener">白沙屯拱天宮</a></li>
            <li><a href="https://maps.google.com/?q=通霄神社" target="_blank" rel="noopener">通霄神社</a></li>
            <li><a href="https://maps.google.com/?q=好望角苗栗" target="_blank" rel="noopener">苗栗好望角</a></li>
            <li><a href="https://maps.google.com/?q=台鹽通霄精鹽廠觀光園區" target="_blank" rel="noopener">台鹽通霄觀光園區</a></li>
            <li><a href="https://maps.google.com/?q=飛牛牧場" target="_blank" rel="noopener">飛牛牧場</a></li>
            <li><a href="https://maps.google.com/?q=苑裡老街" target="_blank" rel="noopener">苑裡老街</a></li>
            <li><a href="https://maps.google.com/?q=龍騰斷橋" target="_blank" rel="noopener">龍騰斷橋</a></li>
            <li><a href="https://maps.google.com/?q=勝興車站" target="_blank" rel="noopener">勝興車站</a></li>
            <li><a href="https://maps.google.com/?q=三義木雕博物館" target="_blank" rel="noopener">三義木雕博物館</a></li>
            <li><a href="https://maps.google.com/?q=鯉魚潭水庫苗栗" target="_blank" rel="noopener">鯉魚潭水庫</a></li>
          </ol>
        </article>
      </section>
    </div>
  </main>
</body>
</html>
@endverbatim
