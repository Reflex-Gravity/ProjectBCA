<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <main class="mdl-layout__content">
      <div class="mdl-tabs mdl-js-tabs">
        <div class="mdl-tabs__tab-bar">
          <a href="#tab1-panel" class="mdl-tabs__tab is-active">PayPal</a>
          <a href="#tab2-panel" class="mdl-tabs__tab">Credit/Debit Card</a>
          <a href="#tab3-panel" class="mdl-tabs__tab">Cash On Delivery</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tab1-panel">
          <p>Tab 1 Content</p>
        </div>
        <div class="mdl-tabs__panel" id="tab2-panel">
          <div class="card-container">
            <div class="card-wrapper"></div>
            <div class="form-container active">
              <form action="" name="credit">
                <input placeholder="Card number" type="tel" name="number">
                <input placeholder="Full name" type="text" name="name">
                <input placeholder="MM/YY" type="tel" name="expiry">
                <input placeholder="CVC" type="number" name="cvc">
              </form>
            </div>
          </div>
          <script src="js/card.js"></script>
        </div>
        <div class="mdl-tabs__panel" id="tab3-panel">
          <p>Tab 3 Content</p>
        </div>
      </div>
    </main>
  </div>
  <script>
    new Card({
    form: document.querySelector('form[name="credit"]'),
    container: '.card-wrapper'
    });
  </script>
</body>