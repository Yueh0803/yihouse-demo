@verbatim
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>易居空間 YIHOUSE - 品牌理念・2026 活動主題與智慧架構</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 基礎字體 */
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Noto+Serif+TC:wght@300;400;600&display=swap');

        body {
            font-family: 'Noto Sans TC', sans-serif;
            background-color: #fdfbf7;
            /* 神聖白 */
            color: #333333;
        }

        /* 品牌主題變數 */
        :root {
            --supercar-pink: #e65c7b;
            /* 超跑櫻花粉 */
            --supercar-pink-hover: #d44968;
            --incense-gold: #d4af37;
            /* 香火金 */
            --soft-pink-bg: #fdf2f4;
        }

        /* 房型主題字體設定 (模擬切字效果) */
        .font-cailian {
            font-family: 'DFKai-SB', 'BiauKai', 'Noto Serif TC', serif;
        }

        /* 行楷 */
        .font-qiantang {
            font-family: 'Kaiti TC', 'Kaiti', 'Noto Serif TC', serif;
        }

        /* 楷體 */
        .font-changhen {
            font-family: 'FangSong', 'STFangsong', 'Noto Serif TC', serif;
        }

        /* 仿宋 */
        .font-pipa {
            font-family: 'MingLiU', 'PMingLiU', 'Noto Serif TC', serif;
        }

        /* 明體 */
        .font-guyuan {
            font-family: 'LiSu', 'STXingkai', 'Noto Serif TC', serif;
            font-weight: bold;
        }

        /* 隸書 */

        /* 互動效果 */
        .nav-btn.active {
            background-color: var(--supercar-pink);
            color: white;
            box-shadow: 0 4px 6px rgba(230, 92, 123, 0.2);
            font-weight: 500;
        }

        .nav-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-btn:hover:not(.active) {
            background-color: var(--soft-pink-bg);
            color: var(--supercar-pink);
        }

        .text-matsu-pink {
            color: var(--supercar-pink);
        }

        .border-matsu-pink {
            border-color: var(--supercar-pink);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 智慧控制按鈕開關樣式 */
        .toggle-checkbox:checked {
            right: 0;
            border-color: var(--supercar-pink);
        }

        .toggle-checkbox:checked+.toggle-label {
            background-color: var(--supercar-pink);
        }

        .toggle-checkbox {
            right: 0;
            z-index: 1;
            border-color: #e2e8f0;
            transition: all 0.3s;
        }

        .toggle-label {
            background-color: #cbd5e1;
            transition: all 0.3s;
        }

        pre::-webkit-scrollbar {
            height: 8px;
        }

        pre::-webkit-scrollbar-track {
            background: #1e1e1e;
        }

        pre::-webkit-scrollbar-thumb {
            background: #e65c7b;
            border-radius: 4px;
        }

        .gold-accent-line {
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--incense-gold), transparent);
            width: 100%;
            opacity: 0.6;
        }

        .event-shell {
            background: radial-gradient(circle at 15% 20%, #fff9fa 0%, #fdf2f4 38%, #fff7e8 100%);
            border: 1px solid #f2d7de;
        }

        .event-ribbon {
            background: linear-gradient(120deg, #e65c7b 0%, #d44968 58%, #b53f58 100%);
        }

        .event-glow {
            box-shadow: 0 10px 30px rgba(230, 92, 123, 0.18);
        }

        .event-pill {
            background-color: #fff;
            border: 1px solid #f2d7de;
        }

        .event-pulse {
            animation: eventPulse 2.4s ease-in-out infinite;
        }

        @keyframes eventPulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(230, 92, 123, 0.32);
            }

            70% {
                transform: scale(1.02);
                box-shadow: 0 0 0 14px rgba(230, 92, 123, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(230, 92, 123, 0);
            }
        }
    </style>
</head>

<body class="antialiased flex flex-col min-h-screen">

    <!-- Header / Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-[#fdf2f4]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <span class="text-3xl mr-3 font-serif text-[#d4af37]">印</span>
                    <div>
                        <h1 class="text-xl font-bold text-[#3d3d3d] tracking-widest">易居空間 <span
                                class="text-matsu-pink text-sm font-normal">YIHOUSE</span></h1>
                        <p class="text-xs text-gray-500 tracking-wider">順應自然・詩詞美學・智慧管家</p>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-2">
                    <button onclick="switchTab('overview')" id="btn-overview"
                        class="nav-btn active px-4 py-2 rounded-full text-sm text-matsu-pink">品牌理念</button>
                    <button onclick="switchTab('festival')" id="btn-festival"
                        class="nav-btn px-4 py-2 rounded-full text-sm text-matsu-pink">2026 活動主題</button>
                    <button onclick="switchTab('rooms')" id="btn-rooms"
                        class="nav-btn px-4 py-2 rounded-full text-sm text-matsu-pink">詩詞切字主題房</button>
                    <button onclick="switchTab('smarthome')" id="btn-smarthome"
                        class="nav-btn px-4 py-2 rounded-full text-sm text-matsu-pink">AI 智慧物聯</button>
                    <button onclick="switchTab('code')" id="btn-code"
                        class="nav-btn px-4 py-2 rounded-full text-sm text-matsu-pink">系統核心實作</button>
                </nav>
            </div>
        </div>
        <div class="gold-accent-line"></div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">

        <!-- SECTION 1: Brand Concept (Mazu Spirit & Zen) -->
        <section id="sec-overview" class="fade-in block">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-[#fdf2f4] overflow-hidden relative">

                <!-- Hero Image -->
                <div
                    class="w-full h-64 md:h-96 rounded-xl overflow-hidden mb-8 shadow-inner relative bg-[#fdf2f4] flex items-center justify-center">
                    <img src="http://googleusercontent.com/image_generation_content/0" alt=""
                        class="w-full h-full object-cover">
                    <!-- 若圖片未載入的優雅備用顯示 -->
                    <div class="absolute inset-0 flex items-center justify-center bg-[#fdf2f4] -z-10">
                        <span class="text-[#e65c7b] opacity-50 text-xl font-serif">易居空間 YIHOUSE 數位奉茶亭</span>
                    </div>
                </div>

                <h2 class="text-3xl font-bold text-[#3d3d3d] mb-4 border-b-2 border-matsu-pink inline-block pb-1">
                    品牌核心：順應自然，溫暖庇佑</h2>

                <!-- Core Text provided by User -->
                <div class="bg-[#fdfbf7] p-6 rounded-xl border-l-4 border-[#d4af37] mb-8">
                    <p class="text-gray-700 leading-relaxed text-lg mb-4">
                        這是一個充滿禪意又具有美好寓意的名字！<strong class="text-matsu-pink">「易居」</strong>不僅代表著「容易居住、輕鬆無壓」，「易」字本身也有<strong
                            class="text-[#d4af37]">「變通、順應自然」</strong>的意思。
                    </p>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        這與<strong
                            class="text-matsu-pink">白沙屯媽祖粉紅超跑</strong>「無固定路線、隨機應變、哪裡需要溫暖就往哪裡去」的精神簡直是不謀而合。我們將您的新品牌名稱
                        <strong>「易居空間 YIHOUSE」</strong> 完美融入到這份融合了台灣進香意境與現代極簡美學的互動系統中，並在每一個數位體驗環節，強化了<strong
                            class="text-[#d4af37]">「易（順應、變通）」</strong>與<strong
                            class="text-matsu-pink">「庇佑」</strong>的深刻連結。
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-[#fdf2f4] p-6 rounded-xl border border-pink-100 hover:shadow-md transition-shadow">
                        <div class="text-4xl mb-3 text-center text-matsu-pink">🏮</div>
                        <h3 class="text-lg font-bold text-center mb-2 text-[#3d3d3d]">隨心而易的體驗 (UX)</h3>
                        <p class="text-sm text-gray-600 text-justify">
                            借鏡粉紅超跑「順應所需」的靈活性，前端介面設計將打破僵化流程，提供使用者直覺、順暢且無壓力的探索與訂房動線，體現「易居」的輕鬆感。</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-xl border border-[#e5e0d8] hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="text-4xl mb-3 text-center">✒️</div>
                        <h3 class="text-lg font-bold text-center mb-2 text-[#3d3d3d]">詩詞切字的美學 (UI)</h3>
                        <p class="text-sm text-gray-600 text-justify">
                            汲取白居易與王昌齡的詩詞精華，將「切字」的字體視覺美學（行楷、隸書、仿宋等）融入五大主題房，傳遞深厚的文化溫度。</p>
                    </div>
                    <div class="bg-[#fdfbf7] p-6 rounded-xl border border-[#d4af37] hover:shadow-md transition-shadow">
                        <div class="text-4xl mb-3 text-center">⚙️</div>
                        <h3 class="text-lg font-bold text-center mb-2 text-[#3d3d3d]">隨需應變的管家 (Tech)</h3>
                        <p class="text-sm text-gray-600 text-justify">導入 Apple Home 與 Matter 協定，結合 AI 語意分析。無論是調光或冷氣，AI
                            管家都能如粉紅超跑般「哪裡需要溫暖就往哪裡去」，精準庇佑旅人需求。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 1.5: 2026 Event Theme -->
        <section id="sec-festival" class="fade-in hidden">
            <div class="event-shell rounded-2xl p-8 md:p-10 relative overflow-hidden">
                <div class="absolute -top-20 -right-20 w-52 h-52 rounded-full bg-[#ffdce6] opacity-45"></div>
                <div class="absolute -bottom-24 -left-20 w-64 h-64 rounded-full bg-[#ffeac1] opacity-35"></div>

                <div class="relative z-10">
                    <div class="inline-flex items-center event-ribbon text-white px-5 py-2 rounded-full text-sm tracking-widest mb-4 event-glow">
                        2026 全新企劃 · 粉紅超跑祈福共創季
                    </div>

                    <h2 class="text-3xl md:text-4xl font-bold text-[#3d3d3d] leading-tight mb-4">
                        今年主題：<span class="text-matsu-pink">順路有光，停靠有福</span>
                    </h2>

                    <p class="text-gray-700 leading-relaxed text-lg max-w-4xl mb-8">
                        以白沙屯媽祖「無固定路線、哪裡需要就往哪裡去」的精神，策展 2026 年易居年度活動。
                        我們把每一段旅程化為可被感知的互動：入住是一段巡安，房間是一座停靠站，
                        AI 管家則是即時遞上暖光與平安提醒的隨行轎班。
                    </p>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-2xl border border-pink-100 p-6 shadow-sm">
                            <div class="text-3xl mb-3">🗺️</div>
                            <h3 class="font-bold text-[#3d3d3d] mb-2">主題路線：巡安地圖</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                每日解鎖「順路任務」，像粉紅超跑般依旅人需求彈性推薦行程，從在地早餐到夜間散步點位，形成個人祈福動線。
                            </p>
                        </div>
                        <div class="bg-white rounded-2xl border border-[#efdca7] p-6 shadow-sm">
                            <div class="text-3xl mb-3">🧧</div>
                            <h3 class="font-bold text-[#3d3d3d] mb-2">入住儀式：福籤房卡</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                今年新增「福籤房卡」機制，入住時隨機抽取祝詞與字體意象，對應五大主題房，讓每次開門都像一段專屬起駕。
                            </p>
                        </div>
                        <div class="bg-white rounded-2xl border border-[#e9d6f0] p-6 shadow-sm">
                            <div class="text-3xl mb-3">🌙</div>
                            <h3 class="font-bold text-[#3d3d3d] mb-2">夜間體驗：護光模式</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                每晚 21:00 後可啟用「護光模式」，AI 依作息自動微調照明與空調，營造如遶境夜行般穩定安心的節奏。
                            </p>
                        </div>
                    </div>

                    <div class="bg-white/90 backdrop-blur rounded-2xl border border-[#f2d7de] p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                            <h3 class="text-2xl font-bold text-[#3d3d3d]">活動倒數與現場參與</h3>
                            <span class="event-pill text-xs tracking-widest px-3 py-1 rounded-full text-matsu-pink font-bold">限時企劃 2026.05 - 2026.12</span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6" id="countdown-grid">
                            <div class="bg-[#fdf2f4] rounded-xl p-4 text-center border border-pink-100">
                                <div id="cd-days" class="text-3xl font-bold text-matsu-pink">--</div>
                                <div class="text-xs text-gray-500 mt-1">天</div>
                            </div>
                            <div class="bg-[#fdf2f4] rounded-xl p-4 text-center border border-pink-100">
                                <div id="cd-hours" class="text-3xl font-bold text-matsu-pink">--</div>
                                <div class="text-xs text-gray-500 mt-1">時</div>
                            </div>
                            <div class="bg-[#fdf2f4] rounded-xl p-4 text-center border border-pink-100">
                                <div id="cd-mins" class="text-3xl font-bold text-matsu-pink">--</div>
                                <div class="text-xs text-gray-500 mt-1">分</div>
                            </div>
                            <div class="bg-[#fdf2f4] rounded-xl p-4 text-center border border-pink-100">
                                <div id="cd-secs" class="text-3xl font-bold text-matsu-pink">--</div>
                                <div class="text-xs text-gray-500 mt-1">秒</div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-3">
                            <button onclick="joinFestival()"
                                class="event-pulse bg-matsu-pink text-white px-5 py-3 rounded-full text-sm font-bold shadow-md hover:bg-[#d44968] transition">
                                立即加入祈福共創
                            </button>
                            <button onclick="switchTab('smarthome')"
                                class="bg-white text-matsu-pink border border-pink-200 px-5 py-3 rounded-full text-sm font-bold hover:bg-[#fdf2f4] transition">
                                先體驗 AI 護光模式
                            </button>
                            <button onclick="switchTab('rooms')"
                                class="bg-white text-[#8b6b32] border border-[#efdca7] px-5 py-3 rounded-full text-sm font-bold hover:bg-[#fff8e8] transition">
                                直達主題房巡禮
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: Rooms (Poetry & Typography) -->
        <section id="sec-rooms" class="fade-in hidden">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-[#3d3d3d] mb-4">一字一世界，一室一長歌</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    我們將原稿中的詩詞（如：菱葉、荷花、早鶯、春泥）進行「切字」意象提取。從行楷的靈動到仿宋的清冷，賦予五間房專屬的字體個性與色彩調性。
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Room 1: 採蓮曲 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-[#cce3d8] hover:shadow-xl transition flex flex-col shadow-sm">
                    <div class="h-32 bg-[#e0f0e9] flex items-center justify-center relative overflow-hidden">
                        <div class="absolute text-[8rem] text-[#b3d4c4] opacity-30 font-cailian -right-4 -bottom-8">荷
                        </div>
                        <h3 class="text-3xl font-cailian text-[#2c523f] z-10 tracking-widest">採蓮曲</h3>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm text-[#4a7c59] mb-4 font-cailian italic border-l-2 border-[#4a7c59] pl-2">
                            「菱葉縈波荷颭風，荷花深處小船通。」</p>
                        <ul class="text-sm text-gray-700 space-y-2 mb-4 flex-grow">
                            <li><strong>切字意象：</strong> 取原稿之「菱、荷、笑」。</li>
                            <li><strong>字體主軸：</strong> <span class="font-cailian text-[#2c523f] font-bold">行楷體</span>
                                (靈動、如水波蕩漾)</li>
                            <li><strong>空間美學：</strong> 以「碧玉青」與「荷花粉」為主色調。圓弧線條與水波紋玻璃，營造如乘小船入藕花深處的「易居」輕盈感。</li>
                        </ul>
                        <button
                            class="w-full bg-[#4a7c59] text-white py-2 rounded-full text-sm hover:bg-[#3a6346] transition font-bold">預訂此房</button>
                    </div>
                </div>

                <!-- Room 2: 錢塘湖春行 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-[#e8dcc4] hover:shadow-xl transition flex flex-col shadow-sm">
                    <div class="h-32 bg-[#f5ebd9] flex items-center justify-center relative overflow-hidden">
                        <div class="absolute text-[8rem] text-[#dfcfae] opacity-40 font-qiantang -left-4 -bottom-8">鶯
                        </div>
                        <h3 class="text-3xl font-qiantang text-[#8b6b32] z-10 tracking-widest">錢塘湖春行</h3>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm text-[#8b6b32] mb-4 font-qiantang italic border-l-2 border-[#8b6b32] pl-2">
                            「幾處早鶯爭暖樹，誰家新燕啄春泥。」</p>
                        <ul class="text-sm text-gray-700 space-y-2 mb-4 flex-grow">
                            <li><strong>切字意象：</strong> 取原稿之「春、鶯、泥」。</li>
                            <li><strong>字體主軸：</strong> <span class="font-qiantang text-[#8b6b32] font-bold">楷體</span>
                                (端莊、生機盎然)</li>
                            <li><strong>空間美學：</strong> 導入大面積落地窗引入自然光，搭配實木與藤編材質，充滿初春甦醒的溫暖生命力，順應自然法則。</li>
                        </ul>
                        <button
                            class="w-full bg-[#8b6b32] text-white py-2 rounded-full text-sm hover:bg-[#6e5426] transition font-bold">預訂此房</button>
                    </div>
                </div>

                <!-- Room 3: 長恨歌 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-[#e6ccce] hover:shadow-xl transition flex flex-col shadow-sm">
                    <div class="h-32 bg-[#f0e1e3] flex items-center justify-center relative overflow-hidden">
                        <div class="absolute text-[8rem] text-[#d6b3b7] opacity-40 font-changhen -right-4 -bottom-8">歡
                        </div>
                        <h3 class="text-3xl font-changhen text-[#8b3a43] z-10 tracking-widest">長恨歌</h3>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm text-[#8b3a43] mb-4 font-changhen italic border-l-2 border-[#8b3a43] pl-2">
                            「承歡侍宴無閑暇，春從春遊夜專夜。」</p>
                        <ul class="text-sm text-gray-700 space-y-2 mb-4 flex-grow">
                            <li><strong>切字意象：</strong> 取原稿之「春、歡、苦」。</li>
                            <li><strong>字體主軸：</strong> <span class="font-changhen text-[#8b3a43] font-bold">仿宋體</span>
                                (瘦骨清冷、皇家華麗)</li>
                            <li><strong>空間美學：</strong> 呼應超跑櫻花粉的「胭脂紅」搭配「暗金」。絲絨軟裝與黃銅配件，演繹極致奢華與一絲哀婉的浪漫。</li>
                        </ul>
                        <button
                            class="w-full bg-matsu-pink text-white py-2 rounded-full text-sm hover:bg-[#d44968] transition font-bold">預訂此房</button>
                    </div>
                </div>

                <!-- Room 4: 琵琶行 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-[#cbd5e1] hover:shadow-xl transition flex flex-col shadow-sm">
                    <div class="h-32 bg-[#e2e8f0] flex items-center justify-center relative overflow-hidden">
                        <div class="absolute text-[8rem] text-[#94a3b8] opacity-30 font-pipa -left-4 -bottom-8">琶</div>
                        <h3 class="text-3xl font-pipa text-[#334155] z-10 tracking-widest">琵琶行</h3>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm text-[#334155] mb-4 font-pipa italic border-l-2 border-[#334155] pl-2">
                            「醉不成歡慘將別，別時茫茫江浸月。」</p>
                        <ul class="text-sm text-gray-700 space-y-2 mb-4 flex-grow">
                            <li><strong>切字意象：</strong> 取原稿之「琶、江、月」。</li>
                            <li><strong>字體主軸：</strong> <span class="font-pipa text-[#334155] font-bold">明體</span>
                                (橫細直粗、音樂頓挫節奏)</li>
                            <li><strong>空間美學：</strong> 「江月銀」與「秋木灰」。配置頂級視聽與吸音牆，光影猶如月灑江面，提供旅人一處靜思的避風港。</li>
                        </ul>
                        <button
                            class="w-full bg-[#334155] text-white py-2 rounded-full text-sm hover:bg-[#1e293b] transition font-bold">預訂此房</button>
                    </div>
                </div>

                <!-- Room 5: 賦得古原草送別 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden border border-[#eeddc1] hover:shadow-xl transition flex flex-col shadow-sm lg:col-start-2">
                    <div class="h-32 bg-[#f5e6d0] flex items-center justify-center relative overflow-hidden">
                        <div class="absolute text-[8rem] text-[#dcb88e] opacity-40 font-guyuan -right-4 -bottom-8">草
                        </div>
                        <h3 class="text-3xl font-guyuan text-[#9b6c33] z-10 tracking-widest">古原草</h3>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <p class="text-sm text-[#9b6c33] mb-4 font-guyuan italic border-l-2 border-[#9b6c33] pl-2">
                            「野火燒不盡，春風吹又生。」</p>
                        <ul class="text-sm text-gray-700 space-y-2 mb-4 flex-grow">
                            <li><strong>切字意象：</strong> 取原稿之「草、榮、生」。</li>
                            <li><strong>字體主軸：</strong> <span class="font-guyuan text-[#9b6c33] font-bold">隸書/厚重體</span>
                                (蒼勁有力、歲月刻痕)</li>
                            <li><strong>空間美學：</strong> 「原野黃」與「枯木棕」。保留清水模或粗獷石材肌理，呈現堅韌不拔與時間淬鍊之美，如媽祖賜予的生生不息。</li>
                        </ul>
                        <button
                            class="w-full bg-[#9b6c33] text-white py-2 rounded-full text-sm hover:bg-[#7a5426] transition font-bold">預訂此房</button>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 3: AI & Smart Home Integration -->
        <section id="sec-smarthome" class="fade-in hidden">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-[#3d3d3d] mb-4">隨需應變的 AI 智慧管家</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    落實「易」的變通與「庇佑」的溫暖。透過 Matter 協定整合 Apple HomeKit，搭配藍牙閘道器控管電子門鎖。只要一句話，AI 客服就能如粉紅超跑般，立即為您送上最舒適的燈光與空調溫度。
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Smart Home Control Panel -->
                <div class="lg:w-1/2 bg-white p-6 rounded-2xl shadow-lg border border-[#fdf2f4]">
                    <h3 class="text-xl font-bold text-matsu-pink mb-6 flex items-center">
                        <span class="mr-2 text-2xl">📱</span> 中控台 (Apple Home 模擬)
                    </h3>

                    <!-- Door Lock (Bluetooth Gateway) -->
                    <div
                        class="mb-6 p-4 bg-[#fdfbf7] rounded-xl border border-[#e5e0d8] flex justify-between items-center transition hover:shadow-md">
                        <div>
                            <div class="font-bold text-gray-800 flex items-center"><span class="mr-2">🚪</span> 電子門鎖
                            </div>
                            <div class="text-xs text-gray-500 mt-1">Bluetooth Gateway OTP 派發</div>
                            <div class="text-xs font-mono bg-gray-200 px-2 py-1 rounded mt-2 inline-block">當前密碼: <span
                                    id="otp-code" class="text-matsu-pink font-bold">***</span></div>
                        </div>
                        <div>
                            <button onclick="generateOTP()"
                                class="bg-[#d4af37] text-white text-xs px-3 py-2 rounded-full shadow hover:bg-[#b8952b] transition font-bold">產生一次性密碼</button>
                        </div>
                    </div>

                    <!-- Lighting (Matter) -->
                    <div
                        class="mb-6 p-4 bg-[#fdfbf7] rounded-xl border border-[#e5e0d8] flex justify-between items-center transition hover:shadow-md">
                        <div>
                            <div class="font-bold text-gray-800 flex items-center"><span class="mr-2"
                                    id="icon-light">💡</span> 庇佑暖光 (主照明)</div>
                            <div class="text-xs text-gray-500 mt-1">Matter Protocol 連線中</div>
                        </div>
                        <div
                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" name="toggle" id="toggle-light" onchange="toggleDevice('light')"
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                            <label for="toggle-light"
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                    </div>

                    <!-- Curtains (Matter) -->
                    <div
                        class="mb-6 p-4 bg-[#fdfbf7] rounded-xl border border-[#e5e0d8] flex justify-between items-center transition hover:shadow-md">
                        <div>
                            <div class="font-bold text-gray-800 flex items-center"><span class="mr-2">🪟</span> 順應智慧窗簾
                            </div>
                            <div class="text-xs text-gray-500 mt-1">Matter Protocol 連線中</div>
                        </div>
                        <div class="w-1/3">
                            <input type="range" min="0" max="100" value="0"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-[#e65c7b]">
                            <div class="text-xs text-center text-gray-500 mt-1">開啟度 0%</div>
                        </div>
                    </div>

                    <!-- AC (Matter) -->
                    <div
                        class="mb-2 p-4 bg-[#fdfbf7] rounded-xl border border-[#e5e0d8] flex justify-between items-center transition hover:shadow-md">
                        <div>
                            <div class="font-bold text-gray-800 flex items-center"><span class="mr-2">❄️</span> 恆溫空調
                            </div>
                            <div class="text-xs text-gray-500 mt-1">目標溫度: <span id="ac-temp"
                                    class="font-bold text-matsu-pink text-lg">24</span>°C</div>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="adjustTemp(-1)"
                                class="w-8 h-8 rounded-full bg-[#fdf2f4] text-matsu-pink hover:bg-matsu-pink hover:text-white font-bold transition">-</button>
                            <button onclick="adjustTemp(1)"
                                class="w-8 h-8 rounded-full bg-[#fdf2f4] text-matsu-pink hover:bg-matsu-pink hover:text-white font-bold transition">+</button>
                        </div>
                    </div>
                </div>

                <!-- AI Chatbot Interface -->
                <div
                    class="lg:w-1/2 bg-white rounded-2xl shadow-lg border border-[#fdf2f4] flex flex-col h-[520px] overflow-hidden">
                    <div class="p-4 border-b border-[#fdf2f4] bg-[#fdfbf7] flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 rounded-full bg-matsu-pink text-white flex items-center justify-center text-xl mr-3 shadow-sm">
                                易</div>
                            <div>
                                <div class="font-bold text-gray-800">易居管家 (YI-Bot)</div>
                                <div class="text-xs text-[#d4af37] font-bold">● AI 隨需庇佑連線中</div>
                            </div>
                        </div>
                        <span class="text-2xl opacity-50">🌸</span>
                    </div>

                    <div id="chat-window" class="flex-grow p-4 overflow-y-auto space-y-4 bg-gray-50">
                        <div class="flex items-start">
                            <div
                                class="bg-white border border-gray-200 p-3 rounded-2xl rounded-tl-none max-w-[80%] text-sm text-gray-700 shadow-sm leading-relaxed">
                                歡迎來到易居空間
                                YIHOUSE！我是您的專屬管家。<br><br>我可以幫您查詢「長恨歌」或「採蓮曲」等詩詞主題房的空房，或者直接幫您控制房內設備。您可以對我說「我覺得有點熱」或是「幫我預訂房間」。
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border-t border-gray-100 bg-white">
                        <div class="flex space-x-2">
                            <input type="text" id="chat-input" placeholder="輸入需求，管家將順應為您服務..."
                                class="flex-grow px-4 py-2 border border-pink-200 rounded-full focus:outline-none focus:border-matsu-pink focus:ring-1 focus:ring-matsu-pink text-sm"
                                onkeypress="handleChat(event)">
                            <button onclick="sendMsg()"
                                class="bg-matsu-pink text-white px-5 py-2 rounded-full hover:bg-[#d44968] transition font-bold shadow-md">傳送</button>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <button onclick="quickReply('預訂長恨歌')"
                                class="text-xs bg-[#fdf2f4] border border-pink-100 px-3 py-1.5 rounded-full text-matsu-pink hover:bg-pink-100 transition">📝
                                預訂長恨歌</button>
                            <button onclick="quickReply('覺得有點熱，幫我調降冷氣')"
                                class="text-xs bg-[#fdf2f4] border border-pink-100 px-3 py-1.5 rounded-full text-matsu-pink hover:bg-pink-100 transition">❄️
                                覺得有點熱</button>
                            <button onclick="quickReply('幫我把主照明打開')"
                                class="text-xs bg-[#fdf2f4] border border-pink-100 px-3 py-1.5 rounded-full text-matsu-pink hover:bg-pink-100 transition">💡
                                打開主照明</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: Laravel Code -->
        <section id="sec-code" class="fade-in hidden">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-[#fdf2f4]">
                <h2 class="text-2xl font-bold text-[#3d3d3d] mb-4 border-b-2 border-matsu-pink inline-block pb-1">系統核心實作
                    (Laravel / Matter API)</h2>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                    如同扛起神轎的轎班，後端架構必須穩固且精準。此區塊展示易居空間後端的核心邏輯：包含處理 Matter 智慧家電協定的 <code>SmartHomeController</code>，解析 AI
                    客服語意意圖的 <code>AiBookingController</code>，以及運用 Blade Template 渲染詩詞「切字」美學的視圖。
                </p>

                <div class="flex border-b border-pink-100 mb-4 overflow-x-auto whitespace-nowrap pb-1">
                    <button onclick="showCode('iot')"
                        class="code-tab font-medium text-sm px-4 py-2 border-b-2 border-matsu-pink text-matsu-pink">SmartHomeController.php
                        (Matter/BT)</button>
                    <button onclick="showCode('ai')"
                        class="code-tab font-medium text-sm px-4 py-2 text-gray-500 hover:text-matsu-pink transition">AiBookingController.php
                        (LLM)</button>
                    <button onclick="showCode('view')"
                        class="code-tab font-medium text-sm px-4 py-2 text-gray-500 hover:text-matsu-pink transition">rooms/index.blade.php</button>
                </div>

                <!-- Code: IoT Controller -->
                <div id="code-iot" class="code-block block relative">
                    <button onclick="copyCode('code-content-iot')"
                        class="absolute top-2 right-2 bg-gray-700 hover:bg-matsu-pink text-white text-xs px-2 py-1 rounded transition">複製</button>
                    <pre id="code-content-iot"
                        class="bg-[#1e1e1e] text-[#d4d4d4] p-5 rounded-xl overflow-x-auto text-sm font-mono shadow-inner border border-gray-800">
&lt;?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\MatterProtocolService; // 封裝 Matter 協定的自訂服務

class SmartHomeController extends Controller
{
    protected $matterService;

    public function __construct(MatterProtocolService $matterService)
    {
        $this-&gt;matterService = $matterService;
    }

    /**
     * 易居空間 - 控制 Matter 設備 (順應自然，調整光影與溫度)
     * API Endpoint: POST /api/v1/smarthome/control
     */
    public function controlDevice(Request $request)
    {
        $validated = $request-&gt;validate([
            'room_id'   =&gt; 'required|exists:rooms,id',
            'device'    =&gt; 'required|in:light,ac,curtain',
            'state'     =&gt; 'required', // 依設備不同 (on/off, 數值)
        ]);

        try {
            // 透過區域網路的 Matter Bridge (如 Apple HomePod) 傳遞庇佑指令
            $result = $this-&gt;matterService-&gt;sendCommand(
                $validated['room_id'],
                $validated['device'],
                $validated['state']
            );

            return response()-&gt;json(['success' =&gt; true, 'data' =&gt; $result]);

        } catch (\Exception $e) {
            Log::error("Matter 設備連線異常: " . $e-&gt;getMessage());
            return response()-&gt;json(['success' =&gt; false, 'message' =&gt; '管家目前無法連線設備'], 503);
        }
    }

    /**
     * 透過 Bluetooth Gateway 遠端發送門鎖 OTP
     * API Endpoint: POST /api/v1/smarthome/lock/otp
     */
    public function generateLockOTP(Request $request)
    {
        $booking = $request-&gt;user()-&gt;currentBooking();
        if (!$booking) {
            return response()-&gt;json(['error' =&gt; '尚未結緣有效訂單'], 403);
        }

        // 產生 6 位數密碼
        $otp = sprintf("%06d", mt_rand(1, 999999));
        
        // 呼叫藍牙閘道器 API
        $response = Http::withToken(config('services.bt_gateway.token'))
            -&gt;post(config('services.bt_gateway.url') . '/v3/keyboardPwd/add', [
                'lockId' =&gt; $booking-&gt;room-&gt;lock_id,
                'keyboardPwd' =&gt; $otp,
                'startDate' =&gt; $booking-&gt;check_in_date-&gt;timestamp,
                'endDate'   =&gt; $booking-&gt;check_out_date-&gt;timestamp,
                'addType'   =&gt; 2, // 透過 Gateway 遠端下發
            ]);

        if ($response-&gt;successful()) {
            return response()-&gt;json(['otp' =&gt; $otp, 'message' =&gt; '專屬密碼已送達門鎖']);
        }

        return response()-&gt;json(['error' =&gt; '藍牙閘道連線失敗'], 500);
    }
}
</pre>
                </div>

                <!-- Code: AI Controller -->
                <div id="code-ai" class="code-block hidden relative">
                    <button onclick="copyCode('code-content-ai')"
                        class="absolute top-2 right-2 bg-gray-700 hover:bg-matsu-pink text-white text-xs px-2 py-1 rounded transition">複製</button>
                    <pre id="code-content-ai"
                        class="bg-[#1e1e1e] text-[#d4d4d4] p-5 rounded-xl overflow-x-auto text-sm font-mono shadow-inner border border-gray-800">
&lt;?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MatterProtocolService;
use OpenAI\Laravel\Facades\OpenAI; // 使用 OpenAI 進行語意分析

class AiBookingController extends Controller
{
    /**
     * 易居管家：處理自然語言輸入 (訂房查詢 或 設備控制)
     */
    public function handleChat(Request $request)
    {
        $userMessage = $request-&gt;input('message');
        
        // 系統提示詞：賦予 AI 易居管家角色，融入媽祖庇佑與順應自然的口吻
        $systemPrompt = "
            你是「易居空間 YIHOUSE」的智慧管家。你的語氣應該溫和、充滿禪意與人情味，體現『順應自然、溫暖庇佑』的品牌精神。
            請分析使用者的意圖並回傳 JSON 格式：
            - 控制設備: {\"intent\": \"control\", \"device\": \"light|ac|curtain\", \"action\": \"on|off|temp_up|temp_down\"}
            - 訂房查詢: {\"intent\": \"booking\", \"room\": \"採蓮曲|錢塘湖春行|長恨歌|琵琶行|古原草\"}
            - 閒聊回覆: {\"intent\": \"chat\", \"reply\": \"你的回覆文字\"}
        ";

        $response = OpenAI::chat()-&gt;create([
            'model' =&gt; 'gpt-4',
            'messages' =&gt; [
                ['role' =&gt; 'system', 'content' =&gt; $systemPrompt],
                ['role' =&gt; 'user', 'content' =&gt; $userMessage],
            ],
        ]);

        $aiOutput = json_decode($response-&gt;choices[0]-&gt;message-&gt;content, true);

        // 根據 AI 解析的意圖執行對應邏輯
        if ($aiOutput['intent'] === 'control') {
            app(SmartHomeController::class)-&gt;controlDevice(new Request([
                'room_id' =&gt; auth()-&gt;user()-&gt;current_room_id ?? 1,
                'device' =&gt; $aiOutput['device'],
                'state' =&gt; $aiOutput['action']
            ]));
            return response()-&gt;json(['reply' =&gt; '沒問題，已順應您的需求調整了設備。願您在房內感到舒適平靜。']);
        }

        if ($aiOutput['intent'] === 'booking') {
            $roomName = $aiOutput['room'];
            return response()-&gt;json(['reply' =&gt; "好的，馬上為您查詢蘊含字體美學的 {$roomName} 房型是否結緣有空房..."]);
        }

        return response()-&gt;json(['reply' =&gt; $aiOutput['reply']]);
    }
}
</pre>
                </div>

                <!-- Code: Blade View -->
                <div id="code-view" class="code-block hidden relative">
                    <button onclick="copyCode('code-content-view')"
                        class="absolute top-2 right-2 bg-gray-700 hover:bg-matsu-pink text-white text-xs px-2 py-1 rounded transition">複製</button>
                    <pre id="code-content-view"
                        class="bg-[#1e1e1e] text-[#d4d4d4] p-5 rounded-xl overflow-x-auto text-sm font-mono shadow-inner border border-gray-800">
&lt;!-- resources/views/rooms/index.blade.php --&gt;
@extends('layouts.app')

@section('content')
&lt;!-- 透過 Laravel Vite 載入專屬的字體切字 CSS --&gt;
@push('styles')
    &lt;link rel="stylesheet" href="{{ asset('css/fonts.css') }}"&gt;
@endpush

&lt;div class="container mx-auto px-4 py-8"&gt;
    &lt;h1 class="text-3xl font-bold text-center mb-8 text-[#3d3d3d]"&gt;一字一世界，一室一長歌&lt;/h1&gt;

    &lt;div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"&gt;
        {{-- 使用 Blade 迴圈印出資料庫中的主題房型 --}}
        @foreach($rooms as $room)
            &lt;!-- 動態套用房型專屬的背景色與 CSS 字體 Class --&gt;
            &lt;div class="rounded-2xl overflow-hidden border {{ $room-&gt;css_border_class }} flex flex-col hover:shadow-xl transition"&gt;
                
                &lt;div class="h-32 {{ $room-&gt;css_bg_class }} flex items-center justify-center relative overflow-hidden"&gt;
                    &lt;!-- 切字意象：擷取資料庫設定的切字字元 (如：荷、鶯、歡、琶、草) 作為背景浮水印 --&gt;
                    &lt;div class="absolute text-[8rem] {{ $room-&gt;css_text_light_class }} opacity-30 {{ $room-&gt;font_family_class }} -right-4 -bottom-8"&gt;
                        {{ $room-&gt;cut_word_character }}
                    &lt;/div&gt;
                    &lt;h3 class="text-3xl {{ $room-&gt;font_family_class }} {{ $room-&gt;css_text_dark_class }} z-10 font-bold tracking-widest"&gt;
                        {{ $room-&gt;name }}
                    &lt;/h3&gt;
                &lt;/div&gt;

                &lt;div class="p-6 bg-white flex-grow flex flex-col"&gt;
                    &lt;p class="text-sm {{ $room-&gt;css_text_dark_class }} mb-4 {{ $room-&gt;font_family_class }} italic border-l-2 {{ $room-&gt;css_border_dark_class }} pl-2"&gt;
                        「{{ $room-&gt;poem_quote }}」
                    &lt;/p&gt;
                    &lt;div class="text-sm text-gray-700 mb-4 flex-grow space-y-2"&gt;
                        {!! $room-&gt;description_html !!}
                    &lt;/div&gt;
                    
                    &lt;a href="{{ route('rooms.show', $room-&gt;id) }}" class="block text-center w-full py-2 rounded-full text-white {{ $room-&gt;css_btn_class }} transition font-bold shadow-md"&gt;
                        預訂結緣
                    &lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        @endforeach
    &lt;/div&gt;
&lt;/div&gt;
@endsection
</pre>
                </div>

            </div>
        </section>

    </main>

    <footer class="bg-white border-t border-[#fdf2f4] mt-12 py-10 relative overflow-hidden">
        <div
            class="absolute bottom-0 left-0 w-full h-2 bg-gradient-to-r from-transparent via-[#d4af37] to-transparent opacity-30">
        </div>
        <div class="max-w-7xl mx-auto px-4 text-center text-sm text-gray-500">
            <p class="font-serif mb-3 text-2xl text-matsu-pink tracking-widest">易居空間 YIHOUSE</p>
            <p class="mb-1">🌸 將粉紅超跑的無私庇佑，安放於現代智慧與詩詞切字之中 🌸</p>
            <p>&copy; 2026 易居空間 YIHOUSE. 順應自然，旅人平安.</p>
        </div>
    </footer>

    <!-- JS Logic -->
    <script>
        // Tab Switching Logic
        function switchTab(tabId) {
            const tabs = ['overview', 'festival', 'rooms', 'smarthome', 'code'];

            tabs.forEach(sec => {
                document.getElementById('sec-' + sec).classList.add('hidden');
                document.getElementById('sec-' + sec).classList.remove('block');

                const btn = document.getElementById('btn-' + sec);
                if (btn) {
                    btn.classList.remove('active', 'bg-matsu-pink', 'text-white', 'shadow-md', 'font-medium');
                    btn.classList.add('text-matsu-pink', 'bg-transparent');
                }
            });

            const targetSection = document.getElementById('sec-' + tabId);
            if (targetSection) {
                targetSection.classList.remove('hidden');
                targetSection.classList.add('block');
            }

            const activeBtn = document.getElementById('btn-' + tabId);
            if (activeBtn) {
                activeBtn.classList.add('active', 'bg-matsu-pink', 'text-white', 'shadow-md', 'font-medium');
                activeBtn.classList.remove('text-matsu-pink', 'bg-transparent');
            }
        }

        // 2026 event countdown
        const festivalStartDate = new Date('2026-05-01T00:00:00+08:00');

        function updateFestivalCountdown() {
            const now = new Date();
            const diff = festivalStartDate.getTime() - now.getTime();

            const daysEl = document.getElementById('cd-days');
            const hoursEl = document.getElementById('cd-hours');
            const minsEl = document.getElementById('cd-mins');
            const secsEl = document.getElementById('cd-secs');

            if (!daysEl || !hoursEl || !minsEl || !secsEl) {
                return;
            }

            if (diff <= 0) {
                daysEl.innerText = '00';
                hoursEl.innerText = '00';
                minsEl.innerText = '00';
                secsEl.innerText = '00';
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
            const mins = Math.floor((diff / (1000 * 60)) % 60);
            const secs = Math.floor((diff / 1000) % 60);

            daysEl.innerText = String(days).padStart(2, '0');
            hoursEl.innerText = String(hours).padStart(2, '0');
            minsEl.innerText = String(mins).padStart(2, '0');
            secsEl.innerText = String(secs).padStart(2, '0');
        }

        function joinFestival() {
            addChatMessage('AI', '歡迎加入 2026「順路有光，停靠有福」祈福共創季。已為您保留活動席次，入住時可領取專屬福籤房卡。');
        }

        // Code Tab Switching Logic
        function showCode(type) {
            document.querySelectorAll('.code-block').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.code-tab').forEach(el => {
                el.classList.remove('border-b-2', 'border-matsu-pink', 'text-matsu-pink');
                el.classList.add('text-gray-500');
            });

            document.getElementById('code-' + type).classList.remove('hidden');
            document.getElementById('code-' + type).classList.add('block');

            event.currentTarget.classList.remove('text-gray-500');
            event.currentTarget.classList.add('border-b-2', 'border-matsu-pink', 'text-matsu-pink');
        }

        // Utility: Copy Code
        function copyCode(elementId) {
            const codeContent = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(codeContent).then(() => {
                const btn = event.currentTarget;
                const originalText = btn.innerText;
                btn.innerText = '已複製!';
                btn.classList.add('bg-green-600');
                btn.classList.remove('bg-gray-700', 'hover:bg-matsu-pink');
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.classList.remove('bg-green-600');
                    btn.classList.add('bg-gray-700', 'hover:bg-matsu-pink');
                }, 2000);
            });
        }

        // --- Smart Home Interactions (Mock) ---
        function toggleDevice(device) {
            const isChecked = document.getElementById('toggle-' + device).checked;
            if (device === 'light') {
                document.getElementById('icon-light').innerText = isChecked ? '💡' : '🌑';
                addChatMessage('AI', isChecked ? '主照明已順應為您開啟，帶來滿室庇佑暖光。' : '主照明已關閉，祝您好眠。');
            }
        }

        let acTemp = 24;
        function adjustTemp(change) {
            acTemp += change;
            document.getElementById('ac-temp').innerText = acTemp;
            addChatMessage('AI', `空調已透過 Matter 協定精準設定為 ${acTemp}°C。`);
        }

        function generateOTP() {
            const btn = event.currentTarget;
            btn.innerText = "藍牙連線中...";
            setTimeout(() => {
                const otp = Math.floor(100000 + Math.random() * 900000);
                document.getElementById('otp-code').innerText = otp;
                btn.innerText = "密碼已產生";
                addChatMessage('AI', `門鎖專屬密碼已產生: ${otp}，願您出入平安，退房後密碼將自動失效。`);
            }, 800);
        }

        // --- AI Chat Interactions (Mock) ---
        function handleChat(e) {
            if (e.key === 'Enter') sendMsg();
        }

        function quickReply(text) {
            document.getElementById('chat-input').value = text;
            sendMsg();
        }

        function sendMsg() {
            const input = document.getElementById('chat-input');
            const msg = input.value.trim();
            if (!msg) return;

            addChatMessage('User', msg);
            input.value = '';

            // Mock AI NLP parsing with Mazu theme flavor
            setTimeout(() => {
                if (msg.includes('燈') || msg.includes('亮') || msg.includes('照明')) {
                    document.getElementById('toggle-light').checked = true;
                    toggleDevice('light');
                } else if (msg.includes('冷') || msg.includes('熱') || msg.includes('溫度')) {
                    addChatMessage('AI', '收到。已幫您將空調設定至最舒適的溫度，如粉紅超跑般隨時為您送上溫暖與涼爽。');
                } else if (msg.includes('採蓮曲') || msg.includes('長恨歌') || msg.includes('預訂')) {
                    addChatMessage('AI', '馬上為您查詢蘊含字體美學的主題房空房狀況，請稍候... 該房型本週末尚有緣份空房，需要幫您跳轉至結帳頁面嗎？');
                } else {
                    addChatMessage('AI', '收到您的需求。易居管家隨時順應您的需要，為您服務。');
                }
            }, 1000);
        }

        function addChatMessage(sender, text) {
            const window = document.getElementById('chat-window');
            const div = document.createElement('div');

            if (sender === 'User') {
                div.className = "flex items-end justify-end mt-4";
                div.innerHTML = `<div class="bg-matsu-pink text-white p-3 rounded-2xl rounded-tr-none max-w-[80%] text-sm shadow-md leading-relaxed">${text}</div>`;
            } else {
                div.className = "flex items-start mt-4";
                div.innerHTML = `<div class="bg-white border border-gray-200 p-3 rounded-2xl rounded-tl-none max-w-[80%] text-sm text-gray-700 shadow-sm leading-relaxed">${text}</div>`;
            }

            window.appendChild(div);
            window.scrollTop = window.scrollHeight; // Auto-scroll to bottom
        }

        updateFestivalCountdown();
        setInterval(updateFestivalCountdown, 1000);
    </script>
</body>

</html>
@endverbatim