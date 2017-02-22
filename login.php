<br><br><br>
<center>
  <table class="mdl-data-table mdl-js-data-table">
    <thead>
      <th class="mdl-data-table__cell--non-numeric" colspan="2" style="text-align:center">Login Or Register</th>
    </thead>
    <tbody>
      <tr>
        <td class="mdl-data-table__cell--non-numeric">Email</td>
        <td class="mdl-data-table__cell--non-numeric">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="email" class="mdl-textfield__input" type="text" id="email" pattern="[^ @]*@[^ @]*">
            <label class="mdl-textfield__label" for="Email">Enter Email</label>
          </div>
        </td>
      </tr>
      <tr>
        <td class="mdl-data-table__cell--non-numeric">Password</td>
        <td class="mdl-data-table__cell--non-numeric">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="password" class="mdl-textfield__input" type="password" id="Password" pattern="[a-zA-Z0-9]+[a-zA-Z0-9 ]+">
            <label class="mdl-textfield__label" for="password">Enter Password</label> 
          </div>
          <div style="text-align:right;font-size:10px"><a href="checkout.php?forgot_pass">Forgot Password </a></div>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center">
          <button name="clear" type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"> Clear </button> &nbsp &nbsp
          <button name="login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="validateForm()"> Login </button> 
        </td>
      </tr>
    </tbody>
  </table>
  <h5>
    <a href="register.php"> Register Here </a>  
  </h5>
</center>