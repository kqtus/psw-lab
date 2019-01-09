<%@ Page Title="Login" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Login.aspx.cs" Inherits="pragmatic3.Login" %>


<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <form method="post">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://cdn4.iconfinder.com/data/icons/computer-monitor-vol-2/100/computer_screen21-512.png" alt=""/>
                    <h3>Welcome!</h3>
                    <p>You are 30 seconds away from accessing the most reliable source of informations about newest technologies out there!</p>
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                            <div class="register-heading">
                                <h3>Login.</h3>
                                <p>
                                    Don't have account?
                                    <a href="Register">Register.</a>
                                </p>
                                <div class="col-md-4" style="margin: 0 auto; float: none; margin-bottom: 8%;">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="login" class="form-control" placeholder="Login" />
                                        </div>
                                            
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="password" name="pswd" class="form-control" placeholder="Password" value="" />
                                        </div>
                                    </div>
                                    <input type="submit" class="btnLogin" value="Login" name="login_btn"/>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</asp:Content>