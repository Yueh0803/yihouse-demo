(function () {
  const state = {
    roomPrice: 3200,
    addOnBreakfast: false,
    addOnLateCheckout: false,
    guests: 2,
    nights: 1,
    amount: 3200,
    orders: load("yihouse_orders", []),
    auth: load("yihouse_auth", null),
  };

  function load(key, fallback) {
    try {
      const raw = localStorage.getItem(key);
      return raw ? JSON.parse(raw) : fallback;
    } catch {
      return fallback;
    }
  }

  function save(key, value) {
    localStorage.setItem(key, JSON.stringify(value));
  }

  function q(selector, root) {
    return (root || document).querySelector(selector);
  }

  function qa(selector, root) {
    return Array.from((root || document).querySelectorAll(selector));
  }

  function toast(msg) {
    const el = q("#toast");
    if (!el) return;
    el.textContent = msg;
    el.classList.add("show");
    setTimeout(() => el.classList.remove("show"), 1800);
  }

  function switchSection(id) {
    qa(".menu button").forEach((btn) => {
      const active = btn.dataset.target === id;
      btn.classList.toggle("active", active);
    });
    qa(".section").forEach((sec) => {
      sec.classList.toggle("active", sec.id === id);
    });
  }

  function calcTotal() {
    const base = state.roomPrice * state.nights;
    const breakfast = state.addOnBreakfast ? state.nights * state.guests * 180 : 0;
    const lateCheckout = state.addOnLateCheckout ? 500 : 0;
    state.amount = base + breakfast + lateCheckout;
    q("#priceBase").textContent = base.toLocaleString();
    q("#priceBreakfast").textContent = breakfast.toLocaleString();
    q("#priceLate").textContent = lateCheckout.toLocaleString();
    q("#priceTotal").textContent = state.amount.toLocaleString();
  }

  function initBooking() {
    const checkIn = q("#checkIn");
    const checkOut = q("#checkOut");
    const guests = q("#guests");
    const breakfast = q("#addonBreakfast");
    const lateCheckout = q("#addonLateCheckout");

    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    const dayAfter = new Date();
    dayAfter.setDate(dayAfter.getDate() + 2);

    checkIn.valueAsDate = tomorrow;
    checkOut.valueAsDate = dayAfter;

    function updateNights() {
      const inDate = new Date(checkIn.value);
      const outDate = new Date(checkOut.value);
      const diff = Math.max(1, Math.round((outDate - inDate) / 86400000));
      state.nights = diff;
      q("#nights").textContent = String(diff);
      calcTotal();
    }

    checkIn.addEventListener("change", updateNights);
    checkOut.addEventListener("change", updateNights);

    guests.addEventListener("change", () => {
      state.guests = Number(guests.value || 2);
      calcTotal();
    });

    breakfast.addEventListener("change", () => {
      state.addOnBreakfast = breakfast.checked;
      calcTotal();
    });

    lateCheckout.addEventListener("change", () => {
      state.addOnLateCheckout = lateCheckout.checked;
      calcTotal();
    });

    q("#bookingSubmit").addEventListener("click", () => {
      const orderId = "ORD" + Date.now().toString().slice(-8);
      const payload = {
        orderId,
        amount: state.amount,
        nights: state.nights,
        guests: state.guests,
        checkIn: checkIn.value,
        checkOut: checkOut.value,
        createdAt: new Date().toISOString(),
        status: "pending_payment",
      };
      state.orders.unshift(payload);
      save("yihouse_orders", state.orders);
      q("#currentOrderId").textContent = orderId;
      q("#currentAmount").textContent = state.amount.toLocaleString();
      renderReports();
      renderMail("order");
      switchSection("section-payment");
      toast("已建立訂單，請選擇支付方式");
    });

    updateNights();
  }

  function initAuth() {
    const authStatus = q("#authStatus");
    const authJson = q("#authJson");
    function render() {
      if (!state.auth) {
        authStatus.textContent = "尚未登入";
        authStatus.className = "status warn";
        authJson.textContent = "{}";
        return;
      }
      authStatus.textContent = "已登入: " + state.auth.provider.toUpperCase();
      authStatus.className = "status ok";
      authJson.textContent = JSON.stringify(state.auth, null, 2);
    }

    function startOAuth(provider) {
      const code = provider.toUpperCase() + "_" + Math.random().toString(36).slice(2, 10);
      const redirect = "oauth-callback.html?provider=" + encodeURIComponent(provider) + "&code=" + encodeURIComponent(code) + "&state=demo-state";
      window.location.href = redirect;
    }

    q("#googleOAuth").addEventListener("click", () => startOAuth("google"));
    q("#lineOAuth").addEventListener("click", () => startOAuth("line"));
    q("#logoutBtn").addEventListener("click", () => {
      state.auth = null;
      save("yihouse_auth", null);
      render();
      toast("已登出");
    });

    render();
  }

  function initPayment() {
    function fakeGateway(method) {
      const orderId = q("#currentOrderId").textContent || "N/A";
      const amount = q("#currentAmount").textContent || "0";
      const tx = method.toUpperCase() + "_TX_" + Date.now().toString().slice(-7);
      q("#gatewayResult").textContent = JSON.stringify({
        gateway: method,
        orderId,
        amount,
        tx,
        status: "success",
        callback: "/payment/callback?gateway=" + method,
      }, null, 2);

      if (state.orders[0]) {
        state.orders[0].status = "paid";
        state.orders[0].paymentMethod = method;
        state.orders[0].tx = tx;
        save("yihouse_orders", state.orders);
      }

      renderReports();
      renderMail("payment");
      toast(method.toUpperCase() + " 支付成功 (Demo)");
    }

    q("#payLine").addEventListener("click", () => fakeGateway("linepay"));
    q("#payEcpay").addEventListener("click", () => fakeGateway("ecpay"));
    q("#payStripe").addEventListener("click", () => fakeGateway("stripe"));
  }

  function renderMail(type) {
    const box = q("#mailPreview");
    if (!box) return;
    const order = state.orders[0];
    if (!order) {
      box.innerHTML = '<div class="mail"><div class="mail-head">尚未產生郵件</div><div class="mail-body">請先建立訂單或完成付款。</div></div>';
      return;
    }

    if (type === "payment") {
      box.innerHTML = '<div class="mail">'
        + '<div class="mail-head">主旨: [YIHOUSE] 付款成功通知</div>'
        + '<div class="mail-body">'
        + '訂單 <strong>' + order.orderId + '</strong> 已完成付款。<br>'
        + '支付方式: <strong>' + (order.paymentMethod || "N/A") + '</strong><br>'
        + '交易編號: <strong>' + (order.tx || "N/A") + '</strong><br>'
        + '金額: NT$ <strong>' + (order.amount || 0).toLocaleString() + '</strong>'
        + '</div></div>';
      return;
    }

    box.innerHTML = '<div class="mail">'
      + '<div class="mail-head">主旨: [YIHOUSE] 訂房確認通知</div>'
      + '<div class="mail-body">'
      + '您好，已收到您的訂房申請。<br>'
      + '訂單編號: <strong>' + order.orderId + '</strong><br>'
      + '入住期間: <strong>' + order.checkIn + ' ~ ' + order.checkOut + '</strong><br>'
      + '入住人數: <strong>' + order.guests + '</strong><br>'
      + '應付金額: NT$ <strong>' + (order.amount || 0).toLocaleString() + '</strong>'
      + '</div></div>';
  }

  function initUpload() {
    const drop = q("#dropzone");
    const input = q("#uploadInput");
    const list = q("#previewList");
    const progress = q("#uploadProgress");

    function showFiles(files) {
      list.innerHTML = "";
      files.forEach((file) => {
        const item = document.createElement("div");
        item.className = "preview-item";

        const img = document.createElement("img");
        img.className = "preview-thumb";
        img.alt = file.name;

        const info = document.createElement("div");
        info.innerHTML = '<strong>' + file.name + '</strong><div class="muted">' + Math.round(file.size / 1024) + ' KB</div>';

        const flag = document.createElement("div");
        flag.innerHTML = '<span class="badge">待上傳</span>';

        item.appendChild(img);
        item.appendChild(info);
        item.appendChild(flag);
        list.appendChild(item);

        if (file.type.startsWith("image/")) {
          const reader = new FileReader();
          reader.onload = (e) => { img.src = e.target.result; };
          reader.readAsDataURL(file);
        }
      });
    }

    function handle(filesLike) {
      const files = Array.from(filesLike || []);
      if (!files.length) return;
      showFiles(files);
      let step = 0;
      const timer = setInterval(() => {
        step += 10;
        progress.style.width = step + "%";
        if (step >= 100) {
          clearInterval(timer);
          toast("房間照片已上傳 (Demo)");
        }
      }, 90);
    }

    input.addEventListener("change", () => handle(input.files));

    ["dragenter", "dragover"].forEach((ev) => {
      drop.addEventListener(ev, (e) => {
        e.preventDefault();
        drop.classList.add("dragover");
      });
    });

    ["dragleave", "drop"].forEach((ev) => {
      drop.addEventListener(ev, (e) => {
        e.preventDefault();
        drop.classList.remove("dragover");
      });
    });

    drop.addEventListener("drop", (e) => {
      handle(e.dataTransfer.files);
    });
  }

  function drawLineChart(canvas, values, color) {
    if (!canvas || !canvas.getContext) return;
    const ctx = canvas.getContext("2d");
    const w = canvas.width;
    const h = canvas.height;
    ctx.clearRect(0, 0, w, h);

    const max = Math.max(...values, 1);
    const pad = 28;
    const xStep = (w - pad * 2) / (values.length - 1 || 1);

    ctx.strokeStyle = "#d9e2dc";
    ctx.lineWidth = 1;
    for (let i = 0; i < 4; i++) {
      const y = pad + ((h - pad * 2) / 3) * i;
      ctx.beginPath();
      ctx.moveTo(pad, y);
      ctx.lineTo(w - pad, y);
      ctx.stroke();
    }

    ctx.strokeStyle = color;
    ctx.lineWidth = 3;
    ctx.beginPath();
    values.forEach((v, i) => {
      const x = pad + i * xStep;
      const y = h - pad - (v / max) * (h - pad * 2);
      if (i === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    });
    ctx.stroke();

    ctx.fillStyle = color;
    values.forEach((v, i) => {
      const x = pad + i * xStep;
      const y = h - pad - (v / max) * (h - pad * 2);
      ctx.beginPath();
      ctx.arc(x, y, 3.5, 0, Math.PI * 2);
      ctx.fill();
    });
  }

  function renderReports() {
    const orders = state.orders || [];
    const paid = orders.filter((o) => o.status === "paid");
    const revenue = paid.reduce((sum, o) => sum + (Number(o.amount) || 0), 0);

    q("#kpiOrders").textContent = String(orders.length);
    q("#kpiPaid").textContent = String(paid.length);
    q("#kpiRevenue").textContent = revenue.toLocaleString();

    const trendOrders = [3, 4, 6, 5, 7, 8, Math.max(1, orders.length)];
    const trendRevenue = [12000, 14800, 17300, 16500, 19000, 21200, Math.max(1000, revenue)];

    drawLineChart(q("#ordersChart"), trendOrders, "#2f6f63");
    drawLineChart(q("#revenueChart"), trendRevenue, "#c55d5d");
  }

  function initMenu() {
    qa(".menu button").forEach((btn) => {
      btn.addEventListener("click", () => switchSection(btn.dataset.target));
    });
    const firstTarget = q(".menu button")?.dataset?.target || "section-booking";
    switchSection(firstTarget);
  }

  function hydrateFromCallback() {
    const message = load("yihouse_callback_result", null);
    const spot = q("#oauthCallbackLog");
    if (!spot) return;
    if (!message) {
      spot.textContent = "尚未接收 callback。";
      return;
    }
    spot.textContent = JSON.stringify(message, null, 2);
  }

  function init() {
    initMenu();
    initBooking();
    initAuth();
    initPayment();
    initUpload();
    renderMail();
    renderReports();
    hydrateFromCallback();
  }

  document.addEventListener("DOMContentLoaded", init);
})();
