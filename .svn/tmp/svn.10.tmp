<!-- Link to facebook login -->

<div class="col-md-6">
    <h2 class="text-center">Login</h2>
    <br>
    <form class="form-horizontal" role="form" method="POST" action="">
        <input name="formType" type="hidden" value="login">
        <div class="form-group">
            <label for="loginUsername" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="loginUsername" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="loginPassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Log In</button>
            </div>
        </div>
    </form>
    <script>
        //A very basic way to open a popup
        function popup(link, windowname) {
            window.open(link.href, windowname, 'width=400,height=200,scrollbars=yes');
            return false;
        }
        $(document).ready(function(){
            $('#connect').click(function(){
                $.oauthpopup({
                    path: '/main/callback',
                    callback: function(){
                        window.location.reload();
                    }
                });
            });
        })
    </script>
    <div>
        <a href="/facebook/popup" onclick="return popup(this,'fblogin')">Login via Facebook Popup</a> <br>
        <a id="connect" href="#">Login via Twitter Popup</a>
<!--        <a href="/hello/callback">Login via Twitter Popup</a>-->
    </div>
</div>


